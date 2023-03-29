<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-5">
      <form action="#" method="" class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
          <div class="mb-3">
            <label for="username" class="form-label lead">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
          </div>

          <div class="mb-4">
            <label for="password" class="form-label lead">Password</label>
            <input type="text" class="form-control" id="password" placeholder="Enter your password">
          </div>

          <div class="d-grid">
                <button class="btn btn-primary">Log-in</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>
