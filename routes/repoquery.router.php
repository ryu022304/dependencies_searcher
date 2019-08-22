<?php
$app->get('/api/v1/repoquery', function($request, $response){
    $names = $request->getQueryParams('name');
    $res = getDependencies($names['name']);
    $packages = array();
    foreach($res as $key => $val){
        $tmp = array('id'=>$key, 'data'=>$val);
        array_push($packages, $tmp);
    }
    $data = [
        'status' => 'OK',
        'packages' => $packages
    ];
    return $response->withJson($data, 200);
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