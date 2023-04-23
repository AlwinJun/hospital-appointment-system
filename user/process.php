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

// ===INSERT Patient info===
if(isset($_POST['submit_appointment'])){
  $sched_id = $_POST['sched_id'];
  $doctor = $_POST['doctor'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $sex = $_POST['sex'];
  $description = $_POST['description'];

   if(!empty($doctor) && !empty($date) && !empty($time) && !empty($first_name) && !empty($last_name) && !empty($age) && !empty($address) && !empty($sex) && !empty($description) ){
    $sql = "INSERT INTO patient(first_name,last_name,age,address,sex,doctor,date,time,description) 
                        VAlUES('$first_name','$last_name ','$age','$address','$sex','$doctor','$date','$time','$description')";

    $result = $conn->query($sql);

    if($result){
      $sql = "UPDATE `schedule` SET status ='Booked' WHERE id=$sched_id" ;
      $result = $conn->query($sql);
      $_SESSION['message'] = '
        <div class="alert alert-success py-3 alert-dismissible" role="alert">
          <div>Appointment set</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }else{
        $_SESSION['message'] = '
          <div class="alert alert-warning py-3 alert-dismissible" role="alert">
            <div>Failed to set appointments</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        // die($sql . $conn->error);
      }

      header('Location:doctor_list.php');
      exit();
  }else{
     $_SESSION['message'] = '
        <div class="alert alert-warning text-center" role="alert">
          Please fill out all input fields!
        </div>';
    header('Location:appointment_form.php');
    exit();
  }
  $conn->close();
}

?>