<?php
    function checkuser($user,$pass){
        $sql="select * from customers where user='".$user."' and pass='".$pass."'";
        return getone($sql);
    }

    function adduser($user, $pass, $role, $name, $email){
        $sql="INSERT INTO customers (user, pass, role, name, email) VALUES ('$user', '$pass', '$role', '$name', '$email')";
        return addsql($sql);
    }

    function updatepass($user,$pass){
        $sql="UPDATE customers set pass='".$pass."' where user='".$user."'";
        return execsql($sql,0);
    }
    
    function finduser($user){
        $sql="select * from customers where user='".$user."'";
        return getone($sql);
    }

    function getPassHash($user){
        $sql="select pass from customers where user='".$user."'";
        return getone($sql);
    }

    function get_user_by_id($user_id) {
        $sql = "SELECT * FROM customers WHERE id = $user_id";
        return getone($sql);
    }
    
    function update_user_by_id($update_info, $user_id) {
        // được phép chỉnh sửa địa chỉ, sdt, họ tên, ngày sinh
        $address = $update_info['address'];
        $phone = $update_info['phone'];
        $email = $update_info['email'];
        $name = $update_info['name'];
        $dob = $update_info['dob'];
        $sql = "UPDATE customers SET address = '$address', phone = '$phone', name = '$name', date = '$dob', email = '$email' WHERE id = $user_id";
        execsql($sql, 1);
        return true;
    }
?>