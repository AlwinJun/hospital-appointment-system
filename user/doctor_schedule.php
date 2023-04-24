<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header('Location:../404.php');
  exit();
}

include '../inc/connection.php';
// $doctor_id = $doctor_name = '';
$doctor_id = $_GET['id'];
$doctor_name = $_GET['name'];
// Select all data from schedule table
$sql = "SELECT * FROM schedule WHERE doctor_id = $doctor_id AND status = 'Available' ORDER BY date,time";
$result = $conn->query($sql);
$row= $result->fetch_all(MYSQLI_ASSOC);

mysqli_free_result($result);
$conn->close();
?>


<?php include '../inc/header.php'?>
<div class="container-fluid">
  <div class="row ">
    <div
      class="main-sidebar fixed-top fixed-left me-5 d-flex flex-column justify-content-between vh-100 pb-3 bg-primary">
      <h1 class="text-white h3 d-grid justify-content-center mt-4 fw-bold">
        <i class="bi bi-universal-access mb-3 h1"></i>
        <p class="d-grid text-uppercase justify-content-center gap-2 text-center">
          <span>H</span>
          <span>o</span>
          <span>s</span>
          <span>p</span>
          <span>i</span>
          <span>t</span>
          <span>a</span>
          <span>l</span>
        </p>
      </h1>
      <div class="row">
        <div class="mt-auto text-center">
          <form action="process.php" method="POST">
            <button class="btn" type="submit" name="logout">
              <span class="text-bg-emphasis fw-semibold">Log-out</span><i class="fa-solid fa-right-to-bracket"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- User -->
    <div class="main-content col p-0 mb-4 overflow-x-hidden">
      <div class="bg-white p-3 pe-5 py-4 border border-bottom-1 border-black shadow">
        <div class="d-flex justify-content-end align-items-center">
          <p class="lead fw-bold mb-0">
            <i class="fa-sharp fa-solid fa-user me-3"></i><?php echo $_SESSION['user_name'];?>
          </p>
        </div>
      </div>
      <!-- schedule message -->
      <?php 
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>
      <!-- Doctor card section -->
      <section class="row px-4 align-items-center mt-3">
        <h2 class="my-3">Dr. <?php echo $doctor_name; ?></h2>
        <div class="row ms-5">
          <div class="col-5">
            <table class="table table-secondary table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($row as $rows): ?>
                <tr>
                  <td><?php echo date('F j, Y', strtotime($rows['date'])); ?></td>
                  <td><?php echo date('g:i a', strtotime($rows['time'])); ?></td>
                  <td>
                    <button class="btn btn-link" name="get_appointment">
                      <a href="appointment_form.php?sched_id=<?php echo $rows['id']; ?>"> Get appointment</a></button>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<?php include '../inc/footer.php';?>