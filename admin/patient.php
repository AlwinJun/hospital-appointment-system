<?php 
session_start();

if(!isset($_SESSION['admin_user'])){
  header('Location:../404.php');
  exit();
}

include '../inc/connection.php';

// Select all data from patient table
$sql = "SELECt * FROM patient";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);

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
              <a href="schedule.php" class="nav-link text-bg-emphasis">Doctor Schedule</a>
            </li>
            <li class="nav-item">
              <a href="patient.php" class="nav-link text-bg-emphasis text-white">Patients</a>
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

      <section class="row mb-4 mx-2">
        <div class="col">
          <table class="table table-striped table-hover text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Sex</th>
                <th scope="col">Doctor</th>
                <th scope="col">Date-Time</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($row as $rows): ?>
              <tr>
                <th scope="row"><?php echo $rows['id']; ?></th>
                <td><?php echo $rows['first_name']; ?></td>
                <td><?php echo $rows['last_name']; ?></td>
                <td><?php echo $rows['age']; ?></td>
                <td><?php echo $rows['address']; ?></td>
                <td><?php echo $rows['sex']; ?></td>
                <td><?php echo $rows['doctor']; ?></td>
                <td>
                  <?php echo date('F j, Y', strtotime($rows['date'])).'<br>'.date('g:i a', strtotime($rows['time'])); ?>
                </td>
                <td><?php echo $rows['description']; ?></td>
                <td class="d-flex gap-2">
                  <button class="btn btn-outline-info rounded-circle">
                    <a href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                  </button>
                  <form action="process.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $rows['id']?>">
                    <button class="btn btn-danger rounded-circle" name="delete_patient">
                      <a href="#"><i class="fa-solid fa-trash text-light"></i></a>
                    </button>
                  </form>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>

<?php include '../inc/footer.php';?>