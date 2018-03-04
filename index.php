<?php
define("DS", DIRECTORY_SEPARATOR);
require __DIR__ . DS . "vendor" . DS . "autoload.php";

use Thiagoalgo\Vtex\Config\Config;
use Thiagoalgo\Vtex\Api\Oms\Orders\Order;

$config = new Config('vtex.json');
var_dump($config);

$config = new Config();
var_dump($config);

$order = new Order($config);
$ord = $order->get('v1850336lbll-01');
var_dump($ord);