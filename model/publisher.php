<?php 
    function get_all_publisher() {
        $sql = "SELECT * FROM publisher";
        return getlist($sql);
    }
?>