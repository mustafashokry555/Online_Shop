<?php

namespace Online\Classes\Models;
use Online\Classes\DB;
use Online\Classes\Session;

class Admin extends DB
{
    public function __construct()
    {
        $this->table = "admins";
        $this->connect();
    }

    public function login(string $email, string  $password, Session $session)
    {
        $sql = "SELECT * FROM $this->table WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        $admin =  mysqli_fetch_assoc($result);
        if(! empty($admin)){
            $hashedPass = $admin['password'];
            if(password_verify($password, $hashedPass)){
                $session->set("adminId", $admin['id']);
                $session->set("adminName", $admin['name']);
                $session->set("adminEmail", $admin['email']);
                return true;
            }else{
                return "password is not correct";
            }
        }else{
            return "email is not correct";  
        }
    }


    
    public function editProfile(string $name, string $email, string  $password, 
                                Session $session, string $newPassword, string $confirmPassword)
    {
        $adminId = $session->get('adminId');

        $sql = "SELECT * FROM $this->table WHERE id = '$adminId' LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        $admin =  mysqli_fetch_assoc($result);

        $hashedPass = $admin['password'];


        if(password_verify($password, $hashedPass)){

            if(empty($newPassword) && empty($confirmPassword)){
                $sql = "UPDATE admins SET name='$name',email='$email' WHERE id = '$adminId'";
                mysqli_query($this->conn, $sql);

                $sql = "SELECT * FROM $this->table WHERE id = '$adminId' LIMIT 1";
                $result = mysqli_query($this->conn, $sql);
                $admin =  mysqli_fetch_assoc($result);

                $session->set("adminId", $admin['id']);
                $session->set("adminName", $admin['name']);
                $session->set("adminEmail", $admin['email']);
                $session->set("editProfileMassege", "name and email updated successfully");
            }else{
                if($newPassword === $confirmPassword)
                {
                    $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT); 
                    $sql = "UPDATE admins SET name='$name',email='$email',password='$newPasswordHashed' WHERE id = '$adminId'";
                    mysqli_query($this->conn, $sql);
                    
                    $sql = "SELECT * FROM $this->table WHERE id = '$adminId' LIMIT 1";
                    $result = mysqli_query($this->conn, $sql);
                    $admin =  mysqli_fetch_assoc($result);

                    $session->set("adminId", $admin['id']);
                    $session->set("adminName", $admin['name']);
                    $session->set("adminEmail", $admin['email']);
                    $session->set("editProfileMassege", "name, email and password  updated successfully");
                }else{
                    $session->set("errors", ["New Password and Confirm Password not identical"]);
                }
            }
        }else{
            $session->set("errors", ["password is not correct"]);
        }
    }

    public function logout(Session $session)
    {
        $session->remove("adminId");
        $session->remove("adminName");
        $session->remove("adminEmail");
    }

}
?>