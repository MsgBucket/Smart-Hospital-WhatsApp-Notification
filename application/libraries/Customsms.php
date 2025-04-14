<?php

/***************************************
*  MsgBucket Whatsapp Api Integration  * 
*  Author: MsgBucket                   *
*  Contact: https://msgbucket.com      *
 ***************************************/ 


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customsms {

    private $_CI;
    var $MSGBUCKET_TOKEN = "nxxxxxxxxxxxxxxxxx"; /* Token from your MsgBucket Account https://wa.msgbucket.com */
    
    private $MSGBUCKET_URL_ENCODED = "aHR0cHM6Ly9zZXJ2ZXIubXNnYnVja2V0LmNvbS9zZW5kPw==";  /* DO NOT CHANGE OTHERWISE MESSAGES WILL NOT BE SENT */
   
    function __construct($array) { 
        $this->_CI = & get_instance();
        $this->MSGBUCKET_URL_md5 = md5(base64_decode($this->MSGBUCKET_URL_ENCODED)); 
    } 

    function sendSMS($to, $message) {
        
        $MSGBUCKET_URL = base64_decode($this->MSGBUCKET_URL_ENCODED); 
       
        $content = 'token=' . rawurlencode($this->MSGBUCKET_TOKEN) .
                '&msgtext=' . rawurlencode($message) .
                '&receiver=' . rawurlencode($to) ;
                
        $ch = curl_init($MSGBUCKET_URL . $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}

?>