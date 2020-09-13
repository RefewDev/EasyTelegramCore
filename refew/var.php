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
 * Variables
 * Please check, first to use https://core.telegram.org/bots/api#available-types
 */

if($update["edited_message"]) $update["message"] = $update["edited_message"]; elseif ($update["channel_post"]) $update["message"] = $update["channel_post"]; elseif ($update["edited_channel_post"]) $update["message"] = $update["edited_channel_post"];
$chatid = $chatID = $update["message"]["chat"]["id"];
$message = $text = $msg = $update["message"]["text"];
$userid = $userID = $update["message"]["from"]["id"];
$is_bot = $update["message"]["from"]["is_bot"];
if(isset($update["message"]["from"]["username"])) $username = $update["message"]["from"]["username"];
$first_name = $update["message"]["from"]["first_name"];
if(isset($update["message"]["from"]["last_name"])) $last_name = $cognome = $update["message"]["from"]["last_name"];
$name = $nome = $first_name." ".$last_name;
if(isset($update["message"]["from"]["language_code"])) $language_code = $language = $update["message"]["from"]["language_code"];
$message_id = $msgid = $msgID = $update["message"]["message_id"];
$date = $data = $update["message"]["date"];

$chat_type = $type_chat = $typechat = $update["message"]["chat"]["type"];
$chat_title = $titolo_chat = $title = $titolo = $update["message"]["chat"]["title"];
$chat_username = $username_chat = $update["message"]["chat"]["username"];

if($update["callback_query"])
{
    $callback_id = $callback_query_id = $cbid = $update["callback_query"]["id"];
    if($update["callback_query"]["data"]) $callback_data = $callback_query_data = $cbdata = $message = $text = $msg = $update["callback_query"]["data"];
    $message_id = $update["callback_query"]["message"]["message_id"];
    $chatID = $update["callback_query"]["message"]["chat"]["id"];
    $userid = $userID = $update["callback_query"]["from"]["id"];
    $is_bot = $update["callback_query"]["from"]["is_bot"];
    if(isset($update["callback_query"]["from"]["username"])) $username = $update["callback_query"]["from"]["username"];
    $first_name = $update["callback_query"]["from"]["first_name"];
    if(isset($update["callback_query"]["from"]["last_name"])) $last_name = $cognome = $update["callback_query"]["from"]["last_name"];
    $name = $nome = $first_name." ".$last_name;
    if(isset($update["callback_query"]["from"]["language_code"])) $language_code = $language = $update["callback_query"]["from"]["language_code"];
}

if($update['message']['reply_to_message'])
{
    $reply_chatid = $reply_chatID = $update["message"]["reply_to_message"]["chat"]["id"];
    $reply_message = $reply_text = $reply_msg = $update["message"]["reply_to_message"]["text"];
    $reply_userid = $reply_userID = $update["message"]["reply_to_message"]["from"]["id"];
    $reply_is_bot = $update['message']["reply_to_message"]["from"]["is_bot"];
    if(isset($update["message"]["reply_to_message"]["from"]["username"])) $reply_username = $update["message"]["reply_to_message"]["from"]["username"];
    $reply_first_name = $update["message"]["reply_to_message"]["from"]["first_name"];
    if(isset($update["message"]["reply_to_message"]["from"]["last_name"])) $reply_last_name = $reply_cognome = $update["message"]["reply_to_message"]["from"]["last_name"];
    $reply_name = $reply_nome = $reply_first_name." ".$reply_last_name;
    if(isset($update['message']["reply_to_message"]["from"]["language_code"])) $reply_language_code = $reply_language = $update['message']["reply_to_message"]["from"]["language_code"];
    $reply_message_id = $reply_msgid = $reply_msgID = $update["message"]["reply_to_message"]["message_id"];
    $reply_date = $reply_data = $update["message"]["reply_to_message"]["date"];
}
