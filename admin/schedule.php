<?php 
session_start();

if(!isset($_SESSION['admin_user'])){
  header('Location:../404.php');
  exit();
}
include '../inc/connection.php';

// Select all data from schedule table
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);

// Select data from schedule table
$sql = "SELECT DISTINCT CONCAT(first_name,' ',last_name) AS full_name,id FROM doctors";
$result = $conn->query($sql);
$option_row = $result->fetch_all(MYSQLI_ASSOC);

mysqli_free_result($result);
$conn->close();

?>

<?php  include '../inc/header.php';?>
<div class="container-fluid">
  <div class="row ">
    <div class="fixed-top fixed-left me-5 d-flex flex-column justify-content-between vh-100 pb-3 bg-primary"
      style="width: 190px;">
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
              <a href="dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item mb-3">
              <a href="doctor-section.php" class="nav-link text-bg-emphasis ">Doctor</a>
            </li>
            <li class="nav-item mb-3">
              <a href="schedule.php" class="nav-link text-bg-emphasis text-white">Doctor Schedule</a>
            </li>
            <li class="nav-item">
              <a href="patient.php" class="nav-link text-bg-emphasis">Patients</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="mt-auto text-bg-emphasis fw-semibold text-center">
          <form action="process.php" method="POST">
            <button class="btn" type="submit" name="logout">
              <span class="text-bg-emphasis fw-semibold">Log-out</span><i class="fa-solid fa-right-to-bracket"></i>
            </button>
          </form>
        </div>
      </div>
    </div> <!-- sidebar end -->

    <div class="col p-0 mb-4 overflow-x-hidden" style="margin-left: 195px;">
      <div class="bg-white p-3 pe-5 mb-5 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold mb-0">
            <i class="fa-solid fa-user-secret me-2 fs-4"></i>Admin
            <?php echo $_SESSION['name'];?>
          </p>
        </div>
      </div>

      <!-- doctor add form  message -->
      <?php 
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>

      <!-- Schedule table -->
      <section class="row justify content-between mb-4 mx-2">
        <div class="col">
          <table class="table table-striped table-hover text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($row as $rows): ?>
              <tr>
                <th scope="row"><?php echo $rows['id']; ?></th>
                <td><?php echo $rows['doctor_name']; ?></td>
                <td><?php echo $rows['date']; ?></td>
                <td><?php echo $rows['time']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td>
                  <form action="process.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $rows['id']?>">
                    <button class="btn btn-danger rounded-circle" name="delete_sched">
                      <a href="#"><i class="fa-solid fa-trash text-light"></i></a>
                    </button>
                  </form>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div class="col-3 my-5">
          <form action="process.php" method="POST">
            <div class="mb-4">
              <select class="form-select form-select-md" name="doctor_name_id" aria-label=".form-select-sm example">
                <?php foreach($option_row as $option):?>
                <option value="<?php echo $option['full_name'].'-'.$option['id']; ?>" selected>Dr.
                  <?php echo $option['full_name'];?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-group input-group-md mb-4">
              <input type="date" class="form-control" id="date" name="date" placeholder="Enter the date">
              <input type="time" class="form-control" id="time" name="time" placeholder="Enter the time">
            </div>
            <div class="mb-4">
              <select class="form-select form-select-md" name="status" aria-label=".form-select-sm example">
                <option value="Available" selected>Available</option>
                <option value="Booked">Booked</option>
              </select>
            </div>

            <div class="text-center"><button class="btn btn-success btn-md" name="submit">Submit</button></div>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>