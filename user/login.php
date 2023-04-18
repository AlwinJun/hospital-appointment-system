<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-5">
      <form action="process.php" method="POST"
        class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <?php 
       // session_start();
          if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
        ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="user" placeholder="Enter your username">
          <label for="username" class="fw-light">Username</label>
        </div>

        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="password" name="pass" placeholder="Enter your password">
          <label for="password" class="fw-light">Password</label>
        </div>

        <div class="text-center mb-4">
          <p class="text-muted">Doesn't have an account yet? <a href="sign-up.php" class="text-decoration-none">Create
              account</a></p>
        </div>

        <div class="d-grid">
          <button class="btn btn-primary" name="login_user">Log-in</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>