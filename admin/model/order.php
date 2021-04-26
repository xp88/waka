<?php
    function allOrders(){
        $sql = "SELECT * from cart WHERE position = 1";
        return getlist($sql);
    }

    function delOrder($id){
        $sql = "DELETE FROM cart WHERE id='$id'";
        execsql($sql,0);
        return true;
    }

    function getOrder($id){
        $sql="select * from cart where id=".$id;
        return getone($sql);
    }

    function updateOrder($id, $name, $phone, $email, $address, $id_status, $date, $position, $payment){
        $sql = "UPDATE cart SET name='$name', phone='$phone', email='$email', address='$address', id_status='$id_status', date='$date', position='$position', payment='$payment' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }

    function getOrderDetail($id){
        $sql="select * from order_detail where id_order=".$id;
        return getlist($sql);
    }

    function orderDetailProduct($id){
        $sql = "SELECT order_detail.id_product as id, product.name as name, product.image as image, product.price as price, order_detail.quantity as quantity from order_detail INNER JOIN product ON order_detail.id_product = product.id WHERE order_detail.id_order = '$id'";
        return getlist($sql);
    }

    function delOrderPro($pid){
        $sql = "DELETE FROM order_detail WHERE id_product='$pid'";
        execsql($sql,0);
        return true;
    }

    function getQuantity($order_id, $product_id){
        $sql = "SELECT order_detail.quantity as quantity from order_detail WHERE order_detail.id_order='$order_id' AND order_detail.id_product='$product_id'";
        return getone($sql);
    }

    function updateOrderDetail($order_id, $product_id, $quantity){
        $sql = "UPDATE order_detail SET order_detail.quantity='$quantity' WHERE order_detail.id_order='$order_id' AND order_detail.id_product='$product_id'";
        execsql($sql,1);
        return true;
    }
?>