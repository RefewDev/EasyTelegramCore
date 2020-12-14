<?php

if (PHP_VERSION < 7.3) die('EasyTelegramCore require PHP 7.3 or higher<br> Your PHP version: ' . PHP_VERSION);

ob_start();

require_once 'refew/EasyTelegramCore.php';

use \refew\EasyTelegramCore;

$settings = json_decode(file_get_contents(__DIR__ . "/refew/settings.json"), TRUE);

if(isset($settings['password'])) $password = $settings['password'];
if(isset($settings['language'])) $language = $settings['language'];

if (!empty($settings['TOKEN_API'])) $bot = new EasyTelegramCore($settings['TOKEN_API']);


$url = file_get_contents('https://raw.githubusercontent.com/RefewDev/EasyTelegramCore/master/settings.php');
$output = __FILE__;

if (file_get_contents($output) !== $url) {
    file_put_contents($output, $url);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron"/>
    <link rel="icon" href="https://telegram.org/favicon.ico">

    <title>EasyTelegramCore | Settings</title>
</head>
<body>
<div id="particles-js"></div>

<div class="container" style="padding-right:15%;padding-left:15%;position: sticky;">
    <br><br><br>
    <easytelegramcore>EasyTelegramCore</easytelegramcore>
    <center><a href="https://t.me/RefewDev" target="_blank"><easytelegramcore style="font-size: 20px;">Coded by Refew</easytelegramcore></a></center>
    <br><br>
    <?php

    function login()
    {
        global $language, $bot;
        try {
            $bot_info = $bot->TelegramApi("getMe");
        } catch (Error $e) {
            header("Refresh:0");
        }
        if ($bot_info['ok'] == false) {
            if ($bot_info['description'] == "Not Found") {
                if ($language == "italian") echo <<< REFEW
                <div class="alert alert-danger" role="alert">
                  Bot token invalido.<br>È necessario cambiarlo manualmente modificando "TOKEN_API" nel file settings su refew/setings.json
                </div>
            <form style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Gestione Bot</easytelegramcore><br><br></center>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <br><br><br>    
              </div>
            </form>
          REFEW;
                elseif ($language == "english") echo <<< REFEW
                <div class="alert alert-danger" role="alert">
                  Invalid token bot.<br>You need to change it manually by editing "TOKEN_API" in the settings file at refew/setings.json
                </div>
             <form style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Bot Management</easytelegramcore><br><br></center>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <br><br><br>    
              </div>
            </form>
        REFEW;
            } else {
                if ($language == "italian") echo <<< REFEW
                  <div class="alert alert-danger" role="alert">
                    Errore sconosciuto.
                </div>
            <form style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Gestione Bot</easytelegramcore><br><br></center>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <br><br><br>    
              </div>
            </form>
          REFEW;
                elseif ($language == "english") echo <<< REFEW
                <div class="alert alert-danger" role="alert">
                          Unknown error.
                </div>
             <form style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Bot Management</easytelegramcore><br><br></center>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <br><br><br>    
              </div>
            </form>
        REFEW;
            }
        } else {
            $webhook = $bot->TelegramApi("getWebhookInfo");
            if (empty($webhook['result']['url'])) {
                if ($language == "italian") {
                    $webhook_html = "<div class=\"form-group row\">
                        <div class=\"col-sm-2\">
                        <legend class=\"col-form-label col-sm-2 pt-0\">URL</legend>
                        </div>
                        <div class=\"col-sm-10\">
                          <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['url']}</legend>
                        </div>
                      </div>";
                } elseif ($language == "english") {
                    $webhook_html = "<div class=\"form-group row\">
                        <div class=\"col-sm-2\">
                        <legend class=\"col-form-label col-sm-2 pt-0\">URL</legend>
                        </div>
                        <div class=\"col-sm-10\">
                          <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['url']}</legend>
                        </div>
                      </div>";
                }
            } else {
                $webhook_html = "
                  <div class=\"form-group row\">
                    <div class=\"col-sm-2\">
                    <legend class=\"col-form-label col-sm-2 pt-0\">Url</legend>
                    </div>
                    <div class=\"col-sm-10\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['url']}</legend>
                    </div>
                  </div>";
                if ($language == "italian") {
                    if (isset($webhook['result']['max_connections'])) $webhook_html .= "<div class=\"form-group row\">
                    <div class=\"col-sm-2\">
                    <legend class=\"col-form-label col-sm-2 pt-0\">Limite</legend>
                    </div>
                    <div class=\"col-sm-10\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['max_connections']}</legend>
                    </div>
                  </div>";
                    if (isset($webhook['result']['last_error_message'])) {
                        $data = date('d M Y H:i:s', $webhook['result']['last_error_date']);
                        $webhook_html .= "<div class=\"form-group row\">
                    <div class=\"col-sm-4\" style=\"margin-right: -16%;\">
                    <legend class=\"col-form-label col-sm-12 pt-0\">Ultimo errore</legend>
                    </div>
                    <div class=\"col-sm-8\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['last_error_message']}</legend>
                    </div>
                  </div>
                  <div class=\"form-group row\">
                    <div class=\"col-sm-5\" style=\"margin-right: -15%;\">
                    <legend class=\"col-form-label col-sm-12 pt-0\">Data dell'ultimo errore</legend>
                    </div>
                    <div class=\"col-sm-6\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$data}</legend>
                    </div>
                  </div>";
                    }
                } elseif ($language == "english") {
                    if (isset($webhook['result']['max_connections'])) $webhook_html .= "<div class=\"form-group row\">
                    <div class=\"col-sm-2\">
                    <legend class=\"col-form-label col-sm-2 pt-0\">Limit</legend>
                    </div>
                    <div class=\"col-sm-10\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['max_connections']}</legend>
                    </div>
                  </div>";
                    if (isset($webhook['result']['last_error_message'])) {
                        $data = date('d M Y H:i:s', $webhook['result']['last_error_date']);
                        $webhook_html .= "<div class=\"form-group row\">
                    <div class=\"col-sm-4\" style=\"margin-right: -16%;\">
                    <legend class=\"col-form-label col-sm-12 pt-0\">Last error</legend>
                    </div>
                    <div class=\"col-sm-8\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$webhook['result']['last_error_message']}</legend>
                    </div>
                  </div>
                  <div class=\"form-group row\">
                    <div class=\"col-sm-5\" style=\"margin-right: -15%;\">
                    <legend class=\"col-form-label col-sm-12 pt-0\">Date of the last error</legend>
                    </div>
                    <div class=\"col-sm-6\">
                      <legend class=\"col-form-label col-sm-12 pt-0\">{$data}</legend>
                    </div>
                  </div>";
                    }
                }
            }

            if ($language == "italian") echo <<< REFEW
            <form method="post" style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Gestione Bot</easytelegramcore><br></center>
            <br><easytelegramcore style="font-size: 20px;">- Informazioni</easytelegramcore><br>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">ID</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['id']}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Nome</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['first_name']}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Username</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['username']}</legend>
                    </div>
                  </div>
                  <br><easytelegramcore style="font-size: 20px;">- WebHook</easytelegramcore><br>
                  {$webhook_html}
                  <div class="form-group">
                        <label style="color: black;font-style: inherit;" for="operation">Operazione</label> 
                        <div>
                          <select id="operation" name="operation" required="required" class="custom-select">
                            <option value="setwebhook">Imposta WebHook</option>
                            <option value="deletewebhook">Rimuovi WebHook</option>
                          </select>
                        </div>
                   </div> 
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Esegui</button>
                        </div>
                  <br><br><br>    
              </div>
            </form>
          REFEW;
            elseif ($language == "english") echo <<< REFEW
            <form method="post" style="Color:#007bff;background-color:white; border-radius:20px;">
            <div class="container-fluid">
            <center><br><easytelegramcore style="font-size: 30px;">Bot Management</easytelegramcore><br></center>
            <br><easytelegramcore style="font-size: 20px;">- Information</easytelegramcore><br>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Token</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot->getToken()}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">ID</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['id']}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Name</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['first_name']}</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    <legend class="col-form-label col-sm-2 pt-0">Username</legend>
                    </div>
                    <div class="col-sm-10">
                      <legend class="col-form-label col-sm-12 pt-0">{$bot_info['result']['username']}</legend>
                    </div>
                  </div>
                  <br><easytelegramcore style="font-size: 20px;">- WebHook</easytelegramcore><br>
                  {$webhook_html}
                  <div class="form-group">
                        <label style="color: black;font-style: inherit;" for="operation">Operation</label> 
                        <div>
                          <select id="operation" name="operation" required="required" class="custom-select">
                            <option value="setwebhook">Set up WebHook</option>
                            <option value="deletewebhook">Remove WebHook</option>
                          </select>
                        </div>
                   </div> 
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Execute</button>
                        </div>
                  <br><br><br>    
              </div>
            </form>
          REFEW;
        }
    }

    $registerLanguage = <<< REFEW
          <form method="post">
          <div class="form-group">
            <label for="select">Choose your language</label> 
            <div>
              <select id="language" name="language" class="custom-select" required="required">
                <option value="italian" name="language">Italian</option>
                <option value="english" name="language">English</option>
              </select>
            </div>
          </div> 
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
        REFEW;

    if (isset($_REQUEST['language']) && !isset($_COOKIE['language'])) {
        setcookie("language", $_REQUEST['language']);
        if ($_REQUEST['language'] == "italian") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Lingua impostata correttamente
            </div>
          REFEW;
        elseif ($_REQUEST['language'] == "english") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Language set correctly
            </div>
        REFEW;
        header("Refresh:2");
    }
    if (isset($_REQUEST['password']) && !isset($_COOKIE['password'])) {
        setcookie("password", password_hash($_REQUEST['password'], PASSWORD_DEFAULT));
        if ($_REQUEST['language'] == "italian") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Password impostata correttamente
            </div>
          REFEW;
        elseif ($_REQUEST['language'] == "english") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Password set correctly
            </div>
        REFEW;
        header("Refresh:2");
    }
    if (isset($_REQUEST['TOKEN_API'])) {
        file_put_contents(__DIR__ . "/refew/settings.json", json_encode(array(
            "TOKEN_API" => $_REQUEST["TOKEN_API"],
            "DEFAULT_parse_mode" => $_REQUEST["parse_mode"],
            "DEFAULT_disable_web_page_preview" => $_REQUEST["DEFAULT_disable_web_page_preview"],
            "DEFAULT_disable_notification" => $_REQUEST["DEFAULT_disable_notification"],
            "TimeZone" => $_REQUEST["timezone"],
            "LOG_CHANNEL" => $_REQUEST["LOG_CHANNEL"],
            "LOG_CHANNEL_ID" => $_REQUEST["LOG_CHANNEL_ID"],
            "language" => $_COOKIE['language'],
            "password" => $_COOKIE['password']
        )));
        $password = $_COOKIE['password'];
        $language = $_COOKIE['language'];
        $settings = json_decode(file_get_contents(__DIR__ . "/refew/settings.json"), TRUE);
    }

    if(isset($_REQUEST['operation'])){
        if($_REQUEST['operation'] == "setwebhook"){
            $page_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = "https://" . str_replace("settings", "index.php", explode(".php", $page_url)[0]);
            $bot->setWebHook($url, $language);
        } elseif($_REQUEST['operation'] == "deletewebhook") $bot->deleteWebHook($language);
    }

    if (isset($_REQUEST['login_password'])) {
        if (password_verify($_REQUEST['login_password'], $password)) {
            setcookie("password", $_REQUEST['login_password']);
            if ($language == "italian") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Login effettuato con successo
            </div>
          REFEW;
            elseif ($language == "english") echo <<< REFEW
             <div class="alert alert-success" role="alert">
              Login successful
            </div>
        REFEW;
            header("Refresh:2");
        } else {
            if ($language == "italian") echo <<< REFEW
             <div class="alert alert-danger" role="alert">
              Password sbagliata, riprova.
            </div>
          REFEW;
            elseif ($language == "english") echo <<< REFEW
             <div class="alert alert-danger" role="alert">
              Wrong password, please try again.
            </div>
        REFEW;
        }
    }


    if (empty($password) || empty($language)) {
        if (empty($_COOKIE['language'])) echo $registerLanguage;
        elseif (empty($_COOKIE['password'])) echo registerPassword($_COOKIE['language']);
        elseif (!empty($_COOKIE['password']) && !empty($_COOKIE['language'])) echo registerBot($_COOKIE['language']);
    } else {
        if (isset($_COOKIE['password'])) login();
        else doLogin();
    }

    function doLogin()
    {
        global $language;
        if ($language == "italian") echo <<< REFEW
             <form method="post">
              <div class="form-group">
                <label for="password">Inserisci la tua password</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-lock"></i>
                    </div>
                  </div> 
                  <input id="login_password" name="login_password" placeholder="Password" type="password" required="required" class="form-control">
                </div>
              </div> 
              <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
              </div>
             </form>
          REFEW;
        elseif ($language == "english") echo <<< REFEW
             <form method="post">
              <div class="form-group">
                <label for="password">Enter your password</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-lock"></i>
                    </div>
                  </div> 
                  <input id="login_password" name="login_password" placeholder="Password" type="password" required="required" class="form-control">
                </div>
              </div> 
              <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
              </div>
             </form>
        REFEW;
    }

    function registerPassword($language)
    {
        if ($language == "italian") return <<< REFEW
             <form method="post">
              <div class="form-group">
                <label for="text">Sicurezza Account</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-expeditedssl"></i>
                    </div>
                  </div> 
                  <input id="password" name="password" placeholder="Inserisci una Password" type="password" required="required" class="form-control" aria-describedby="textHelpBlock">
                </div> 
                <span id="textHelpBlock" class="form-text text-muted">➥ La tua password verrà salvata criptata nel file refew/settings.json</span>
              </div> 
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrati</button>
              </div>
             REFEW;
        elseif ($language == "english") return <<< REFEW
             <form method="post">
              <div class="form-group">
                <label for="text">Account Security</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-expeditedssl"></i>
                    </div>
                  </div> 
                  <input id="password" name="password" placeholder="Enter a Password" type="password" required="required" class="form-control" aria-describedby="textHelpBlock">
                </div> 
                <span id="textHelpBlock" class="form-text text-muted">➥ Your password will be saved encrypted in the refew/settings.json file</span>
              </div> 
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
            </form>
        REFEW;
    }

    function registerBot($language)
    {
        if ($language == "italian") return <<< REFEW
            <form>
              <div class="form-group">
                <label for="TOKEN_API">Bot Token</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-telegram"></i>
                    </div>
                  </div> 
                  <input id="TOKEN_API" name="TOKEN_API" placeholder="Inserisci il token del bot" type="text" required="required" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="timezone">Fuso Orario</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div> 
                  <input id="timezone" name="timezone" placeholder="Inserisci il tuo fuso orario, consigliato Europe/Rome" type="text" class="form-control" required="required" aria-describedby="timezoneHelpBlock">
                </div> 
                <span id="timezoneHelpBlock" class="form-text text-muted">➥ Controlla https://www.w3schools.com/php/php_ref_timezones.asp</span>
              </div>
              <div class="form-group">
                <label>Formattazione predefinita</label> 
                <div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="parse_mode" id="parse_mode_0" type="radio" class="custom-control-input" value="HTML" required="required" aria-describedby="parse_modeHelpBlock"> 
                    <label for="parse_mode_0" class="custom-control-label">Html</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="parse_mode" id="parse_mode_1" type="radio" class="custom-control-input" value="MARKDOWN" required="required" aria-describedby="parse_modeHelpBlock"> 
                    <label for="parse_mode_1" class="custom-control-label">Markdown</label>
                  </div> 
                  <span id="parse_modeHelpBlock" class="form-text text-muted">➥ Controlla https://core.telegram.org/bots/api#formatting-options</span>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_disable_web_page_preview">Disabilita l anteprima della pagina web nei link di DEFAULT</label> 
                <div>
                  <select id="DEFAULT_disable_web_page_preview" name="DEFAULT_disable_web_page_preview" class="custom-select" required="required">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_disable_notification">Disabilita la notifica dei messaggi del bot su telegram di DEFAULT</label> 
                <div>
                  <select id="DEFAULT_disable_notification" name="DEFAULT_disable_notification" class="custom-select" required="required">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_reply_to_message_id">Il bot risponde(via reply) ad ogni messaggio su telegram di DEFAULT</label> 
                <div>
                  <select id="DEFAULT_reply_to_message_id" name="DEFAULT_reply_to_message_id" required="required" class="custom-select">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="LOG_CHANNEL">Se è presente un errore, il bot lo invierà ad un canale log</label> 
                <div>
                  <select id="LOG_CHANNEL" name="LOG_CHANNEL" class="custom-select" required="required" onchange="Check(this);">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div> 
              <div id="optional" class="form-group" style="display: block;">
               <label for="LOG_CHANNEL_ID">ID del canale log</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-500px"></i>
                    </div>
                  </div> 
                  <input id="LOG_CHANNEL_ID" name="LOG_CHANNEL_ID" placeholder="Inserisci l'id del canale dove vuoi mandare gli errori del bot" type="text" required="required" class="form-control">
                </div>
              </div> 
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Avanti</button>
              </div>
            </form>
        REFEW;
        elseif ($language == "english") return <<< REFEW
            <form>
              <div class="form-group">
                <label for="TOKEN_API">Bot Token</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-telegram"></i>
                    </div>
                  </div> 
                  <input id="TOKEN_API" name="TOKEN_API" placeholder="Enter the bot token" type="text" required="required" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="timezone">Time zone</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div> 
                  <input id="timezone" name="timezone" placeholder="Enter your time zone, recommended Europe/Rome" type="text" class="form-control" required="required" aria-describedby="timezoneHelpBlock">
                </div> 
                <span id="timezoneHelpBlock" class="form-text text-muted">➥ Check https://www.w3schools.com/php/php_ref_timezones.asp</span>
              </div>
              <div class="form-group">
                <label>Default parse mode</label> 
                <div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="parse_mode" id="parse_mode_0" type="radio" class="custom-control-input" value="HTML" required="required" aria-describedby="parse_modeHelpBlock"> 
                    <label for="parse_mode_0" class="custom-control-label">Html</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="parse_mode" id="parse_mode_1" type="radio" class="custom-control-input" value="MARKDOWN" required="required" aria-describedby="parse_modeHelpBlock"> 
                    <label for="parse_mode_1" class="custom-control-label">Markdown</label>
                  </div> 
                  <span id="parse_modeHelpBlock" class="form-text text-muted">➥ Check https://core.telegram.org/bots/api#formatting-options</span>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_disable_web_page_preview">Disable web page preview in DEFAULT links</label> 
                <div>
                  <select id="DEFAULT_disable_web_page_preview" name="DEFAULT_disable_web_page_preview" class="custom-select" required="required">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_disable_notification">Disable bot message notification on DEFAULT telegram</label> 
                <div>
                  <select id="DEFAULT_disable_notification" name="DEFAULT_disable_notification" class="custom-select" required="required">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="DEFAULT_reply_to_message_id">The bot replies (via reply) to every message on the DEFAULT telegram</label> 
                <div>
                  <select id="DEFAULT_reply_to_message_id" name="DEFAULT_reply_to_message_id" required="required" class="custom-select">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="LOG_CHANNEL">If there is an error, the bot will send it to a log channel</label> 
                <div>
                  <select id="LOG_CHANNEL" name="LOG_CHANNEL" class="custom-select" required="required" onchange="Check(this);">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </select>
                </div>
              </div> 
              <div id="optional" class="form-group" style="display: block;">
               <label for="LOG_CHANNEL_ID">Channel ID log</label> 
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-500px"></i>
                    </div>
                  </div> 
                  <input id="LOG_CHANNEL_ID" name="LOG_CHANNEL_ID" placeholder="Enter the id of the channel where you want to send bot errors" type="text" required="required" class="form-control">
                </div>
              </div> 
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
            </form>
        REFEW;
    }


    ?>
