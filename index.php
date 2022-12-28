<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\Pages\Home;

$obResponse = new \App\Http\Response(200, 'aeafefe');

echo "<pre>";
print_r($obResponse);
echo "<pre>";
exit;

echo Home::getHome();
