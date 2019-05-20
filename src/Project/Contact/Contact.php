<?php
/**
 * Created by PhpStorm.
 * Contact: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Contact;
class Contact
{
    public $id;
    public $name;
    public $email;
    public $subject;
    public $message;

    public function __construct($id, $name, $email, $subject, $message)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;

    }
}