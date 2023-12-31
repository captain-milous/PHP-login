<?php
session_start();
include_once 'config.php';

function SingletonConnection()
{
    global $servername, $port, $DBusername, $DBpassword, $DBname;
    static $conn = null;
    if ($conn === null) {
        $conn = new mysqli($servername, $DBusername, $DBpassword, $DBname, $port);
    }
    return $conn;
}

if (SingletonConnection()->connect_error) {
    die("Connection failed: " . SingletonConnection()->connect_error);
}

function login($email, $password)
{
    try{
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = sha1('$password')";
        $result = SingletonConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
        } else {
            throw new Exception("Error: Spatne prihlasovaci udaje");
        }
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function register($email, $password, $fname, $lname)
{
    $sql = "INSERT INTO user (email, password, fname, lname) VALUES ('$email', sha1('$password'), '$fname', '$lname')";
    try{
        if (SingletonConnection()->query($sql) === TRUE) {
            // OK
        } else {
            throw new Exception("Error: Problem s databazi");
        }
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
    
}

//logout function
function logout()
{
    session_destroy();
    header('Location: /Xi-Project/?mssg=Jsi odhlasen');
}

function isLoggedIn()
{
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

function err_log($log_string,$type,$komentar = null){
    $file = fopen($_SERVER["DOCUMENT_ROOT"]."/Private/"."err-log.txt","a+");
    $date = date('Y-m-d H:i:s');
    fwrite($file,"#".$date." ; TYPE->".$type." ; LOG->".$log_string." ; KOMENTAR->".$komentar."\n");
    fclose($file);
}

?>