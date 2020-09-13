<?php

if(strpos($message, "/start")!==false or strpos($message, "/avvia")!==false){
    $keyboard = array(
        array(
            array(
                "text" => "GitHub",
                "url" => "https://github.com/RefewDev/EasyTelegramCore"
            )
        ),
        array(
            array(
                "text" => "Telegram Channel",
                "url" => "https://t.me/EasyTelegramCore"
            )
        ),
        array(
            array(
                "text" => "Developer channel",
                "url" => "https://t.me/RefewDev"
            )
        )
    );
    /* or - oppure
     $keyboard[] = array(
         array(
             "text" => "GitHub",
            "url" => "https://github.com/RefewDev/EasyTelegramCore"
        )
     );
     $keyboard[] = array(
        array(
            "text" => "Telegram Channel",
            "url" => "https://t.me/EasyTelegramCore"
        )
     );
    */
    $keyboard = array("inline_keyboard" => $keyboard); // inline keyboard, please read https://core.telegram.org/bots#keyboards
    sendMessage($chatID, "Ciao <u>$nome</u>, questo bot è stato creato tramite <b>EasyTelegramCore</b>\n\nHi <u>$name</u>, this bot was created via <b>EasyTelegramCore</b>", "HTML", false, false, false, $keyboard);
}

if(strpos($message, "/help")!==false){
    $help = "Lista dei comandi | List of commands\n\n/start - /avvia\n/info\n/example\n/sendPhoto\n/framework";
    sendMessage($chatID, $help);
}


if(strpos($message, "/info")!==false){
    /*
     * Keyboard can be json or array.
     */
    $keyboard = '
    {
        "inline_keyboard":
        [
            [
                {"text":"GitHub","url":"https://github.com/RefewDev/EasyTelegramCore"}
            ],
            [
                {"text":"Telegram Channel","url":"https://t.me/EasyTelegramCore"}
            ],
            [
                {"text":"Developer channel","url":"https://t.me/RefewDev"}
            ]
        ]
    }';
    /*
     * $name = $nome
     * $last_name = $cognome
     * $chat_title = $titolo
     */
    sendMessage($chatID, "Info user:\n• Name: $name\n• FIRST_NAME: $first_name\n• LAST_NAME: $last_name\n• USERNAME: @$username\n• USERID: $userid\n• IS_BOT: $is_bot\n\nInfo chat:\n• CHAT_TITLE: $chat_title\n• CHATID: $chatid\n• CHAT_USERNAME: @$chat_username\n• CHAT_TYPE: $chat_type", "HTML", false, false, true, $keyboard);
}

if(strpos($text, "/example")!==false){
     $keyboard[] = array(
         array(
             "text" => "GitHub",
            "url" => "https://github.com/RefewDev/EasyTelegramCore"
        )
     );
     $keyboard[] = array(
        array(
            "text" => "Telegram Channel",
            "url" => "https://t.me/EasyTelegramCore"
        )
     );
    $keyboard[] = array(
        array(
            "text" => "Developer channel",
            "url" => "https://t.me/RefewDev"
        )
    );
    $keyboard = array("inline_keyboard" => $keyboard); // inline keyboard, please read https://core.telegram.org/bots#keyboards
    $message = sendMessage($chatID, "Ciao, questo messaggio verrà <u>eliminato</u> tra 5 secondi.\nHi, this message will be <u>cleared</u> in 5 seconds.", "HTML", false, false, $message_id, $keyboard);
    sleep(5);
    deleteMessage($chatID, $message['result']['message_id']);
    exit;
}

if(strpos($msg, "/sendPhoto")!==false){
    $keyboard[] = array(
        array(
            "text" => "GitHub",
            "url" => "https://github.com/RefewDev/EasyTelegramCore"
        ),
        array(
            "text" => "Telegram Channel",
            "url" => "https://t.me/EasyTelegramCore"
        ),
    );
    $keyboard[] = array(
        array(
            "text" => "Developer channel",
            "url" => "https://t.me/RefewDev"
        )
    );
    $keyboard[] = array(
        array(
            "text" => "sendNotification(show_alert:false)",
            "callback_data" => "/sendNotification"
        )
    );
    $keyboard[] = array(
        array(
            "text" => "sendNotification(show_alert:true)",
            "callback_data" => "/2sendNotification"
        )
    );
    $keyboard = array("inline_keyboard" => $keyboard);
    sendPhoto($chatID, "https://i.imgur.com/L4hyF5l.jpg", false, false, true, false, $keyboard);
}

if(strpos($message, "/sendNotification")!==false){
    sendNotification($callback_query_id, "🤩 sendNotification 🤩", false);
}

if(strpos($message, "/2sendNotification")!==false){
    sendNotification($callback_query_id, "🤩 sendNotification 🤩", true);
}

if(strpos($message, "/framework")!==false or strpos($message, "/coder")!==false or strpos($message, "/creator")!==false or strpos($message, "/base")!==false){
    $keyboard[] = array(
        array(
            "text" => "GitHub",
            "url" => "https://github.com/RefewDev/EasyTelegramCore"
        ),
        array(
            "text" => "Telegram Channel",
            "url" => "https://t.me/EasyTelegramCore"
        ),
    );
    $keyboard[] = array(
        array(
            "text" => "Developer channel",
            "url" => "https://t.me/RefewDev"
        )
    );
    $keyboard = array("inline_keyboard" => $keyboard);
    sendMessage($chatID, "Framework: <a href='https://github.com/RefewDev/EasyTelegramCore'>EasyTelegramCore</a> made by <a href='https://t.me/RefewDev'>Refew</a>", "HTML", true, false, true, $keyboard);
}
