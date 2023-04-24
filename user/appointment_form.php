<?php
session_start();

if(!isset($_SESSION['user_name'])){
  header('Location:../404.php');
  exit();
}

include '../inc/connection.php';

$sched_id = $_GET['sched_id'];
$sql = "SELECT * FROM schedule WHERE id='$sched_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>

<?php include '../inc/header.php'?>
<div class="container">
  <!-- <?php echo $sched_id; ?> -->
  <div class="row my-5 justify-content-center">
    <div class="col-6">
      <form action="process.php" method="POST" class=" py-5 px-4 border-dark border-opacity-50  rounded shadow-lg">
        <?php 
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>
        <div class=" row mb-3">
          <div class="col">
            <div class="form-floating">
              <input type="hidden" name="doctor" value="<?php echo $row['doctor_name']?>">
              <input type="text" class="form-control" id="doctor" placeholder="Doctors Name"
                value="<?php echo $row['doctor_name']?>" disabled>
              <label for="doctor" class="ps-4 fw-light">Doctor</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="hidden" name="date" value="<?php echo $row['date'];  ?>">
              <input type="text" class="form-control" id="date" placeholder="Date"
                value="<?php echo date('F j, Y', strtotime($row['date'])); ?>" disabled>
              <label for="date" class="ps-4 fw-light">Date</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="hidden" name="time" value="<?php echo $row['time']; ?>">
              <input type="text" class="form-control" id="time" name="time" placeholder="Time"
                value="<?php echo date('g:i a', strtotime($row['time'])); ?>" disabled>
              <label for="time" class="ps-4 fw-light">Time</label>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <div class="form-floating ">
              <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter your name">
              <label for="first-name" class="ps-4 fw-light">First Name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating ">
              <input type="text" class="form-control" id="last-name" name="last_name"
                placeholder="Enter your last name">
              <label for="last-name" class="ps-4 fw-light">Last Name</label>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="age" name="age" placeholder="Enter your age">
          <label for="age" class="ps-4 fw-light">Age</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
          <label for="email" class="ps-4 fw-light">Address</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select form-select-md" name="sex" aria-label=".form-select-sm example">
            <option value="Male" selected>Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"
            name="description"></textarea>
          <label for="floatingTextarea" class="ps-4 fw-light">Reason for appointment...</label>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-secondary"><a href="doctor_schedule.php" class="text-white text-decoration-none">Go
              Back</a></button>
          <input type="hidden" name="sched_id" value="<?php echo $sched_id; ?>">
          <button class="btn btn-success" name="submit_appointment">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../inc/footer.php'?>