</div>

<style>
    easytelegramcore {
        font-size: 60px;
        color: #007bff;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
    }

    label, span {
        color: #d9d9d9;
        font-family: 'Orbitron', sans-serif;
        font-style: italic;
    }

    legend {
        color: #007bff;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        font-size: large;
    }
</style>

<script>
    function Check(that) {
        if (that.value == "false") {
            document.getElementById("optional").style.display = "none";
        } else {
            document.getElementById("optional").style.display = "block";
        }
    }
</script>


<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<style>
    /* ---- reset ---- */
    body {
        margin: 0;
        font: normal 75% Arial, Helvetica, sans-serif;
    }

    canvas {
        display: block;
        vertical-align: bottom;
    }

    /* ---- particles.js container ---- */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: black;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
    }

    /* ---- stats.js ---- */
    .count-particles {
        background: #000022;
        position: absolute;
        top: 48px;
        left: 0;
        width: 80px;
        color: #13E8E9;
        font-size: .8em;
        text-align: left;
        text-indent: 4px;
        line-height: 14px;
        padding-bottom: 2px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    .js-count-particles {
        font-size: 1.1em;
    }

    #stats, .count-particles {
        -webkit-user-select: none;
        margin-top: 5px;
        margin-left: 5px;
    }

    #stats {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .count-particles {
        border-radius: 0 0 3px 3px;
    }
</style>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {"value": 80, "density": {"enable": true, "value_area": 800}},
            "color": {"value": "#ffffff"},
            "shape": {
                "type": "circle",
                "stroke": {"width": 0, "color": "#000000"},
                "polygon": {"nb_sides": 5},
                "image": {"src": "img/github.svg", "width": 100, "height": 100}
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {"enable": false, "speed": 1, "opacity_min": 0.1, "sync": false}
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {"enable": false, "speed": 40, "size_min": 0.1, "sync": false}
            },
            "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1},
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {"enable": false, "rotateX": 600, "rotateY": 1200}
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {"enable": false, "mode": "repulse"},
                "onclick": {"enable": false, "mode": "remove"},
                "resize": true
            },
            "modes": {
                "grab": {"distance": 400, "line_linked": {"opacity": 1}},
                "bubble": {"distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3},
                "repulse": {"distance": 200, "duration": 0.4},
                "push": {"particles_nb": 4},
                "remove": {"particles_nb": 2}
            }
        },
        "retina_detect": true
    });
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function () {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
    ;
</script>
</body>
</html>
