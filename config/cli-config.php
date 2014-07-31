<?php

require __DIR__ . '/../vendor/autoload.php';

use Hasty2\Db\Doctrine;


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Doctrine::getInstance()->getEntityManager());