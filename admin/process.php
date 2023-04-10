<?php include '../inc/connection.php';
session_start();

// ===Admin Login===
if(isset($_POST['login_admin'])){
  $admin_user = $_POST['user'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM admin_account WHERE username='$admin_user' AND password='$pass'";
  $result = $conn->query($sql);

  if(mysqli_num_rows($result)==1){ //check if there is a match
    $_SESSION['admin_user'] = $admin_user;
    header("Location: dashboard.php");
    exit();
  }else {
    $_SESSION['error'] = '<p class="lead text-danger text-center">Invalid username or password</p>';
    header("Location:login.php");
    exit();
  }
  $conn->close();
}
// ===Admin Logout===
if(isset($_POST['logout'])){
  unset($_SESSION['admin_user']);
  header("Location: login.php");
  exit();
}


    // ===Insert Doctor===
if(isset($_POST['submit_doctor'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $department = $_POST['department'];

  $image = $_FILES['image'];
  $image_name =  $image['full_path'];
  $image_tmp = $image['tmp_name'];
  $folder = '../assets/'.$image_name;
  move_uploaded_file($image_tmp,$folder);//create a copy of file in assets dir

  if(!empty($first_name) && !empty($last_name) && !empty($address) && !empty($email)  && !empty($department) && !empty($image)){
    $sql = "INSERT INTO doctors(first_name,last_name,address,email,department,image) 
                        VAlUES('$first_name','$last_name','$address','$email','$department','$folder')";

    $result = $conn->query($sql);

    if($result){
      $_SESSION['message'] = '
        <div class="alert alert-success py-3 alert-dismissible" role="alert">
          <div>Doctor added successfully</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }else{
        $_SESSION['message'] = '
          <div class="alert alert-warning py-3 alert-dismissible" role="alert">
            <div>Failed to add new Doctor</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        // die($sql . $conn->error);
      }

      header('Location:dashboard.php');
      exit();
  }else{
     $_SESSION['message'] = '
        <div class="alert alert-warning text-center" role="alert">
          Please fill out all input fields!
        </div>';
    header('Location:doctor.php');
    exit();
  }
  $conn->close();
}

  // ===Get Doctor Data===
if(isset($_GET['id'])){
  $update_id = $_GET['id'];
  $sql = "SELECT * FROM doctors WHERE id=$update_id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  
  $_SESSION['update_id'] = $update_id;
  $_SESSION['first_name'] = $row['first_name'];
  $_SESSION['last_name'] = $row['last_name'];
  $_SESSION['address'] = $row['address'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['department'] = $row['department'];
  $_SESSION['image'] = $row['image'];

  $_SESSION['update_btn'] = '<button type="submit" class="btn btn-success" name="update_doctor">Update</button>';
  header('Location:doctor.php');
  exit();

  mysqli_free_result($result);
  $conn->close();
}

  // ===Update Doctor===
if(isset($_POST['update_doctor'])){
  $update_id = $_POST['update_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $department = $_POST['department'];

  $image = $_FILES['image'];
  print_r( $image);
  $image_name =  $image['full_path'];
  $image_tmp = $image['tmp_name'];
  $folder = '';

  //If user didn't update the image
  if(empty($image_tmp)){ 
    $folder = $_POST['old_image']; //use the existing image in db
  }else{
    $folder = '../assets/'.$image_name;
    move_uploaded_file($image_tmp,$folder);
  }
  
  if(!empty($first_name) && !empty($last_name) && !empty($address) && !empty($email) && !empty($department)){
    $sql = "UPDATE doctors SET
            first_name = '$first_name',
            last_name = '$last_name',
            address = '$address',
            email = '$email',
            department = '$department',
            image = '$folder'
            WHERE id = $update_id";

    $result = $conn->query($sql);

    if($result){
      $_SESSION['message'] = '
        <div class="alert alert-success py-3 alert-dismissible" role="alert">
          <div>Doctor updated successfully</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else{
      $_SESSION['message'] = '
        <div class="alert alert-warning py-3 alert-dismissible" role="alert">
          <div>Oops! Update Failed</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      // die($sql . $conn->error);
    }

    header('Location:dashboard.php');
    exit();
  }else{
    $_SESSION['message'] = '
        <div class="alert alert-warning text-center" role="alert">
          Update failed.Please fill out all input fields!
        </div>';
    header('Location:dashboard.php');
    exit();
  } 
  $conn->close();
}

  // ===Delete Doctor===
if(isset($_POST['delete'])){
  $delete_id = $_POST['delete_id'];
  $sql = "DELETE FROM doctors WHERE id={$delete_id}";
  $result =  $conn->query($sql);
  if($result){
    $_SESSION['message'] = '
      <div class="alert alert-success py-3 alert-dismissible" role="alert">
        <div>Doctor deleted successfully</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
      $_SESSION['message'] = '
        <div class="alert alert-warning py-3 alert-dismissible" role="alert">
          <div>Failed to delete record Doctor</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      // die($sql . $conn->error);
  }
  header('Location:dashboard.php');
  exit();
  $conn->close();
}

// ===Insert Sched===
if(isset($_POST['submit'])){
  $doctor_name = $_POST['doctor_name'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $status = $_POST['status'];

  if(!empty($doctor_name) && !empty($date) && !empty($time) && !empty($status) ){
    $sql = "INSERT INTO schedule(doctor_name,date,time,status) 
                        VAlUES('$doctor_name','$date','$time','$status')";

    $result = $conn->query($sql);

    if($result){
      $_SESSION['message'] = '
        <div class="alert alert-success py-3 alert-dismissible" role="alert">
          <div>Schedule added successfully</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }else{
        $_SESSION['message'] = '
          <div class="alert alert-warning py-3 alert-dismissible" role="alert">
            <div>Failed to add new schedule</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        // die($sql . $conn->error);
      }

      header('Location:schedule.php');
      exit();
  }else{
     $_SESSION['message'] = '
        <div class="alert alert-warning text-center" role="alert">
          Please fill out all input fields!
        </div>';
    header('Location:schedule.php');
    exit();
  }
  $conn->close();
}

  // ===Delete sched===
if(isset($_POST['delete_sched'])){
  $delete_id = $_POST['delete_id'];
  $sql = "DELETE FROM schedule WHERE id={$delete_id}";
  $result =  $conn->query($sql);
  if($result){
    $_SESSION['message'] = '
      <div class="alert alert-success py-3 alert-dismissible" role="alert">
        <div>Schedule deleted successfully</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
      $_SESSION['message'] = '
        <div class="alert alert-warning py-3 alert-dismissible" role="alert">
          <div>Failed to delete schedule</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      // die($sql . $conn->error);
  }
  header('Location:schedule.php');
  exit();
  $conn->close();
}

?>