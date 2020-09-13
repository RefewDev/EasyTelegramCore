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

require_once 'refew/EasyTelegramCore.php';
use \refew\EasyTelegramCore;

$settings = json_decode(file_get_contents(__DIR__ . "/refew/settings.json"), TRUE);

$token = $settings['TOKEN_API'];
$parse_mode = $settings['DEFAULT_parse_mode'];
$disable_web_page_preview = $settings['DEFAULT_disable_web_page_preview'];
$disable_notification = $settings['DEFAULT_disable_notification'];
$reply = $settings['DEFAULT_parse_mode'];
$timezone = $settings['TimeZone'];

if(strpos($timezone, "/")) date_default_timezone_set($timezone); else date_default_timezone_set('UTC');

$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

$bot = new EasyTelegramCore($token);

require 'refew/var.php';
require 'refew/func.php';

/*
 * Puoi modificare i comandi del bot su: EasyTelegramCore/plugins, in default c'è il file bot.php dove sono presenti alcuni esempi.
 *
 * You can modify the bot commands on: EasyTelegramCore/plugins, by default there is the bot.php file where there are some examples.
 */

foreach (glob(__DIR__."/plugins/*.php") as $plugin_file)
{
    include $plugin_file;
}
