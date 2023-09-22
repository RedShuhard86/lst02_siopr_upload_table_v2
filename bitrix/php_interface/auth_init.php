<?php

$number = 8;
$strong = 3;
$time_lag = (60*60*3);

function passwordGenerator(){
    global $number;
    $arr = array('a','b','c','d','e','f',
        'g','h','i','j','k','l',
        'm','n','o','p','q','r','s',
        't','u','v','x','y','z',
        'A','B','C','D','E','F',
        'G','H','I','J','K','L',
        'M','N','O','P','Q','R','S',
        'T','U','V','X','Y','Z',
        '1','2','3','4','5','6',
        '7','8','9','0'
        ,'.',',',
        '(',')','[',']','!','?',
        '&','^','%','@','*','$',
        '<','>','/','|','+','-',
        '{','}','`','~'
    );
    $pass = "";
    for($i = 0; $i < $number; $i++)
    {
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
    }
    $r = checkStrongPassword($pass);
    if($r == 'FALSE'){
        return passwordGenerator();
    }
    return $pass;

}
function hashGenerator($pass){
    $res = sha1($pass, false);
    $res = hex2bin($res);
    $res = base64_encode($res);
    return $res;
}


function checkStrongPassword($pass,$dataType = false){
    global $number,$strong;
    $res = [];
    $num = [];
    $alphabet = [
        'a','b','c','d','e','f',
        'g','h','i','j','k','l',
        'm','n','o','p','r','s',
        't','u','v','x','y','z',
        'A','B','C','D','E','F',
        'G','H','I','J','K','L',
        'M','N','O','P','R','S',
        'T','U','V','X','Y','Z'
    ];
    $numbers = [
        '1','2','3','4','5','6',
        '7','8','9','0'
    ];
    $symbols = [
        '.',',',
        '(',')','[',']','!','?',
        '&','^','%','@','*','$',
        '<','>','/','|','+','-',
        '{','}','`','~'
    ];
    $arrPass = str_split($pass);
    foreach ($arrPass as $char){
        if(in_array($char, $alphabet)){
            $num[0]=$num[0]+1;
        }
        if(in_array($char, $numbers)){
            $num[1]=$num[1]+1;
        }
        if(in_array($char, $symbols)){
            $num[2]=$num[2]+1;
        }
    }
    if($number>=strlen($pass)){
        $countPass = "TRUE";
    }else{
        $countPass = "FALSE";
    }
    if(count($num)>=$strong){
        $fullness = "TRUE";
    }else{
        $fullness = "FALSE";
    }
    $res['countPass'] = $countPass;
    $res['fullness'] = $fullness;
    $res['alph'] = $num[0];
    $res['numb'] = $num[1];
    $res['symb'] = $num[2];
    if($dataType) {
        return $res;
    }else{
        if($res['countPass'] == 'FALSE' || $res['fullness'] == 'FALSE'){
            return 'FALSE';
        }else{
            return 'TRUE';
        }
    }
};

