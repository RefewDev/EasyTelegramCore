# Cos'è EasyTelegramCore?
E' una base sviluppata in php utilizzando le api di telegram, ti aiuterà a creare telegram bot molto facilmente!

Supporta sia italiano che inglese, configurabile via web nel file settings.php

------

## Requisiti
- Servizio Hosting
- PHP 7.3 (o superiore)
- SSL (telegram invia richieste solo a siti con certificato ssl)

## Installazione
1) Scarica la cartella "EasyTelegramCore" da github
2) Caricarla nel vostro servizio hosting
3) Andare via web(tramite il browser) su tuo_dominio_o_ip/directory_dove_avete_caricato_easytelegramcore/EasyTelegramCore/settings.php
> Esempio: refewdev.altervista.org/EasyTelegramCore/settings.php
4) Seguire ciò che viene mostrato
5) Scegliere la lingua

![1](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/1.png)

6) Impostare una password sicura

![2](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/2.png)

7) Scegliere le impostazioni per il proprio bot
> Nell'id del canale log potete mettere anche il vostro id telegram

![3](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/3.png)

> Esempio
![4](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/4.png)

8) Dopo aver scelto le impostazioni per il vostro bot, è necessario impostare il webhook semplicemente scegliendo l'operazione di impostare webhook e cliccare "Esegui", verrà impostato in automatico dalla base.

![5](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/5.png)

9) Dunque, se avete i requisiti giusti il vostro bot dovrebbe funzionare.

![6](https://github.com/RefewDev/EasyTelegramCore/blob/master/docs/it/6.png)

## Come aggiungo i comandi e le funzioni?
All'interno della cartella "EasyTelegramCore/plugins" è presente già un file di esempio "bot.php", dove vengono mostrate le funzioni e variabili più comuni e come usarle.

Lista comandi esempio:
1) /start - /avvio
2) /info
3) /example
4) /sendPhoto
5) /framework

Per creare altri plugin/comadni basterà creare un file .php nella cartella "plugins" in "EasyTelegramCore" e verrà caricato automaticamente, oppure modificando semplicemente il file di esempio "bot.php"

Spiegazione:
------
     if(strpos($message, "/help")!==false){
        $help = "Lista dei comandi | List of commands\n\n/start - /avvia\n/info\n/example\n/sendPhoto\n/framework";
        sendMessage($chatID, $help);
      }
> $message e $chatID sono la variabili preimpostate nel file "EasyTelegramCore/refew/var.php"

> sendMessage è la funzione preimpostata nel file "EasyTelegramCore/refew/func.php"

Al posto di scrivere sendMessage è possibile anche richiamare la classe e creare il metodo al momento:

    if(strpos($message, "/help")!==false){
        $help = "Lista dei comandi | List of commands\n\n/start - /avvia\n/info\n/example\n/sendPhoto\n/framework";
        $args = array("chat_id" => $chatID, "text" => $help);
        $bot->TelegramApi("sendMessage", $args);
      }
> L'array è stato necessario crearlo per soddisfare i requisiti necessari del metodo [sendMessage](https://core.telegram.org/bots/api#sendmessage)

Funzioni preimpostate nel file "EasyTelegramCore/refew/func.php" (10):
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
> Per più informazioni su come usarle controllare il file delle funzioni. 

Puoi vedere le variabili preimpostate controllando il file "EasyTelegramCore/refew/var.php"
> Non sono tutte, devo finire ad aggiungerle, forse nel prossimo aggiornamento 🤪

### Puoi trovare altre spiegazioni dettagliate su funzioni e variabili [cliccando qui](https://core.telegram.org/bots/api)
------

      La base è stata testata solo su Localhost(solo settings.php), altervista.org e webhosting privati.

## Per qualsiasi problema o domanda puoi contattare me su telegram:
### ⛈ [Canale telegram](https://t.me/RefewDev) ⛈
### 👨‍💻 [Contatto telegram](https://t.me/Refew) 👨‍💻
