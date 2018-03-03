<?php
define("DS", DIRECTORY_SEPARATOR);
require __DIR__ . DS . "vendor" . DS . "autoload.php";

use Thiagoalgo\Vtex\Api\Oms\Order;

$order = new Order();