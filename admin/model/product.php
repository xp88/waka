<?php
    function getProductDetail($id){
        $sql="select * from product where id=".$id;
        return getone($sql);
    }

    function allProducts(){
        $sql = "select * from product";
        return getlist($sql);
    }

    function delProduct($id){
        $sql = "DELETE FROM product WHERE id='$id'";
        execsql($sql,0);
        return true;
    }

    function updateProduct($id, $id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $rating, $hot, $bestseller, $new){
        
        $sql = "UPDATE product SET id_catalog='$id_catalog', name='$name', image='$new_image', price='$price', id_author='$id_author', detail='$detail', view='$view', rating='$rating', hot='$hot', bestseller='$bestseller', new='$new' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }

    function addProduct($id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $id_publisher, $rating, $hot, $bestseller, $new){
        
        $sql="INSERT INTO product (id_catalog, name, image, price, id_author,  detail, view, id_publisher, rating, hot, bestseller, new) VALUES ('$id_catalog', '$name', '$new_image', '$price', '$id_author', '$detail', '$view', '$id_publisher', '$rating', '$hot', '$bestseller', '$new')";
        
        return addsql($sql);
    }
?>