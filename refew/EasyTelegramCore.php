<?php

/**
 * ██████╗ ███████╗███████╗███████╗██╗    ██╗██████╗ ███████╗██╗   ██╗
 * ██╔══██╗██╔════╝██╔════╝██╔════╝██║    ██║██╔══██╗██╔════╝██║   ██║
 * ██████╔╝█████╗  █████╗  █████╗  ██║ █╗ ██║██║  ██║█████╗  ██║   ██║
 * ██╔══██╗██╔══╝  ██╔══╝  ██╔══╝  ██║███╗██║██║  ██║██╔══╝  ╚██╗ ██╔╝
 * ██║  ██║███████╗██║     ███████╗╚███╔███╔╝██████╔╝███████╗ ╚████╔╝
 * ╚═╝  ╚═╝╚══════╝╚═╝     ╚══════╝ ╚══╝╚══╝ ╚═════╝ ╚══════╝  ╚═══╝
 * EasyTelegramCore.class Version 1.0
 *
 * @author Refew ®
 * @copyright Copyright (c) 2020, Refew ®
 *
 * @link https://github.com/RefewDev/EasyTelegramCore
 */


namespace refew;

class EasyTelegramCore {

    var $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function TelegramApi($method, $data = [])
    {

        $url = "https://api.telegram.org/bot".$this->token."/".$method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if(!empty($data)) curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        if(!empty($response)) {
            $array = json_decode($response, TRUE);
            if(empty($array['ok']) && json_decode(file_get_contents(__DIR__."/settings.json"), TRUE)['LOG_CHANNEL']==true) $this->getError($array['description']);
        } else $array = array("error" => $error, "information" => $info);

        return $array;
    }

    public function getError($error)
    {
        $settings = json_decode(file_get_contents(__DIR__."/settings.json"), TRUE);
        if($settings['language'] == "italian") $error = "<b>Errore</b> → <code>".$error."</code>";
        elseif ($settings['language'] == "english") $error = "<b>Error</b> → <code>".$error."</code>";
        $this->TelegramApi("sendMessage", array('chat_id'=>$settings['LOG_CHANNEL_ID'],'text'=>$error,'parse_mode'=>'HTML'));
    }

    public function setWebHook($url, $language){
        $setwebhook = $this->TelegramApi("setWebhook", array("url" => $url));
        if(isset($setwebhook['ok']))
        {
            if($setwebhook['ok']==true && $setwebhook['result']==true && $setwebhook['description'] == "Webhook was set") {
                if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-success" role="alert">
                                          WebHook impostato con successo, il bot dovrebbe ora funzionare.
                                        </div>
                                        REFEW;
                elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-success" role="alert">
                                          WebHook set up successfully, the bot should now work.
                                        </div>
                                        REFEW;
            } else {
                if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Errore sconosciuto, non è stato possibile impostare il webhook.
                                        </div>
                                        REFEW;
                elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Unknown error, the webhook could not be set.
                                        </div>
                                        REFEW;
            }
        } else {
            if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Errore sconosciuto, non è stato possibile impostare il webhook.
                                        </div>
                                        REFEW;
            elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Unknown error, the webhook could not be set.
                                        </div>
                                        REFEW;
        }

    }

    public function deleteWebHook($language){
        $deletewebhook = $this->TelegramApi("deleteWebHook");
        if(isset($deletewebhook['ok']))
        {
            if($deletewebhook['ok']==true && $deletewebhook['result']==true && ($deletewebhook['description'] == "Webhook was deleted" or $deletewebhook['description'] == "Webhook is already deleted")) {
                if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-success" role="alert">
                                          WebHook rimosso con successo.
                                        </div>
                                        REFEW;
                elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-success" role="alert">
                                          WebHook successfully removed.
                                        </div>
                                        REFEW;
            } else {
                if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Errore sconosciuto, non è stato possibile rimuovere il webhook.
                                        </div>
                                        REFEW;
                elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Unknown error, the webhook could not be removed.
                                        </div>
                                        REFEW;
            }
        } else {
            if ($language == "italian") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Errore sconosciuto, non è stato possibile rimuovere il webhook.
                                        </div>
                                        REFEW;
            elseif ($language == "english") echo <<< REFEW
                                        <div class="alert alert-danger" role="alert">
                                          Unknown error, the webhook could not be removed.
                                        </div>
                                        REFEW;
        }

    }


}
