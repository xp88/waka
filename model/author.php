<?php 
    function get_all_author() {
        $sql = "SELECT * FROM author";
        return getlist($sql);
    }
?>