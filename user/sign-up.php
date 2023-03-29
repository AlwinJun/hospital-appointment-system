<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-9">
      <form action="#" method="" class="py-5 px-4 border border-opacity-50 border-secondary rounded shadow-lg">
        
        <div class="row justify-content-between align-items-center">
          <div class="col-4 form-floating mb-3">
            <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname">
            <label for="firstname" class="ps-4 fw-light">Firstname</label>
          </div>
          <div class="col-4 form-floating mb-3">
            <input type="text" class="form-control" id="middlename" placeholder="Enter your middlename">
            <label for="middlename" class="ps-4 fw-light">Middlename</label>
          </div>
          <div class="col-4 form-floating mb-3">
            <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname">
            <label for="lastname" class="ps-4 fw-light">Lastname</label>
          </div>
        </div>
        
        <div class="row align-items-center">
          <div class="col-3 form-floating me-4 mb-3">
            <input type="text" class="form-control" id="age" placeholder="Enter your age">
            <label for="age" class="ps-4 fw-light">Age</label>
          </div>
          <div class="col-3 d-flex justify-content-between fw-light">
            <p>Sex: </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="male" value="male">
                <label class="form-check-label" for="male">
                  Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="female" value="female">
                <label class="form-check-label" for="female">
                  Female
                </label>
            </div>
          </div>
        </div>


          <div class="form-floating mb-4">
            <input type="text" class="form-control" id="password" placeholder="Enter your password">
            <label for="password" class="ps-4 fw-light">Password</label>
          </div>

          <div class="d-grid">
                <button class="btn btn-primary">Create account</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>
