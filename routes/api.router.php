<?php
$app->get('/api/v1/{name}', function($request, $response){
    $name = $request->getAttribute('name');
    $res = getDependencies($name);
    $packages = array();
    foreach($res as $key => $val){
        $tmp = array('id'=>$key, 'name'=>$val);
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
 * @param string $packageName 検索するパッケージ名
 * @return array $out コマンドの実行結果
*/
function getDependencies($packageName){
    //exec('ls '.$packageName, $out, $rc);
    //exec('pwd', $out, $rc);
    exec('repoquery --requires --resolve --recursive --qf="%{name}-%{version}-%{release}.%{arch}" '.$packageName, $out, $rc);
    return $out;
}