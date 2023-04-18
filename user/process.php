<?php 
include '../inc/connection.php';
session_start();
// ===Create user acct===
if(isset($_POST['create_acct'])){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];

  if(!empty($user) && !empty($pass) && !empty($email) ){
    $sql = "INSERT INTO user_reg(username,password,email) 
                        VAlUES('$user','$pass','$email')";

    $result = $conn->query($sql);

    if($result){
      header('Location:login.php');
      exit();
    }else{
      $_SESSION['message'] = '<p class="lead text-danger text-center">Failed to create new account</p>';
        
    header('Location:sign-up.php');
    exit();
      // die($sql . $conn->error);
    }
  }else{
     $_SESSION['message'] = '<p class="lead text-danger text-center">Please fill out all input fields</p>';
    header('Location:sign-up.php');
    exit();
  }
  $conn->close();
}

  // ===User Login===
if(isset($_POST['login_user'])){
  $user_name = $_POST['user'];
  $user_pass = $_POST['pass'];
  $sql = "SELECT * FROM user_reg WHERE username='$user_name' AND password='$user_pass'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result)==1){ //check if there is a match
    $_SESSION['user_name'] = $user_name;
    header("Location: doctor_list.php");
    exit();
  }else {
    $_SESSION['message'] = '<p class="lead text-danger text-center">Invalid username or password</p>';
    header("Location:login.php");
    exit();
  }
  $conn->close();
}

?>