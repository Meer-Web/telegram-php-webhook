<?php
// Telegram function which you can call
function telegram($msg) {
        global $TELEGRAM_BOT,$TELEGRAM_CHATID;
        $url='https://api.telegram.org/bot'.$TELEGRAM_BOT.'/sendMessage';$data=array('chat_id'=>$TELEGRAM_CHATID,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}

// Set your Bot ID.
$TELEGRAM_BOT='15560000000:AAFoWcuFvqXXXXXXXXXXXXXXXXXXXXX';

$TELEGRAM_API = "https://api.telegram.org/bot$TELEGRAM_BOT";
$TELEGRAM_RCV = json_decode(file_get_contents("php://input"), TRUE);

// ChatID needed to reply in the same chat
$TELEGRAM_CHATID = $TELEGRAM_RCV["message"]["chat"]["id"];

// Fetch the first word, ea for commands
$MESSAGE = explode(" ", strtolower($TELEGRAM_RCV["message"]["text"]));

$MESSAGE_FULL = $TELEGRAM_RCV["message"]["text"];
$MESSAGE_FULL = substr(strstr("$MESSAGE_FULL"," "), 1);

switch ($MESSAGE[0]) {
        case '/ping':
                // Friendly reply
                telegram("Hi!");
                break;
        case '/time':
                // Send current time
                $now = date('d-m-Y H:i:s');
                telegram("The current time is $now");
                break;
        case '/chatid':
                telegram("$TELEGRAM_CHATID");
                break;
}
?>