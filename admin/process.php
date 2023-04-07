<?php include '../inc/connection.php';

session_start();

    // ===Insert Doctor===
if(isset($_POST['submit'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $department = $_POST['department'];

  $image = $_FILES['image'];
  $image_name =  $image['full_path'];
  $image_tmp = $image['tmp_name'];
  $folder = '../assets/'.$image_name;
  move_uploaded_file($image_tmp,$folder);

  if(!empty($first_name) && !empty($last_name) && !empty($address) && !empty($email)  && !empty($image)){
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
  }else{
     $_SESSION['message'] = '
        <div class="alert alert-warning text-center" role="alert">
          Please fill out all input fields!
        </div>';
    header('Location:doctor-add.php');
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
  $conn->close();
}

?>