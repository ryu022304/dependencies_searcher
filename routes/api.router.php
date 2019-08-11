<?php
$app->get('/api/v1/{name}', function($request, $response){
    $name = $request->getAttribute('name');
    $data = [
        'status' => 'OK',
        'packages' => [
            ['id' => 1, 'name' => $name],
            ['id' => 2, 'name' => 'test2'],
            ['id' => 3, 'name' => 'test3']
        ]
    ];
    return $response->withJson($data);
});