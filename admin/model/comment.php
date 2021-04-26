<?php 
    function get_comments() {
        $sql = "SELECT cmt.id, c.id as 'user_id', c.name as 'user_name', p.name as 'pro_name',  cmt.content, cmt.date
        FROM comment cmt
        JOIN customers c
            ON cmt.id_customers = c.id
        JOIN product p
            ON cmt.id_product = p.id";
        return getlist($sql);
    }

    function del_comment_by_id($cmt_id) {
        $sql = "DELETE FROM comment WHERE id = $cmt_id";
        execsql($sql, 0);
        return true;
    }
?>