<?php
    function allPublishers(){
        $sql = " select * from publisher";
        return getlist($sql);
    }
    function delPublisher($id){
        $sql = "DELETE FROM publisher WHERE id='$id'";
        execsql($sql,0);
        return true;
    }
    function getPublisher($id){
        $sql="select * from publisher where id=".$id;
        return getone($sql);
    }
    function updatePublisher($id, $name){
        $sql = "UPDATE publisher SET name='$name' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }
    function addPublisher($name){
        $sql="INSERT INTO publisher (name) VALUES ('$name')";
        return addsql($sql);
    }
?>