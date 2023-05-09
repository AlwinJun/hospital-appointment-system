<?php
session_start();

if(!isset($_SESSION['admin_user'])){
  header('Location:../404.php');
  exit();
}

include '../inc/connection.php';
// Get the admin_users name
$admin_user = $_SESSION['admin_user'];
$sql = "SELECT name FROM admin_account WHERE username = '$admin_user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['name'] = $row['name'];


$sql = "SELECT COUNT(*) as all_doctors FROM doctors";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$all_doctor = $row["all_doctors"];

$sql = "SELECT COUNT(*) as all_patients FROM patient";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$all_patients = $row["all_patients"];

$sql = "SELECT COUNT(*) as booked FROM patient WHERE status = 'Booked'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$book = $row["booked"];

$sql = "SELECT COUNT(*) as cancel FROM patient WHERE status = 'Cancelled'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$cancel = $row["cancel"];

?>

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
              <a href="doctor-section.php" class="nav-link text-bg-emphasis">Doctor</a>
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
        <div class="mt-auto text-center">
          <form action="process.php" method="POST">
            <button class="btn" type="submit" name="logout">
              <span class="text-bg-emphasis fw-semibold">Log-out</span><i class="fa-solid fa-right-to-bracket"></i>
            </button>
          </form>
        </div>
      </div>
    </div> <!-- sidebar end -->

    <!-- User -->
    <div class="main-content col p-0 mb-4 overflow-x-hidden">
      <div class="bg-white p-3 pe-5 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold mb-0">
            <i class="fa-solid fa-user-secret me-2 fs-4"></i>Admin
            <?php echo $_SESSION['name'];?>
          </p>
        </div>
      </div>

      <div class="welcome-img rounded">
        <div class="mx-4 py-4">
          <p class="lead mb-2 fw-semibold">Welcome!</p>
          <div class="h2 mb-2 fw-bold"> <?php echo $_SESSION['name'];?></div>
          <p calss="fs-6" style="width: 650px;">
            As an administrator, you can manage appointments, view patient information, and perform other administrative
            tasks from this dashboard. Please use the navigation menu on the left to access different sections of the
            website.
          </p>
        </div>
      </div>

      <div class="mt-5 mx-4">
        <div class="row">
          <div class="col-2 p-3 bg-primary rounded me-3">
            <div class="text-white px-1 pt-1 d-flex flex-row align-items-center justify-content-between">
              <p><i class="fa-solid fa-user-doctor " style="font-size: 3.5rem;"></i></p>
              <div class="text-end">
                <p class=" m-0 fs-2 fw-bold"><?php echo $all_doctor ?></p>
                <span>All Doctors</span>
              </div>
            </div>
          </div>

          <div class="col-2 p-3 bg-success rounded me-3">
            <div class="text-white p-1 d-flex flex-row align-items-center justify-content-between">
              <p><i class="fa-solid fa-users" style="font-size: 3.5rem;"></i></p>
              <div class="text-end">
                <i class="fa-regular fa-users-medical"></i>
                <p class=" m-0 fs-2 fw-bold"><?php echo $all_patients ?></p>
                <span>All Patient</span>
              </div>
            </div>
          </div>

          <div class="col-2 p-3 bg-info rounded me-3">
            <div class="text-white p-1 d-flex flex-row align-items-center justify-content-between">
              <p><i class="fa-solid fa-calendar-check" style="font-size: 3.5rem;"></i></p>
              <div class="text-end">
                <p class=" m-0 fs-2 fw-bold"><?php echo $book ?></p>
                <span>Schedule Booked</span>
              </div>
            </div>
          </div>


          <div class="col-2 p-3 bg-danger rounded me-3">
            <div class="text-white p-1 d-flex flex-row align-items-center justify-content-between">
              <p><i class="fa-solid fa-rectangle-xmark" style="font-size: 3.5rem;"></i></p>
              <div class="text-end">
                <p class=" m-0 fs-2 fw-bold"><?php echo $cancel ?></p>
                <span>Cancelled Appointment</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php include '../inc/footer.php';?>