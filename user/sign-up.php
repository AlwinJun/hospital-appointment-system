<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-5">
      <form action="process.php" method="POST"
        class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <?php 
        session_start();
          if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
        ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="Username" name="user" placeholder="Enter your Username">
          <label for="Username" class="ps-4 fw-light">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="password" name="pass" placeholder="Enter your password">
          <label for="password" class="ps-4 fw-light">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="emial" name="email" placeholder="Enter your emial">
          <label for="emial" class="ps-4 fw-light">Email</label>
        </div>

        <div class="d-grid">
          <button class="btn btn-primary" name="create_acct">Create account</button>
          <button class="btn btn-link"><a href="login.php">Back to login</a></button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>