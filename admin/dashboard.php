<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row ">
    <div class="main-sidebar fixed-top fixed-left me-5 d-flex flex-column justify-content-between vh-100 pb-3 bg-primary">
      <div class="row">
        <nav class="navbar mx-2 mt-3 mb-5">
          <a href="#" class="navbar-brand mb-4">
            <h1 class="text-white h3 d-flex gap-2">
                <i class="bi bi-universal-access"></i>
                <p class="">Hospital</p>
            </h1>
          </a>
        
          <!-- Main sidebar nav -->
          <ul class="navbar-nav fw-semibold">
            <li class="nav-item mb-3">
              <a href="dashboard.php" class="nav-link text-bg-emphasis text-white">Dashboard</a>
            </li>
            <li class="nav-item mb-3">
              <a href="schedule.php" class="nav-link text-bg-emphasis">Doctor Schedule</a>
            </li>
            <li class="nav-item">
              <a href="patient.php" class="nav-link text-bg-emphasis">Patients</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="mt-auto text-bg-emphasis fw-semibold text-center">
          <p>Log-out
            <span><i class="fa-solid fa-right-to-bracket"></i></span>
          </p>
        </div>
      </div>
    </div>   <!-- sidebar end -->
    
    <!-- User -->
    <div class="main-content col p-0 mb-4 overflow-x-hidden">
      <div class="bg-white p-3 pe-5 mb-5 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold mb-0"><i class="fa-solid fa-user-secret me-2 fs-4"></i>Alwin</p>
        </div>
      </div>

      <div class="mb-3 d-flex px-3">
        <button class="btn btn-primary btn-lg rounded-pill ms-auto">
          <a href="doctor-add.php" class="text-light fw-semibold fs-6 text-decoration-none"><i class="fa-solid fa-user-plus me-2"></i>Add Doctor</i></a>
        </button>
      </div>

      <!-- Doctor card section -->
      <section class="row px-4 align-items-center g-4">
        <div class="col-4">
            <div class="card rounded">
              <img src="../assets/doctor1.jpg" class="card-imgs card-img-top" alt="...">
              <div class="card-body d-flex flex-column align-items-center text-center">
                  <h5 class="card-title text-primary">Dr. Doctor Name</h5>
                  <div class="card-info text-muted mb-3">
                    <p class="card-text">313, Batakil, Pozorrbio, Pangasinan</p>
                    <p class="card-text">doctor@gmail.com</p>
                    <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">Neurologist</p>
                  </div>
                  <div class="d-flex gap-3">
                    <button class="btn btn-outline-info"><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></button>
                    <button class="btn btn-danger rounded-circle"><a href="#"><i class="fa-solid fa-trash text-light"></i></a></button>
                  </div>
              </div>
            </div>
        </div>

        <div class="col-4">
          <div class="card rounded">
            <img src="../assets/doctor1.jpg" class="card-imgs card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center text-center">
                <h5 class="card-title text-primary">Dr. Doctor Name</h5>
                <div class="card-info text-muted mb-3">
                  <p class="card-text">313, Batakil, Pozorrbio, Pangasinan</p>
                  <p class="card-text">doctor@gmail.com</p>
                  <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">Neurologist</p>
                </div>
                <div class="d-flex gap-3">
                  <button class="btn btn-outline-info"><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></button>
                  <button class="btn btn-danger rounded-circle"><a href="#"><i class="fa-solid fa-trash text-light"></i></a></button>
                </div>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card rounded">
            <img src="../assets/doctor1.jpg" class="card-imgs card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center text-center">
                <h5 class="card-title text-primary">Dr. Doctor Name</h5>
                <div class="card-info text-muted mb-3">
                  <p class="card-text">313, Batakil, Pozorrbio, Pangasinan</p>
                  <p class="card-text">doctor@gmail.com</p>
                  <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">Neurologist</p>
                </div>
                <div class="d-flex gap-3">
                  <button class="btn btn-outline-info"><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></button>
                  <button class="btn btn-danger rounded-circle"><a href="#"><i class="fa-solid fa-trash text-light"></i></a></button>
                </div>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card rounded">
            <img src="../assets/doctor1.jpg" class="card-imgs card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center text-center">
                <h5 class="card-title text-primary">Dr. Doctor Name</h5>
                <div class="card-info text-muted mb-3">
                  <p class="card-text">313, Batakil, Pozorrbio, Pangasinan</p>
                  <p class="card-text">doctor@gmail.com</p>
                  <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">Neurologist</p>
                </div>
                <div class="d-flex gap-3">
                  <button class="btn btn-outline-info"><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></button>
                  <button class="btn btn-danger rounded-circle"><a href="#"><i class="fa-solid fa-trash text-light"></i></a></button>
                </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>