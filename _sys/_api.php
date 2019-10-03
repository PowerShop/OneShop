<?php

require dirname(__FILE__).'/_func.php';
require dirname(__FILE__).'/_config.php';
require dirname(__FILE__).'/_user.php';
require dirname(__FILE__).'/_shop.php';
require dirname(__FILE__).'/_rcon.php';
require dirname(__FILE__).'/_backend.php';

/* APIs */
$api = (object) array(
     'sql' => new PDO('mysql:host='.$_config['db_host'].'; dbname='.$_config['db_database'].';', $_config['db_user'], $_config['db_password']),
    'user' => new User(),
    'shop' => new Shop(),
    'rcon' => new Rcon($_config['mc_host'],$_config['mc_port'],$_config['mc_password'],$_config['mc_timeout']),
    'backend' => new Backend(),
    'status' => json_decode(file_get_contents('http://localhost/_sys/_status/_api.php?host='.$_config['mc_host'].'&port='.$_config['mc_port'].'')),
);
$api->sql->exec('set names utf8');
$api->rcon->send_command('say hi');