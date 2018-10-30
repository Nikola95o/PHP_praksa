<?php

require_once('Database.php');

class User
{
    private $id;
    private $email;
    private $name;
    private $password;


    public function __get($a)
    {
        return $this->$a;
    }

    /**
     * @param PDO $db
     * @return bool
     */
    public static function create(string $email, string $name, string $password):bool
    {
        try{
            $db = Database::connect();
            $sql = "INSERT INTO User(email, name, password) VALUES (:email,:name,:password);";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 255);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR, 64);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR, 128);
            $stmt->execute();
            return true;
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param $db
     * @param $att
     * @return mixed
     */
    public static function getOne(string $key, $value)
    {
        try{
            $db = Database::connect();
            $sql = "SELECT id, email, name, password FROM User WHERE {$key} = :{$key} LIMIT 1;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":{$key}", $value);
            $stmt->execute();
            $res = $stmt->fetchObject('User');

            return $res;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }


    public static function getOneId(int $id)
    {
        return User::getOne('id', $id);
    }


    public static function getOneUsername(string $username)
    {
        return User::getOne('username', $username);
    }

    public static function getOneUsernamePassword(string $username, string $password)
    {
        try{
            $db = Database::connect();
            $sql = "SELECT id, email, name, password FROM User WHERE username = :username AND password = :password LIMIT 1;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam('username', $username);
            $stmt->bindParam('password', $password);
            $stmt->execute();
            $res = $stmt->fetchObject('User');

            return $res;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}