<?php


namespace Application\Components;

use PDO;
use PDOException;

class Connection
{
    public $config;

    public function __construct($config = [])
    {
        try {
            if (empty($this->db)){
                $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'], $config['user'], $config['password']);
                $this->db->exec('set names utf8');
            }
        } catch (PDOException $e) {
            print "Connection Error: " . $e->getMessage();
            die();
        }
    }
}