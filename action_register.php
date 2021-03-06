<?php
  session_start();
  if (!isset($_POST['username'])) die('username not set');
  if (!isset($_POST['password'])) die('password not set');
  if (!isset($_POST['email'])) die('email not set');

  include_once('database/connection.php'); // connects to the database
  include_once('database/users.php');      // loads the functions responsible for the users table

  if ($_SESSION['csrf'] !== $_POST['csrf']) {
    die('Request is not legitimate');
  }

  if (!userExists($dbh,$_POST['username'])){  // test if user exists
    try{
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      if (empty($username) || empty($password) || empty($email)){
        die('nice try');
      }
      register($dbh,$username, $password, $email);
    }catch (PDOException $e) {
      die('-1'); //email repeated
    }
  }else{
    die("-2"); //user does not exist
  }
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['is_logged'] = true;

?>
