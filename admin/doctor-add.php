<?php  include '../inc/header.php';?>
<?php include '../inc/connection.php';

session_start();

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
  }
  
  $conn->close();
}



?>

<div class="container-fluid">
  <div class="row">
    <div class="col p-2 bg-primary">
      <h1 class="text-white h3 d-flex justify-content-center align-items-center gap-2">
        <i class="bi bi-universal-access"></i>
        <p class="p-0 m-0">Hospital</p>
      </h1>
    </div>
  </div>
</div>

<?php 
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
  }
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-6">
      <form action="doctor-add.php" method="POST" enctype="multipart/form-data"
        class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <div class="row justify-content-between align-items-center">
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="firstname" name="first_name" placeholder="Enter your firstname">
            <label for="firstname" class="ps-4 fw-light">Firstname</label>
          </div>
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Enter your lastname">
            <label for="lastname" class="ps-4 fw-light">Lastname</label>
          </div>
        </div>
        <div class="form-floating mb-3 ">
          <input type="text" class="form-control " id="address" name="address" placeholder="Enter your address">
          <label for="address" class="fw-light">Address</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="email" name="email" placeholder="Enter your email">
          <label for="email" class="fw-light">Email</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="department" name="department" placeholder="Enter your department">
          <label for="department" class="fw-light">Department</label>
        </div>
        <div class="mb-4">
          <label for="imgs" class="form-label">Choose a picture</label>
          <input class="form-control" type="file" id="imgs" name="image" placeholder="Choose a picture">
        </div>

        <div class=" input-group">
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>