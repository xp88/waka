<?php
    function allAuthors(){
        $sql = " select * from author";
        return getlist($sql);
    }
    function delAuthor($id){
        $sql = "DELETE FROM author WHERE id='$id'";
        execsql($sql,0);
        return true;
    }
    function getAuthor($id){
        $sql="select * from author where id=".$id;
        return getone($sql);
    }
    function updateAuthor($id, $name){
        $sql = "UPDATE author SET name='$name' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }
    function addAuthor($name){
        $sql="INSERT INTO author (name) VALUES ('$name')";
        return addsql($sql);
    }
?>