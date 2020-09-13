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

/**
 * sendMessage
 * Please check, first to use https://core.telegram.org/bots/api#sendmessage
 * @param $chatID
 * @param $message
 * @param string $parse_mode
 * @param bool $disable_web_page_preview
 * @param bool $disable_notification
 * @param int $reply
 * @param array $replyMarkup Array or Json
 * @return mixed
 */

function sendMessage($chatID, $message, $parse_mode = '', $disable_web_page_preview = false, $disable_notification = false, $reply = 0, $replyMarkup = []){
    global $bot, $settings;

    $data = array();
    $data['chat_id'] = $chatID;
    $data['text'] = $message;
    if(!empty($parse_mode)) $data['parse_mode'] = $parse_mode; else $data['parse_mode'] = $settings['DEFAULT_parse_mode'];
    if($disable_web_page_preview) $data['disable_web_page_preview'] = $disable_web_page_preview; else $data['disable_web_page_preview'] = $settings['DEFAULT_disable_web_page_preview'];
    if($disable_notification) $data['disable_notification'] = $disable_notification; else $data['disable_notification'] = $settings['DEFAULT_disable_notification'];
    if(!empty($reply)){
        if(is_bool($reply)){
            if($reply===true) global $message_id; $data['reply_to_message_id'] = $message_id;
        } else $data['reply_to_message_id'] = $reply;
    }
    if(!empty($replyMarkup)){
        if(is_array($replyMarkup)) $replyMarkup = json_encode($replyMarkup);
        $data['reply_markup'] = $replyMarkup;
    }

    return $bot->TelegramApi("sendMessage", $data);
}

/**
 * editMessage (Text)
 * Please check, first to use https://core.telegram.org/bots/api#editmessagetext
 * @param $chatID
 * @param $message_id
 * @param $text
 * @param string $parse_mode
 * @param bool $disable_web_page_preview
 * @param array $replyMarkup Array or Json
 * @return mixed
 */

function editMessage($chatID, $message_id, $text, $parse_mode = '', $disable_web_page_preview = false, $replyMarkup = []) {
    global $bot, $settings;

    $data = array();
    $data['chat_id'] = $chatID;
    $data['message_id'] = $message_id;
    $data['text'] = $text;
    if(!empty($parse_mode)) $data['parse_mode'] = $parse_mode; else $data['parse_mode'] = $settings['DEFAULT_parse_mode'];
    if($disable_web_page_preview) $data['disable_web_page_preview'] = $disable_web_page_preview; else $data['disable_web_page_preview'] = $settings['DEFAULT_disable_web_page_preview'];
    if(!empty($replyMarkup)){
        if(is_array($replyMarkup)) $replyMarkup = json_encode($replyMarkup);
        $data['reply_markup'] = $replyMarkup;
    }

    return $bot->TelegramApi("editMessageText", $data);
}

/**
 * deleteMessage
 * Please check, first to use https://core.telegram.org/bots/api#deletemessage
 * @param $chatID
 * @param $message_id
 * @return mixed
 */

function deleteMessage($chatID, $message_id) {
    global $bot;

    $data = array();
    $data['chat_id'] = $chatID;
    $data['message_id'] = $message_id;

    return $bot->TelegramApi("deleteMessage", $data);
}

/**
 * sendNotification - answerCallbackQuery
 * Please check, first to use https://core.telegram.org/bots/api#answercallbackquery
 * @param $callback_query_id
 * @param $text
 * @param bool $show_altert
 * @param string $url
 * @param int $cache_time
 * @return mixed
 */

function sendNotification($callback_query_id, $text, $show_altert = false, $url = '', $cache_time = 0) {
    global $bot;

    $data = array();
    $data['callback_query_id'] = $callback_query_id;
    $data['text'] = $text;
    $data['show_alert'] = $show_altert;
    if(!empty($url)) $data['url'] = $url;
    $data['cache_time'] = $cache_time;

    return $bot->TelegramApi("answerCallbackQuery", $data);
}

/**
 * getChat
 * Please check, first to use https://core.telegram.org/bots/api#getchat
 * @param $chatID
 * @return mixed
 */

function getChat($chatID) {
    global $bot;

    return $bot->TelegramApi("getChat", array("chat_id" => $chatID));
}

/**
 * getChatAdministrators
 * Please check, first to use https://core.telegram.org/bots/api#getchatadministrators
 * @param $chatID
 * @return mixed
 */

function getChatAdministrators($chatID) {
    global $bot;

    return $bot->TelegramApi("getChatAdministrators", array("chat_id" => $chatID));
}

/**
 * getChatMembersCount
 * Please check, first to use https://core.telegram.org/bots/api#getchatmemberscount
 * @param $chatID
 * @return mixed
 */

function getChatMembersCount($chatID) {
    global $bot;

    return $bot->TelegramApi("getChatMembersCount", array("chat_id" => $chatID));
}

/**
 * leaveChat
 * Please check, first to use https://core.telegram.org/bots/api#leavechat
 * @param $chatID
 * @return mixed
 */

function leaveChat($chatID) {
    global $bot;

    return $bot->TelegramApi("leaveChat", array("chat_id" => $chatID));
}

/**
 * sendPhoto
 * Please check, first to use https://core.telegram.org/bots/api#sendphoto
 * @param $chatID
 * @param $photo
 * @param string $text
 * @param string $parse_mode
 * @param bool $disable_notification
 * @param int $reply
 * @param array $replyMarkup Array or Json
 * @return mixed
 */

function sendPhoto($chatID, $photo, $text = '', $parse_mode = '', $disable_notification = false, $reply = 0, $replyMarkup = []) {
    global $bot, $settings;

    $data = array();
    $data['chat_id'] = $chatID;
    $data['photo'] = $photo;
    if(!empty($text)) $data['caption'] = $text;
    if(!empty($parse_mode)) $data['parse_mode'] = $parse_mode; else $data['parse_mode'] = $settings['DEFAULT_parse_mode'];
    if($disable_notification) $data['disable_notification'] = $disable_notification; else $data['disable_notification'] = $settings['DEFAULT_disable_notification'];
    if(!empty($reply)){
        if(is_bool($reply)){
            if($reply===true) global $message_id; $data['reply_to_message_id'] = $message_id;
        } else $data['reply_to_message_id'] = $reply;
    }
    if(!empty($replyMarkup)){
        if(is_array($replyMarkup)) $replyMarkup = json_encode($replyMarkup);
        $data['reply_markup'] = $replyMarkup;
    }

    return $bot->TelegramApi("sendPhoto", $data);
}

/**
 * forwardMessage
 * Please check, first to use https://core.telegram.org/bots/api#forwardmessage
 * @param $chatID
 * @param $message_id
 * @param $from_chat_id
 * @param bool $disable_notification
 * @return mixed
 */

function forwardMessage($chatID, $message_id, $from_chat_id, $disable_notification = false) {
    global $bot, $settings;

    $data = array();
    $data['chat_id'] = $chatID;
    $data['from_chat_id'] = $from_chat_id;
    if($disable_notification) $data['disable_notification'] = $disable_notification; else $data['disable_notification'] = $settings['DEFAULT_disable_notification'];
    $data['message_id'] = $message_id;

    return $bot->TelegramApi("forwardMessage", $data);
}