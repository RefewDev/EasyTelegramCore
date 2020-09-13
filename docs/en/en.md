# What is EasyTelegramCore?
It is a base developed in php that automates the connections to telegram bees and much more, it will help you to create telegram bots very easily!

It supports both Italian and English, configurable via the web in the settings.php file

------

## Requirements
- Hosting Service
- PHP 7.3 (or higher)
- SSL (telegram sends requests only to sites with ssl certificate)

## Installation
1) Download the "EasyTelegramCore" folder from github
2) Upload it to your hosting service, you can rename it to "EasyTelegramCore", but then, change it also in web
3) Go via web(via the browser) to your_domain_or_ip/directory_where_you_upload_easytelegramcore/EasyTelegramCore-master/EasyTelegramCore-master/settings.php
> Example: refewdev.altervista.org/EasyTelegramCore-master/EasyTelegramCore-master/settings.php
4) Follow what is shown
5) Choose your language

![1](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/1.png)

6) Set a secure password

![2](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/2.png)

7) Choose the settings for your bot
> In the log channel id you can also put your telegram id

![3](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/3.png)

> Example
![4](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/4.png)

8) After choosing the settings for your bot, you need to set the webhook simply by choosing the operation to set webhook and click "Execute", it will be set automatically from the base.

![5](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/5.png)

9) So if you have the right requirements, your bot should work.

![6](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/en/6.png)

## How do I add commands and functions?
Inside the folder "EasyTelegramCore/plugins" there is already an example file "bot.php", where the most common functions and variables and how to use them are shown.

Command list example:
1) /start - /avvio
2) /info
3) /example
4) /sendPhoto
5) /framework

To create other plugins/commands just create a .php file in the "plugins" folder in "EasyTelegramCore" and it will be loaded automatically, or simply by modifying the example file "bot.php"

Explanation:
------
     if(strpos($message, "/help")!==false){
        $help = "Lista dei comandi | List of commands\n\n/start - /avvia\n/info\n/example\n/sendPhoto\n/framework";
        sendMessage($chatID, $help);
      }
> $message and $chatID are the preset variables in the file "EasyTelegramCore/refew/var.php"

> sendMessage is the preset function in the file "EasyTelegramCore/refew/func.php"

Instead of writing sendMessage, you can also call the class and create the method on the spot:

    if(strpos($message, "/help")!==false){
        $help = "Lista dei comandi | List of commands\n\n/start - /avvia\n/info\n/example\n/sendPhoto\n/framework";
        $args = array("chat_id" => $chatID, "text" => $help);
        $bot->TelegramApi("sendMessage", $args);
      }
> The array had to be created to meet the necessary requirements of the method [sendMessage](https://core.telegram.org/bots/api#sendmessage)

Functions preset in the file "EasyTelegramCore/refew/func.php" (10):
- sendMessage
- editMessage
- deleteMessage
- sendNotification
- getChat
- getChatAdministrators
- getChatMembersCount
- leaveChat
- sendPhoto
- forwardMessage
> For more information on how to use them check the function file. 

You can see the preset variables by checking the file "EasyTelegramCore/refew/var.php"
> They are not all, I have to finish adding them, perhaps in the next update

### You can find more detailed explanations on functions and variables [clicking here](https://core.telegram.org/bots/api)
------

      The base has been tested only on Localhost(settings.php only), altervista.org and private webhosting.

## For any problem or question you can contact me on telegram:
### ⛈ [Telegram channel](https://t.me/RefewDev) ⛈
### 👨‍💻 [Telegram contact](https://t.me/Refew) 👨‍💻
