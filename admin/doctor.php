<?php 
session_start();

if(!isset($_SESSION['admin_user'])){
  header('Location:../404.php');
  exit();
}

$update_id =   $_SESSION['update_id'] ?? '';
$first_name = $_SESSION['first_name'] ?? '';
$last_name = $_SESSION['last_name'] ?? '';
$address = $_SESSION['address'] ?? '';
$email = $_SESSION['email'] ?? '';
$department = $_SESSION['department'] ?? '';
$image = $_SESSION['image'] ?? '';

unset($_SESSION['update_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['address']);
unset($_SESSION['email']);
unset($_SESSION['department']);
unset($_SESSION['image']);
?>

<?php include '../inc/header.php'; ?>
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
      <form action="process.php" method="POST" enctype="multipart/form-data"
        class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <div class="row justify-content-between align-items-center">
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="firstname" name="first_name" value="<?php echo $first_name; ?>"
              placeholder="Enter your firstname">
            <label for="firstname" class="ps-4 fw-light">Firstname</label>
          </div>
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="lastname" name="last_name" value="<?php echo $last_name; ?>"
              placeholder="Enter your lastname">
            <label for="lastname" class="ps-4 fw-light">Lastname</label>
          </div>
        </div>
        <div class="form-floating mb-3 ">
          <input type="text" class="form-control " id="address" name="address" value="<?php echo $address; ?>"
            placeholder="Enter your address">
          <label for="address" class="fw-light">Address</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
            placeholder="Enter your email">
          <label for="email" class="fw-light">Email</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="department" name="department" value="<?php echo $department; ?>"
            placeholder="Enter your department">
          <label for="department" class="fw-light">Department</label>
        </div>
        <div class="mb-4">
          <label for="imgs" class="form-label">Choose a picture</label>
          <input type="hidden" name="old_image" value="<?php echo $image; ?>">
          <input class="form-control" type="file" id="imgs" name="image" placeholder="Choose a picture">
        </div>

        <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">
        <div class=" input-group">
        </div>
        <div class="d-grid">
          <?php 
            if(isset($_SESSION['update_btn'])){
              echo $_SESSION['update_btn'] ;
              unset($_SESSION['update_btn']);
            }else{
              echo '<button type="submit" class="btn btn-success" name="submit_doctor">Add</button>';
            }
          ?>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>