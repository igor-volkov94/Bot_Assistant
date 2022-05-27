<?php
/**
 * @var string $db
 */

include_once "local/php_interface/init.php";
use Volkov\EventBot;

$response = EventBot::getUpdates();

$message = EventBot::messageHandler($response[0]["message"]["text"]);
$text = "Магазин: {$message[0]}\nТовар: {$message[1]}\nНа сумму: {$message[2]}";

if (!empty($response)) {
    EventBot::sendMessage($response[0]["message"]["chat"]["id"], $response[0]["update_id"], $text);
}
