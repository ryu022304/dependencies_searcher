<?php
require __DIR__ . '/vendor/autoload.php';
$app = new \Slim\App;

// ルーティングの読み込み
$routers = glob('./routes/*.router.php');
foreach ($routers as $router) {
    require $router;
}
$app->run();
