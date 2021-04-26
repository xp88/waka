<?php 
    function set_comment($content, $product_id, $user_id) {
        $sql = "INSERT INTO comment VALUES(DEFAULT, '$content', $product_id, $user_id, DEFAULT)";
        return addsql($sql);
    }

    function get_comment_by_product_id($product_id) {
        $sql = "SELECT cmt.id, c.id as 'user_id', c.name, cmt.content, cmt.date
        FROM comment cmt 
        JOIN customers c 
            ON cmt.id_customers = c.id
        WHERE cmt.id_product = $product_id 
        ORDER BY cmt.date DESC";
        return getlist($sql);
    }

    function get_comment_by_last_id($id) {
        $sql = "SELECT cmt.id, c.name, cmt.content, cmt.date
            FROM comment cmt 
            JOIN customers c 
            ON cmt.id_customers = c.id
            WHERE cmt.id = $id";
        return getone($sql);
    }

    function del_comment($cmt_id) {
        $sql = "DELETE FROM comment WHERE id = $cmt_id";
        execsql($sql, 0);
        return true;
    }        
?>