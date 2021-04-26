<?php
    function showproduct($hot=0,$new=0,$bestseller=0,$idcatalog=0,$limi){
        $sql = "select * from product where 1";

        if($hot==1){
            $sql.=" AND hot=1";
        }

        if($new==1){
            $sql.=" AND new=1";
        }

        if($bestseller==1){
            $sql.=" AND bestseller=1";
        }

        if($idcatalog>0){
            $sql.=" AND id_catalog = ".$idcatalog;
        }
        $sql.=" ORDER BY id DESC limit ".$limi;
        return getlist($sql);
    }

    function showAll() {
        $sql = "Select * from product";
        return getlist($sql);
    }

    function getProductDetail($id){
        $sql="select * from product where id=".$id;
        return getone($sql);
    }
    function getname($table,$id){
        $sql="select name from ".$table." where id=".$id;
        return getone($sql);
    }
    
    function showsearch($keyword){
        $sql = "select * from product where 1";
        if($keyword!=''){
            $sql.=" AND name like '%".$keyword."%'";
        }
        $sql.=" ORDER BY id DESC";
        return getlist($sql);
    }
    function editProduct($id_catalog, $name, $new_image, $price, $detail, $view, $id  ) {
        $sql = "UPDATE product set id_catalog='$id_catalog', name='$name', image='$new_image', price='$price', detail='$detail', view='$view' where id='$id'";
        execsql($sql, 1);
        return true;
    }

    function delProduct($id) {
        $sql="DELETE from product where id='$id'";
        execsql($sql, 1);
        return true;
    }

    function createProduct($id_catalog, $id_author, $name,  $new_image, $price, $detail, $view){
        $sql = "INSERT into product (id_catalog, id_author name, image, price, detail, view) VALUES ($id_catalog,$id_author, '$name',  '$new_image', $price, '$detail', $view)";
        return addsql($sql);
    }

    function get_filtered_products($sql) {
        return getlist($sql);
    }
    
    function get_viewed_products($id_user) {
        $sql = "SELECT p.id as 'product_id', name, image, price, vp.date FROM viewed_product vp JOIN product p ON vp.id_product = p.id WHERE vp.id_customer = $id_user ORDER BY date DESC";
        return getlist($sql);
    }

    function set_viewed_products($id_user, $id_product) {
        $sql = "INSERT INTO viewed_product VALUES(DEFAULT, $id_user, $id_product, DEFAULT)";
        execsql($sql, 0);
        return true;
    }

    function edit_viewed_products($id_user, $id_product) {
        $sql = "UPDATE viewed_product SET date = DEFAULT WHERE id_customer = $id_user AND id_product = $id_product";
        execsql($sql, 1);
        return true;
    }
?>