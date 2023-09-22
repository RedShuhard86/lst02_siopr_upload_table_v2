<?php

//** СИНТЕТИЧЕСКИЙ КОННЕКТ */

/*function OpenSyntetConnect(){
    //$server = "10.15.48.1";
    $server = "192.168.110.3, 1435";
    $connectionOptions = array(
        "database" => "SMA_GU",
        "uid" => "sa",
        "pwd" => "T(DS#1M8oz",
        "CharacterSet" => "UTF-8"
    );
    $conn = sqlsrv_connect($server, $connectionOptions);
    if ($conn === false) {
        die(formatErrors(sqlsrv_errors(),""));
    }
    return $conn;
}

function ms_query_syntet_simple($q){

    $connection = OpenSyntetConnect();
    //setSessionMSSQL($connection);
    $arr = sqlsrv_query($connection,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }
    $res = [];
    $i = 0;
    while ($row = sqlsrv_fetch_array($arr, SQLSRV_FETCH_ASSOC)){
        $res[$i]= $row;
        $i++;
    }
    ConnectClose($connection);
    return $res;
}
*/
//** СИНТЕТИЧЕСКИЙ КОННЕКТ АНДРЕЙ ГЛАЗОВСКИЙ */

function OpenConnection(){
    $server = "192.168.110.3, 1434";
    $connectionOptions = array(
        "database" => "pre1Cv82dt",
        "uid" => "sa",
        "pwd" => "T(DS#1M8oz",
        "CharacterSet" => "UTF-8"
    );
    /*
	$server = "192.168.110.3, 1435";// ПОДКЛЮЧЕНИЕ ПРОД ВРЕМЕННО
    $connectionOptions = array(
        "database" => "1Cv82dt",
        "uid" => "sa",
        "pwd" => "T(DS#1M8oz"
    );
    */
    $conn = sqlsrv_connect($server, $connectionOptions);

    if ($conn === false) {
        die(formatErrors(sqlsrv_errors(),""));
    }

    return $conn;
}

function ConnectClose($cn){
    sqlsrv_close($cn);
}

function ms_query_js($q,$con=false){
    $connection = OpenConnection();
    if($con){
        $connection = OpenProdConnection();
    }
    setSessionMSSQL($connection);
    $arr = sqlsrv_query($connection,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }else{
        $file = $_SERVER['DOCUMENT_ROOT']."/log/PRIMER_sql_log.txt";
        file_put_contents($file,"\r\n".$q."\r\n", FILE_APPEND);
    }
    $res = [];
    $i = 0;
    while ($row = sqlsrv_fetch_array($arr, SQLSRV_FETCH_ASSOC)){
        foreach ($row as $k=>$val) {
            $res[$i][$k] = checkCharSet($val, sqlsrv_field_metadata($arr));
        }
        $i++;
    }
   ConnectClose($connection);
    return $res;
}
function ms_query_update($q,$con=false){
    $connection = OpenConnection();
    if($con){
        $connection = OpenProdConnection();
    }
    setSessionMSSQL($connection);
    $arr = sqlsrv_query($connection,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }
}
function ms_query_simple($q,$con=false){

    $connection = OpenConnection();
    if($con){
        $connection = OpenProdConnection();
    }

    setSessionMSSQL($connection);

    $arr = sqlsrv_query($connection,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }
    $res = [];
    $i = 0;
    while ($row = sqlsrv_fetch_array($arr, SQLSRV_FETCH_ASSOC)){
        $res[$i]= $row;
        $i++;
    }
   ConnectClose($connection);
    return $res;
}



function getUserMS(){
    /*
    $user = $_SESSION['login'];
    $verified = $_SESSION['verified'];
    if($user == "" || $verified == 0){
        header('Location: http://'.$_SERVER['SERVER_ADDR']);
    }else{
        //return '{"user":'.$user.', "verified":'.$verified.'}';
    }
    return $user;
    */
    return "Юрий Дяденко";
}
function setSessionMSSQL($conn){
//    $user = getUser();
    $user = getUserMS();
    if(strlen($user)<=0){
        $user = "Юрий Дяденко";
    }
    $q = "exec set_user_params N'".$user."'";
    $arr = sqlsrv_query($conn,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }else{
        $file = $_SERVER['DOCUMENT_ROOT']."/log/PRIMER_sql_log.txt";
        file_put_contents($file,"\r\n".$q."\r\n", FILE_APPEND);
    }
//    return $arr;
}
function ms_query_simple_exec($arrQuery){
    $connection = OpenConnection();
    setSessionMSSQL($connection);
    $arr = sqlsrv_query($connection,$arrQuery);
    $res = 0;
    while ($row = sqlsrv_fetch($arr)){
        $res = sqlsrv_get_field( $arr, 0);
    }
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$arrQuery));
    }
    ConnectClose($connection);
    return $res;
}
function ms_query_as_fetch($q,$con=false){
    $connection = OpenConnection();
    if($con){
        $connection = OpenProdConnection();
    }
    setSessionMSSQL($connection);
    $arr = sqlsrv_query($connection,$q);
    if ($arr === false) {
        die(formatErrors(sqlsrv_errors(),$q));
    }
    $res = [];
    $ii = 0;
    while ($row = sqlsrv_fetch($arr)){
        $k = sqlsrv_get_field( $arr, 0);
        $nam = sqlsrv_get_field( $arr, 1);
        $res[$k] = $nam;
        $ii++;
    }
   ConnectClose($connection);
    return $res;
}

function checkCharSet($val, $type){
    $cod = mb_detect_encoding($val, ['Windows-1251', 'UTF-8'], false);
    $str = $val;
    if($cod == "Windows-1251" && ($type != "ntext" || $type != "datetime")){
        $str = mb_convert_encoding($val,"UTF-8", $cod);
    }
    if($type == "ntext"){
        $str = iconv("cp1251", "UTF-8", $val);
    }
    if($type == "datetime"){

        $str = (int)strtotime($val);
        if($str >= Y3K_yers){
            $tm = (int)($str - Y2K_yers);
            $str = date("Y-m-d H:i:s", $tm);
        }
    }
    return $str;
}



function is_Date($str){
    return is_numeric(strtotime($str));
}
function formatErrors($errors,$con)
{
    $str = "";
    echo "<h1>SQL Error:</h1>";
    $str .= "SQL Error:\r";
    echo "Error information: <br/>";
    $str .= "Error information: \r";
    foreach ($errors as $error) {
        echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
        $str .= "SQLSTATE: ". $error['SQLSTATE'] . "\r";
        echo "Code: ". $error['code'] . "<br/>";
        $str .= "Code: ". $error['code'] . "\r";
        echo "Message: ". $error['message'] . "<br/>";
        $str .= "Message: ". $error['message'] . "\r";
    }
    $str .= "CONTENT: ".$con."\r";
    $str .= "--- === --- \r\r";
    setSqlError($str);
}
function exception_handler($exception) {
    echo "<h1>Failure</h1>";
    echo "Uncaught exception: " , $exception->getMessage();
    echo "<h1>PHP Info for troubleshooting</h1>";
    phpinfo();
}