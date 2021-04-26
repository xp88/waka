<?php
    function showcatalog($home,$pro,$limi){
        $sql = "select * from catalog where 1";
        if($home==1){
            $sql.=" AND home=1";
        }
        if($pro==1){
            $sql.=" AND pro=1";
        }
        $sql.=" ORDER BY id DESC limit ".$limi;
        return getlist($sql);
    }
    function showtilte($id){
        $sql = " select * from catalog where id=$id";
        return getone($sql);
    }
    function countProductByID(){
        $sql = "SELECT catalog.id as catalog_id, count(product.id) as count FROM product
        inner join catalog on catalog.id = product.id_catalog
        group by(catalog.id)";
        return getlist($sql);
    }
?>