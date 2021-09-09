<?php
require __DIR__ . '/vendor/autoload.php';

use Namdevel\cekResi;

$app = new cekResi('JP6825432963', 'jnt');

echo $app->check();