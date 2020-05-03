<?php


class ConnectDatabase
{
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->username = '';
        $this->password = '';
    }

    function connect()
    {
        try {
            new PDO('mysql:host=localhost;dbname=library_manager', $this->username, $this->password);
        } catch (PDOException $exception) {
           echo $exception->getMessage();
        }
        return new PDO('mysql:host=localhost;dbname=library_manager', $this->username, $this->password);
    }
}