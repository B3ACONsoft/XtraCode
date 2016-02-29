<?php
/*
    mostly from here with some mods:
        http://www.xenocafe.com/tutorials/php/ntp_time_synchronization/index.php
    some from here too:
        http://stackoverflow.com/questions/16592142/retrieve-time-from-ntp-server-via-php
*/

define("TIME_SERVER","time.nist.gov");
define("TIME_SERVER_TIMEOUT", 3);


/*
    Gets a time stamp from the time server specified in TIME_SERVER
        the android app uses the same time server for consistency...
*/
function getTimeStamp() {
    $fp;       
    $time_data; 
    $socket = 100;
    $err;
    $errstr;
    $timeout = 5;
    $timevalue = " ";
    
    while($try_count++ < TIME_SERVER_TIMEOUT) {
        $fp = fsockopen(TIME_SERVER, $socket, $err, $errstr, $timeout);
        
        if($fp) {
            fputs($fp, "\n");
            $timevalue = fread($fp, 49);
            fclose($fp); 
        } else {
            echo $err.="    ".=$errstr.="\r\n";
        }
    }
}
echo "trying to get time\r\n";
getTimeStamp();