<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row mb-5">
    <div class="col p-2 bg-primary">
       <h1 class="text-white h3 d-flex justify-content-center align-items-center gap-2">
          <i class="bi bi-universal-access"></i>
          <p class="p-0 m-0">Hospital</p>
        </h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <form action="#" method="" class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        <div class="row justify-content-between align-items-center">
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname">
            <label for="firstname" class="ps-4 fw-light">Firstname</label>
          </div>
          <div class="col form-floating mb-3">
            <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname">
            <label for="lastname" class="ps-4 fw-light">Lastname</label>
          </div>
        </div>
        <div class="form-floating mb-3 ">
          <input type="text" class="form-control " id="address" placeholder="Enter your address">
          <label for="address" class="fw-light">Address</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="email" placeholder="Enter your email">
          <label for="email" class="fw-light">Email</label>
        </div>
        <div class="form-floating mb-4">
          <input type="mail" class="form-control" id="department" placeholder="Enter your department">
          <label for="department" class="fw-light">Department</label>
        </div>
        <div class="d-grid">
          <button class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>