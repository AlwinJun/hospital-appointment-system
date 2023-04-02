<?php  include '../inc/header.php';?>

<div class="container-fluid">
  <div class="row ">
    <div class="fixed-top fixed-left me-5 d-flex flex-column justify-content-between vh-100 pb-3 bg-primary" style="width: 190px;">
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
              <a href="#" class="nav-link active text-white">Dashboard</a>
            </li>
            <li class="nav-item mb-3">
              <a href="#" class="nav-link text-bg-emphasis">Doctor Schedule</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-bg-emphasis">Patients</a>
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
    
    <div class="col p-0"  style="margin-left: 210px;">
      <div class="bg-white p-3 pe-5 mb-5 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold"><i class="fa-solid fa-user-secret me-2 fs-4"></i>Alwin</p>
        </div>
      </div>

      <section class="row px-4 align-items-center g-5">

        <div class="col-4">
          <div class="card rounded">
            <img src="../assets/doctor1.jpg" class="card-img-top" alt="..." style="height: 180px; object-fit:cover; object-position:0% 20%;">
            <div class="card-body d-flex flex-column align-items-center text-center">
                <h5 class="card-title text-primary">Dr. Doctor Name</h5>
                <div class="text-muted mb-3" style="font-size: 14px;">
                  <p class="card-text">313, Batakil, Pozorrbio, Pangasinan</p>
                  <p class="card-text">doctor@gmail.com</p>
                  <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">Neurologist</p>
                </div>
                <div class="d-flex">
                  <button class="btn"><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></button>
                  <button class="btn"><a href="#"><i class="fa-solid fa-trash"></i></a></button>
                </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>