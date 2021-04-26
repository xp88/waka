<?php
    function allUsers(){
        $sql = "SELECT * from customers";
        return getlist($sql);
    }

    function delUser($id){
        $sql = "DELETE FROM customers WHERE id='$id'";
        execsql($sql,0);
        return true;
    }

    function getUser($id){
        $sql="select * from customers where id='$id'";
        return getone($sql);
    }

    function updateUser($id, $user, $name, $pass, $phone, $email, $date, $address, $gender){
        $sql = "UPDATE customers SET user='$user', name='$name', pass='$pass', phone='$phone', email='$email', date='$date', address='$address', gender='$gender' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }
?>