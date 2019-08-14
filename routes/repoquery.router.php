<?php
$app->get('/api/v1/repoquery/{name}', function($request, $response){
    $name = $request->getAttribute('name');
    $names = explode(' ',$name);
    print_r($names);
    $res = getDependencies($names);
    $packages = array();
    foreach($res as $key => $val){
        $tmp = array('id'=>$key, 'data'=>$val);
        array_push($packages, $tmp);
    }
    $data = [
        'status' => 'OK',
        'packages' => $packages
    ];

    return $response->withJson($data, 200, JSON_PRETTY_PRINT);
});

/*
 * パッケージの依存性を取得する関数
 * 
 * @param array $packageNames 検索するパッケージ名
 * @return array $out コマンドの実行結果
*/
function getDependencies($packageNames){
    $packages_str = implode(' ', $packageNames);
    exec('repoquery --requires --resolve --recursive --nvr '.$packages_str, $out, $rc);
    return $out;
}