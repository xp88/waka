<?php
    function getListStatus(){
        $sql = "SELECT status.status as status from cart INNER JOIN status WHERE cart.id_status=status.id";
        return getlist($sql);
    }
?>