<?php
@ini_set('display_errors', '0');
include_once ('../_sys/_config.php');
$query = (object) array(
    "api" => json_decode(file_get_contents("http://localhost/mshop/_sys/_status/_api.php?host=" . $_config['mc_host'] . "&port=" . $_config['mc_port'] . "")),
);
// Other code for use the same this code :)
// $query = json_decode(file_get_contents("http://localhost/mshop/_sys/_status/_api.php?host=" . $_config['mc_host'] . "&port=" . $_config['mc_port'] . ""), true);
// $url = "http://localhost/mshop/_sys/_status/_api.php?host=" . $_config['mc_host'] . "&port=" . $_config['mc_port'] . "";
// $obj = json_decode(file_get_contents($url), true);
// echo $obj['players']['online'];
// echo " / ";
// echo $obj['players']['max']

echo $query->api->players->online;
echo " / ";
echo $query->api->players->max;
?>