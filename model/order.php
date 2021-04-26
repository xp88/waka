<?php 
    function get_orders($user_id) {
        $sql = "SELECT cart.id, date, quantity, total, status.status FROM cart JOIN status ON (cart.id_status = status.id) WHERE id_customers = $user_id AND position = 1 ORDER BY date DESC";
        return getlist($sql);
    }

    function get_del_orders($user_id) {
        $sql = "SELECT cart.id, date, quantity, total, status.status FROM cart JOIN status ON (cart.id_status = status.id) WHERE id_customers = $user_id AND position = 2 ORDER BY date DESC";
        return getlist($sql);
    }
    
    function get_limit_orders($user_id, $limit) {
        $sql = "SELECT cart.id, date, quantity, total, status.status FROM cart JOIN status ON (cart.id_status = status.id) WHERE id_customers = $user_id AND position = 1 ORDER BY date DESC LIMIT $limit";
        return getlist($sql);
    }
    
    // THIS ONE NEED TO BE EDITED LATER
    function get_order_detail($order_id) {
        $sql = "SELECT p.id, p.name, p.image, p.price, od.quantity, c.total, c.id_status
        FROM order_detail od 
        JOIN product p
            ON od.id_product = p.id 
        JOIN cart c 
            ON c.id = od.id_order
        WHERE id_order = $order_id";
        return getlist($sql);
    }

    function edit_order($order_id) {
        $sql = "UPDATE cart SET position = 2 WHERE id = $order_id";
        execsql($sql, 1);
        return true;
    }
    // 
    function get_deleted_orders($order_id){
        $sql = "SELECT * FROM order_detail od JOIN product p ON od.id_product = p.id WHERE id_order = $order_id AND p.position = 2";
    }

    function addCart($user_id, $name, $phone, $email, $address, $total, $quantity, $payment){
        $sql="INSERT INTO cart VALUES(DEFAULT, $user_id, '$name', '$phone', '$email', '$address', DEFAULT, $total, DEFAULT, $quantity, DEFAULT, $payment)";
        return addsql($sql);
    }

    function addOrder($order_id, $product_id, $quantity){
        $sql="INSERT INTO order_detail(id_order, id_product, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
        return addsql($sql);
    }
?>