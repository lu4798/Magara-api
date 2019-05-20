<?php
/**
 * Created by PhpStorm.
 * Contact: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Contact;
use Project\Utils\ProjectDao;
class ContactDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function sendMessage($message)
    {
        $sql = "INSERT INTO CONTACT (name, email, subject, message) VALUES (?, ?, ?, ?)";
        return $this->dbConnection->insert($sql, array($message['name'], $message['email'], $message['subject'], $message['message']));

    }


}