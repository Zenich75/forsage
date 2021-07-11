<?php

require_once 'config/emails.php';

$data['result'] = 'error';

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(isset($_POST) && isset($_POST['callback']) && is_array($_POST['callback']) && isset($_POST['callback']['name']) && isset($_POST['callback']['phone'])) {
        $subject = "Callback request from fsforsage.com.ua";
        $message = "Callback request\r\n Name: ".$_POST['callback']['name']."\r\nPhone: ".$_POST['callback']['phone']."\r\nRequest date: ".date('d/m/Y H:m:i', time());

        if(isset($emailsArr) && is_array($emailsArr)) {
            foreach ($emailsArr as $email) {
                mail(strval($email), strval($subject), strval($message));
            }
            $data['result'] = 'success';
        }
    }
}


echo json_encode($data);
