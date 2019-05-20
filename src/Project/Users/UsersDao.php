<?php
/**
 * Created by PhpStorm.
 * Users: lulka
 * Date: 05/03/2019
 * Time: 10:18
 */

namespace Project\Users;
use DateTime;
use Firebase\JWT\JWT;
use Project\Utils\ProjectDao;


class UsersDao
{
    private $dbConnection;

    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getAll()
    {
        $sql= "SELECT * FROM USERS";
        return $this->dbConnection->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM USERS WHERE id =?";
        return $this->dbConnection->fetch($sql, array($id));
    }

    public function updateUser($userId, $user)
    {
        $sql = "UPDATE USERS SET name = ?, email = ?, password = ?, token = ?, WHERE id = ?";
        $this->dbConnection->execute($sql, array($user['name'], $user['email'], $user['password'], $user['token'], $userId));

        return $this->getById($userId);
    }

    public function createUser($user)
    {
        $sql = "INSERT INTO USERS (name, email, password) VALUES (?, ?, ?)";
        $id = $this-> dbConnection->insert($sql, array($user['name'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT)));
        $user = $this->getById($id);
        $user->token = $this->generateToken($user->name);
       return $this->getById($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM USERS WHERE id = ?";
        $this->dbConnection->execute($sql, array($id));
    }

    public function generateToken($username)
    {
        $now = new DateTime();
        $future = new DateTime("now +1 year");

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => base64_encode(random_bytes(16)),
            'iss' => 'localhost',  // Issuer
            "id" => $username,
        ];

        $secret = 'mysecret';
        $token = JWT::encode($payload, $secret, "HS256");

        return $token;
    }
    public function loginUser($body)
    {
        $email = $body['email'];
        $password = $body['password'];
        $sql = "SELECT * FROM USERS WHERE email = ?";
        $user = $this->dbConnection->fetch($sql, array($email));
        if (password_verify($password, $user->password)) {
            $user->token = $this->generateToken($user->id);
            return $user;
        } else {
            return false;
        }
    }
}