<?php
include '../inc/connection.php';

$sql = "SELECt * FROM doctors";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
mysqli_free_result($result);
$conn->close();
;?>

<?php  include '../inc/header.php';?>
<div class="container-fluid">
  <div class="row ">
    <div
      class="main-sidebar fixed-top fixed-left me-5 d-flex flex-column justify-content-between vh-100 pb-3 bg-primary">
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
    </div> <!-- sidebar end -->

    <!-- User -->
    <div class="main-content col p-0 mb-4 overflow-x-hidden">
      <div class="bg-white p-3 pe-5 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold mb-0"><i class="fa-solid fa-user-secret me-2 fs-4"></i>Alwin</p>
        </div>
      </div>

      <!-- doctor add form  message -->
      <?php 
        session_start();
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>

      <div class="mt-5 mb-3 d-flex px-3">
        <button class="btn btn-primary btn-lg rounded-pill ms-auto">
          <a href="doctor-add.php" class="text-light fw-semibold fs-6 text-decoration-none"><i
              class="fa-solid fa-user-plus me-2"></i>Add Doctor</i></a>
        </button>
      </div>

      <!-- Doctor card section -->
      <section class="row px-4 align-items-center g-4">
        <?php foreach($row as $card): ?>
        <div class="col-4">
          <div class="card rounded">
            <img src=<?php echo $card['image']; ?> class="card-imgs card-img-top" alt="doctor picture">
            <div class="card-body d-flex flex-column align-items-center text-center">
              <h5 class="card-title text-primary"><?php echo 'Dr. '.$card['first_name'].' '. $card['last_name']; ?>
              </h5>
              <?php echo $card['id']?>
              <div class="card-info text-muted mb-3">
                <p class="card-text"><?php echo $card['address']; ?></p>
                <p class="card-text"><?php echo $card['email']; ?> </p>
                <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">
                  <?php echo $card['department']; ?> </p>
              </div>
              <div class="d-flex gap-3">
                <button class="btn btn-outline-info">
                  <a href="process.php?id=<?php echo $card['id']?>">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                </button>
                <form action="process.php" method="POST">
                  <input type="hidden" name="delete_id" value="<?php echo $card['id']?>">
                  <button type="submit" class="btn btn-danger rounded-circle" name="delete">
                    <i class="fa-solid fa-trash text-light"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>