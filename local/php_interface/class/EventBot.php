<?php

namespace Volkov;

include_once "local/php_interface/include/constant.php";

class EventBot
{

    /**
     * Основная информация
     * @param int $chatID (Идентификатор чата в Telegram)
     * @param string $chatType (тип чата, может принимать значения: privat/group)
     *
     * Информация о пользователе
     * @param int $userID (Идентификатор пользователя. Может быть использован в методе sMessage(в данном событии не имеет смысла))
     * @param string $firstName (Имя пользователя)
     * @param string $lastName (Фамилия пользователя)
     * @param string $login (Логин пользователя)
     *
     * Данные
     * @param string $mess (Текст сообщения в нижнем регистре)
     * @param string $text (Текст сообщения)
     */
    public static function newMessage(string $chatType, int $chatID, int $userID, string $firstName, string $lastName, string $login, string $mess, string $text) #Сообщение от пользователя в личный чат
    {

    }

    /**
     * Получение update_id из json
     */
    public static function getUpdate_id():int
    {
        $jsonArray = false;
        if (file_exists('update_id.json')){
            $json = file_get_contents('update_id.json');
            $jsonArray = json_decode($json, true);
        }

        return $jsonArray["update_id"];
    }

    /**
     *  Обновляет update_id
     */
    public static function setUpdate_id($lastElement)
    {
        $lastElement = $lastElement + 1;
        file_put_contents(BOT_UPDATE_OFFSET_FILE, json_encode(array("update_id" => $lastElement), JSON_FORCE_OBJECT));
    }


    /**
     * Основная информация
     * @param int $chatID (Идентификатор чата в Telegram)
     * @param string $chatType (тип чата, может принимать значения: privat/group)
     *
     * Информация о пользователе
     * @param int $userID (Идентификатор пользователя. Может быть использован в методе sMessage(в данном событии не имеет смысла))
     * @param string $firstName (Имя пользователя)
     * @param string $lastName (Фамилия пользователя)
     * @param string $login (Логин пользователя)
     *
     * Данные
     * @param string $mess (Текст сообщения в нижнем регистре)
     * @param string $text (Текст сообщения)
     */
    public static function sendMessage(int $chatID, string $text)
    {
        $fields = [
            'chat_id' => $chatID,
            'method' => 'sendMessage',
            'text' => $text,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, BOT_URL . BOT_TOKEN . "/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public static function getUpdates() {

        $fields = [
            'method' => 'getUpdates',
            'offset' => EventBot::getUpdate_id(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, BOT_URL . BOT_TOKEN . "/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true)["result"] ?? false;
    }

    /** Клавиатура */
//    public static function ReplyKeyboardMarkup()
//    {
//        $fields = [
//            'chat_id' => $chatID,
//            'method' => 'sendMessage',
//            'text' => $text,
//            $keyboardButton
//        ];
//
//        $keyboardButton = [
//            ["text" => "Ответ 1", "text2" => "Ответ 2"]
//        ];
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, BOT_URL . BOT_TOKEN . "/");
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        return json_decode($response, true);
//    }
}