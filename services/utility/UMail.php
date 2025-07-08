<?php
use Brevo\Client\Configuration;
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

class UMail {

    public static function sendRentConfirm($user, $rent, $car, $amount, $start, $end) {
       include_once __DIR__ . '/../../config/config.php';
       $apiKey = BREVO_API_KEY;

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
        $apiInstance = new TransactionalEmailsApi(new Client(), $config);

        $sendSmtpEmail = new SendSmtpEmail([
            'to' => [[
                'email' => $user->getEmail(),
                'name'  => $user->getUsername()
            ]],
            'sender' => [
                'email' => 'provarental@gmail.com',
                'name'  => 'duplexdrive'
            ],
            'subject' => 'Conferma ordine: ' . $rent->getOrderId(),
            'htmlContent' => "<p>Gentile " . $user->getUsername() . ", il tuo ordine presso il nostro concessionario è confermato.</p>" .
                             "<ul>" .
                             "<li>Auto: " . $car->getBrand() . " " . $car->getModel() . "</li>" .
                             "<li>Dal: $start al $end</li>" .
                             "<li>Totale: €$amount</li>" .
                             "</ul>" .
                             "<p>Grazie e a presto.</p>"
        ]);

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (\Exception $e) {
            error_log('Errore invio mail con Brevo: ' . $e->getMessage());
        }
    }
    public static function sendSaleConfirm($user, $sale, $car, $amount) {
         include_once __DIR__ . '/../../config/config.php';
        $apiKey = BREVO_API_KEY;

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
        $apiInstance = new TransactionalEmailsApi(new Client(), $config);

        $sendSmtpEmail = new SendSmtpEmail([
            'to' => [[
                'email' => $user->getEmail(),
                'name'  => $user->getUsername()
            ]],
            'sender' => [
                'email' => 'provarental@gmail.com',
                'name'  => 'duplexdrive'
            ],
            'subject' => 'Conferma ordine: ' . $sale->getOrderId(),
            'htmlContent' => "<p>Gentile " . $user->getUsername() . ", il tuo ordine presso il nostro concessionario è confermato.</p>" .
                             "<ul>" .
                             "<li>Auto: " . $car->getBrand() . " " . $car->getModel() . "</li>" .
                             "<li>Totale: €$amount</li>" .
                             "</ul>" .
                             "<p>Grazie e a presto.</p>"
        ]);

        try {
           
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
          
        } catch (\Exception $e) {
            error_log('Errore invio mail con Brevo: ' . $e->getMessage());
        }
    }

    


}