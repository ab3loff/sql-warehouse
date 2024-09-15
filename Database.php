<?php

class Database
{
    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        require __DIR__ . '/vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();

        $this->pdo = new PDO( "mysql:host=" . $_ENV['host'] . ";dbname=" . $_ENV['database'], $_ENV['user'], $_ENV['password'] );
    }
}