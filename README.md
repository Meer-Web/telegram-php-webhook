# telegram-php-webhook
PHP Webhook for telegram bots

## Install
Create a bot using the botfather (https://core.telegram.org/bots/tutorial)
Set the bot webhook using setWebhook.

Ea:
```
curl -F "url=https://<DOMAIN.TLD>/<YOUR_WEBHOOK_PHP>" https://api.telegram.org/bot<YOURTOKEN>/setWebhook
```

Afterwards check if the webhook info is set properly on https://api.telegram.org/bot<BOT_ID>/getWebhookInfo

## Usage
You can use the following commands as an example:
/ping
/time
/chatid

You can easily add more in the case statement in the code.