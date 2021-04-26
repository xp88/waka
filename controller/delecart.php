<?php
    session_start();

    $id = $_POST['id'];

  //  array_splice($_SESSION['cart'], $i, 1 );
  
    for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 
        if($_SESSION['cart'][$i][0]==$id){
            $j=$i;
            break;
        }
    }
    array_splice($_SESSION['cart'], $i, 1 );
    
    $quantity = 0;
    foreach($_SESSION['cart'] as $item) {
        $quantity += $item[4];
    }
    //gia tri tra ve

    echo $quantity;
?>