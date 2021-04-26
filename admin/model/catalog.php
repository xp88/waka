<?php
    function allCatalogs(){
        $sql = " select * from catalog";
        return getlist($sql);
    }
    function delCatalog($id){
        $sql = "DELETE FROM catalog WHERE id='$id'";
        execsql($sql,0);
        return true;
    }
    function getCatalog($id){
        $sql="select * from catalog where id=".$id;
        return getone($sql);
    }
    function updateCatalog($id, $name, $id_paretn, $home, $pro){
        $sql = "UPDATE catalog SET name='$name', id_paretn='$id_paretn', home='$home', pro='$pro' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }
    function addCatalog($name, $id_paretn, $home, $pro){
        $sql="INSERT INTO catalog (name, id_paretn, home, pro) VALUES ('$name', '$id_paretn', '$home', '$pro')";
        return addsql($sql);
    }
?>