<?php
include '../config.php';
include '../Model/User.php';

class UserC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM user ORDER BY idUser";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function userTriName()
    {
        $sql = "SELECT * FROM user ORDER BY firstname";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE idUser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :fn,:ln,:e,:ad,:t,:dob,:pw)";
        $db = config::getConnexion();
        try {
            print_r($user->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $user->getFirstName(),
                'ln' => $user->getLastName(),
                'e' => $user->getEmail(),                
                'ad' => $user->getAddress(),
                't' => $user->getTel(),
                'dob' => $user->getDob()->format('Y/m/d'), 
                'pw' =>$user ->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateUser($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    email = :email,
                    adress = :adress, 
                    tel = :tel,
                    dob = :dob,
                    password = :password
                WHERE idUser= :idUser'
            );
            $query->execute([
                'idUser' => $id,
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),  
                'adress' => $user->getAddress(),
                'tel' => $user->getTel(),
                'dob' => $user->getDob()->format('Y/m/d'),
                'password' =>$user ->getPassword()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * from user where idUser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function searchUser($name)
    {
        $sql = "SELECT * from user where firstName = '$name'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function login($email,$password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function forgotPassword($password,$email)
    {
        $sql = "UPDATE user SET password = ? where email = ?";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([$password, $email]);
            echo "Mail envoyé";
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
