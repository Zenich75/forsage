<?php

require_once 'config/emails.php';

$data['result'] = 'error';

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(isset($_POST) && isset($_POST['callback']) && is_array($_POST['callback']) && isset($_POST['callback']['name']) && isset($_POST['callback']['phone'])) {
        $subject = "Заявка на обратный звонок с сайта fsforsage.com.ua";
        $message = "Заявка на обратный звонок\n Имя: ".$_POST['callback']['name']."\nТелефон: ".$_POST['callback']['phone']."\nДата заявки: ".date('d/m/Y H:m:i', time());

        if(isset($emailsArr) && is_array($emailsArr)) {
            foreach ($emailsArr as $email) {
                mail($email, $subject, $message);
            }

            $data['result'] = 'success';
        }
    }
}


echo json_encode($data);
