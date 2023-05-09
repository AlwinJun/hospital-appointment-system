<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-7 d-flex flex-row">
      <div class="" style="width:45%;">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade rounded" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1500">
              <img src="../assets/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
              <img src="../assets/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
              <img src="../assets/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1500">
              <img src="../assets/4.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <form action="process.php" method="POST"
        class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <div class="text-center">
          <p class="fs-1 fw-bold text-primary">Welcome Back</p>
          <p class="fw-light fs-small">Login your details to continue</p>
        </div>
        <?php 
          session_start();
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