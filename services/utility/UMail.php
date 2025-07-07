<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class UMail {

    public static function sendRentConfirm($user, $rent, $car, $amount, $start, $end) {
        $mailer = new PHPMailer(true);
       

        try {


            $mailer->isSMTP();
            $mailer->Host = HOST;
            $mailer->SMTPAuth = true;
            $mailer->Port = PORT;
            $mailer->Username = USERNAME;
            $mailer->Password = PASSWORD;
         

            $mailer->setFrom('provarental@gmail.com', 'duplexdrive');
            $mailer->addAddress($user->getEmail());

            $mailer->isHTML(false);
            $mailer->Subject = "Conferma ordine: " . $rent->getOrderId();
            $mailer->Body = "Gentile " . $user->getUsername() . ", il tuo ordine presso il nostro concessionario è confermato.\n" .
                          "Info del tuo ordine: " . $car->getBrand() . " " . $car->getModel() . "\n" .
                          "Dal: $start al $end\n" .
                          "Totale: €$amount\n" .
                          "Grazie e a presto.";

            $mailer->send();
        } catch (Exception $e) {
            error_log("Errore invio mail: {$mailer->ErrorInfo}");
        } 
    }
    public static function sendSaleConfirm($user, $sale, $car, $amount) {
        $mailer = new PHPMailer(true);

        try {

            $mailer->isSMTP();
            $mailer->Host = HOST;
            $mailer->SMTPAuth = true;
            $mailer->Port = PORT;
            $mailer->Username = USERNAME;
            $mailer->Password = PASSWORD;

            $mailer->setFrom('provarental@gmail.com', 'duplexdrive');
            $mailer->addAddress($user->getEmail());

            $mailer->isHTML(false);
            $mailer->Subject = "Conferma ordine: " . $sale->getOrderId();
            $mailer->Body = "Gentile " . $user->getUsername() . ", il tuo ordine presso il nostro concessionario è confermato.\n" .
                          "Info del tuo ordine: " . $car->getBrand() . " " . $car->getModel() . "\n" .
                          "Totale: €$amount\n" .
                          "Grazie e a presto.";     

            $mailer->send();
        } catch (Exception $e) {
            error_log("Errore invio mail: {$mailer->ErrorInfo}");   
        }
    }

    
    


}