<?php
$app->get('/api/v1/search/{name}', function($request, $response){
    $name = $request->getAttribute('name');
    $res = getPackageList($name);
    $packages = array();
    print_r($res);
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
 * Yumで取得可能なパッケージの一覧を取得する
 * 
 * @param string $packageName 検索するパッケージ名
 * @return array $out コマンドの実行結果
*/
function getPackageList($searchName){
    exec('yum --showduplicates search '.$searchName, $out, $rc);

    // パッケージ名のみ抽出
    $slice_position = 0;
    foreach($out as $key => $val){
        if(strpos($val, 'N/S Matched') !== false){
            $slice_position = $key;
            break;
        }
    }
    $out_sliced = array_slice($out, $slice_position+1, -2);

    // 改行が入る概要の整形
    $out_detail = array();
    foreach($out_sliced as $key => $val){
        list($package_name, $abstract) = explode(': ', $val);
        if(strpos($package_name, '   ') === false){
            array_push($out_detail, ['package' => $package_name, 'abstract' => $abstract]);
        }
        else{
            $l = count($out_detail);
            $out_detail[$l-1]['abstract'] .= ' '.$abstract;
        }
    }
    return $out_detail;
}