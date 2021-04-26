<?php 
    include '../connect.php';
    include '../comment.php';

    $cmt_id = $_GET['id'];
    if(del_comment($cmt_id))
        echo json_encode(array('result'=>true, 'cmt_id'=>$cmt_id));    
    else
        echo json_encode(array('result'=>false));    
?>