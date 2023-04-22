<?php
session_start();

include '../inc/connection.php';
// Get the users_name name
$user_name = $_SESSION['user_name'];
$sql = "SELECT username FROM user_reg WHERE username = '$user_name'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['name'] = $row['username'];

// Select all data from doctors table
$sql = "SELECt * FROM doctors";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);

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
            <i class="fa-sharp fa-solid fa-user me-3"></i><?php echo $_SESSION['name'];?>
          </p>
        </div>
      </div>
      <!-- appointment message -->
      <?php 
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>
      <!-- Doctor card section -->
      <section class="row px-4 align-items-center g-4 mt-3">
        <?php foreach($row as $card): ?>
        <div class="col-4">
          <div class="card rounded">
            <img src=<?php echo $card['image']; ?> class="card-imgs card-img-top" alt="doctor picture">
            <div class="card-body d-flex flex-column align-items-center text-center">
              <h5 class="card-title text-primary"><?php echo 'Dr. '.$card['first_name'].' '. $card['last_name']; ?>
              </h5>
              <div class="card-info text-muted mb-3">
                <p class="card-text py-1 px-3 bg-primary-subtle text-primary text-uppercase fw-semibold rounded-pill">
                  <?php echo $card['department']; ?> </p>
              </div>
              <form action="doctor_schedule.php" method="POST">
                <input type="hidden" name="doctor_id" value="<?php echo $card['id']?>">
                <input type="hidden" name="doctor_name" value="<?php echo $card['first_name'].' '.$card['last_name']?>">
                <button type="submit" class="btn btn-success rounded-pill px-5" name="get_sched">
                  See Schedule
                </button>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'?>