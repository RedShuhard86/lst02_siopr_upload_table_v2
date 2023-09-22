<?php
$location = "\\server-pc\siopr20190325";
$user = "user1";
$pass = "Vika2005";
$letter = "Z";

// Map the drive
if(system("net use ".$letter.": \"".$location."\" ".$pass." /user:".$user." /persistent:no>nul 2>&1")){

    echo "ПОЛУЧИЛОСЬ";
}else{
    echo "НЕ ПОЛУЧИЛОСЬ";
}
echo "net use ".$letter.": \"".$location."\" ".$pass." /user:".$user." /persistent:no>nul 2>&1";
// Open the directory
$dir = opendir($letter);
echo "<pre>"; print_r($dir); echo "</pre>";