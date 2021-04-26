<?php 
    include '../connect.php';
    include '../comment.php';
    $cmt_arr = json_decode($_POST['data'], true);
    $user = $cmt_arr['userId'];
    $product = $cmt_arr['productId'];
    $content = $cmt_arr['content'];
    $last_id = set_comment($content, $product, $user);
    $cmt_info = get_comment_by_last_id($last_id);
    $date = date_create($cmt_info['date']);
    $cmt_info['date'] = date_format($date, 'd/m/Y H:i');
    if(true)
        echo json_encode($cmt_info);
?>