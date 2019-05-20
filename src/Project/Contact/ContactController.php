<?php
/**
 * Created by PhpStorm.
 * Contact: lulka
 * Date: 05/03/2019
 * Time: 10:17
 */
namespace Project\Contact;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class ContactController
{
    private $dao;
    private $email_sender;

    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new ContactDao($dbConnection);
        $this->email_sender = $container['email_sender'];
    }


    public function sendMessage(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $message = $this->dao->sendMessage($body);
        return $response->withJson($message);
    }

    function sendMail(Request $request, Response $response, array $args){
        $body = $request->getParsedBody();
        $this->emailBody($body['name'], $body['email'], $body['subject'], $body['message']);
        return $response->withStatus(201);
    }

    private function emailBody ($name, $email, $subject, $message)
    {
        $this->email_sender->setFrom($email, $name);
        $this->email_sender->addReplyTo($email, $name);
        $this->email_sender->Subject = $subject;
        $this->email_sender->Body = $message;
        $this->email_sender->addAddress('magaraoficial@gmail.com');
        $this->email_sender->send();
    }
}
