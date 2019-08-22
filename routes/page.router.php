<?php
$container = $app->getContainer();
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
};
$app->get('/', function($request, $response){
    return $this->view->render($response, 'index.html');
});
