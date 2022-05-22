<?php
/**
 * @var string $db
 */

include_once "local/php_interface/init.php";
use Volkov\EventBot;

$response = EventBot::getUpdates();

if (!empty($response)) {
    $text = "";
    $text .= $response[0]["message"]["text"];

    EventBot::sendMessage($response[0]["message"]["chat"]["id"], $text);
    EventBot::setUpdate_id($response[0]["update_id"]);
}