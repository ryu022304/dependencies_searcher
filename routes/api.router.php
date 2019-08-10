<?php
$app->get('/api/v1/{name}', function($request, $response){
    $name = $request->getAttribute('name');
    $data = [
        'status' => 'OK',
        'name' => $name
    ];
    return $response->withJson($data);
});