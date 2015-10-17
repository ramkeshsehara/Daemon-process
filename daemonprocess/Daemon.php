#!/usr/bin/php
 
<?php
 
$log = 'var/log/Daemon.log';
 
/**
 * Method for displaying the help and default variables.
 **/
function displayUsage(){
    global $log;
 
    echo "tt--help display this help messagen";
    echo "tt--log=<filename> The location of the log file (default '$log')n";
    echo "n";
}//end displayUsage()
 
//configure command line arguments
if($argc > 0){
    foreach($argv as $arg){
        $args = explode('=',$arg);
        switch($args[0]){
            case '--help':
                return displayUsage();
            case '--log':
                $log = $args[1];
                break;
        }//end switch
    }//end foreach
}//end if
 
//fork the process to work in a daemonized environment
file_put_contents($log, "Status: starting up.n", FILE_APPEND);
$pid = pcntl_fork();
if($pid == -1){
	file_put_contents($log, "Error: could not daemonize process.n", FILE_APPEND);
	return 1; //error
}
else if($pid){
	return 0; //success
}
else{
    //the main process
    while(true){
         include_once('class.phpmailer.php');
	 $mail = new PHPMailer();
	 $body = 'intern confirmation of info-tech credance mail';
	 $mail->AddReplyTo('ug201311013@iitj.ac.in', 'Info-tech Credance');
	 $mail->SetFrom('ug201311012@iitj.ac.in', ' Info-tech Credance');
	 $mail->AddAddress('ug201310026@iitj.ac.in', 'Info-tech Credance');
	 $mail->Subject = 'Info-tech Credance ';
	 $mail->MsgHTML( $body );
 
if( ! $mail->Send() ) {
  echo "Mailer Error: " . $mail->ErrorInfo;
}
          

        file_put_contents($log, 'Running...', FILE_APPEND);
        sleep(1);
    }//end while
}//end if
 
?>
