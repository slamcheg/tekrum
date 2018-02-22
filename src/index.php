<?php
use Application\App;
use Application\Entities\User;
use Application\Repository\UserRepository;

require_once dirname(__DIR__) . "/vendor/autoload.php";
$config = require_once "config/local.php";

$application = new App($config);

$repository = new UserRepository($application->getConnection());

$repository->getById(27);
$user = new User();
$user->setAge(27);
$user->setBirthDate('25-12-1980');
$user->setFirstName('Иван');
$user->setLastName('Иванов');
$repository->save($user);