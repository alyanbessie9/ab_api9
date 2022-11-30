<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
header("Content-Type: application/json; charset=utf-8");

    include "config.php";
    $data = array();

    $query = mysqli_query($kon, "SELECT * FROM tbl_member order by kd_member");

    while($rows = mysqli_fetch_array($query)){
        $data[] = array(
            'kd_member' => $rows['kd_member'],
            'member' => $rows['member'],
            'id_member' => $rows['id_member']
            //'point' => $rows['point']
        );
    }

    if($query){
        $result = json_encode(array('success'=>true, 'result'=>$data));
    }else{
        $result = json_encode(array('success'=>false));
    }
    echo $result;

?>