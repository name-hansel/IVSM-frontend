<?php
session_start();
if (!isset($_SESSION['company_id'])) {
  header("location: ../../index.php");
}
$company_id = $_SESSION['company_id'];
$url = "https://industrialvisit-api.herokuapp.com/API/tour/getSampleCompanyData.php?company_id=$company_id";
$json_data = file_get_contents($url);
$tour_array = json_decode($json_data, true);

$url = "https://industrialvisit-api.herokuapp.com/API/company/getCompanyInfo.php?company_id=$company_id";
$json_data = file_get_contents($url);
$name = json_decode($json_data, true);
$name = $name['data'][0]['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Dashboard</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!-- header -->
  <div class="header">
    <h1><a href="../../index.php" class="link">Industrial Visit Management System</a></h1>
    <div class="header-right">
      <h5>Company Dashboard</h5>
    </div>
  </div>

  <!-- sidebar -->
  <div class="sidebar">
    <img src="../images/logo.png" alt="" width="180" />
    <div class="sidebar-links">
      <a href="" id="active">Dashboard</a>
      <a href="../add-new-tour/add-new-tour.php">Add New Tour</a>
      <a href="../your-tours/your-tours.php">View Your Tours</a>
      <a href="../scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
      <a href="../past-tours/past-tours.php">View Past Tours</a>
    </div>
  </div>

  <!-- content -->
  <div class="content">
    <!-- content header -->
    <div class="content-header">
      <h2 id="main-heading">Hello, <?= $name ?>.</h2>
      <div class="content-header-icons">
        <a href="../edit-profile/edit-profile.php"><img src="../images/user.svg" alt="" width="35" /></a>
        <a href="../logout.php"><img src="../images/logout.svg" alt="" width="32" /></a>
      </div>
    </div>

    <!-- tours -->
    <div class="sample-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Your Tours</h4>
        <button class="view-all">
          <a href="../your-tours/your-tours.php">
            View All <img src="../images/arrow.svg" alt="" width="12px" />
          </a></button>
      </div>
      <div class="sample-tours-container">
        <?php
        if (isset($tour_array['data']['tourData'][0]['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No tours.</h3>
          </div>
          <?php
        } else {
          foreach ($tour_array['data']['tourData'] as $key => $item) {
          ?>
            <div class="tour-card">
              <h3 id="tour-name"><?= $item['name'] ?></h3>
              <h4 id="tour-branch"><?= $item['branch'] ?></h4>
              <h4 id="tour-place"><?= $item['place'] ?></h4>
              <h5 id="tour-rate"><i class="fa fa-inr" aria-hidden="true"></i><?= $item['rate'] ?></h5>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>

    <!-- booked -->
    <div class="booked-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Booked Tours</h4>
        <button class="view-all">
          <a href="../scheduled-tours/scheduled-tours.php">
            View All <img src="../images/arrow.svg" alt="" width="12px" /></a>
        </button>
      </div>

      <div class="sample-tours-container">
        <?php
        if (isset($tour_array['data']['bookedTourData'][0]['message'])) {
        ?>
          <div class='no-tour'>
            <h3 class='message'>No booked tours.</h3>
          </div>
          <?php
        } else {
          foreach ($tour_array['data']['bookedTourData'] as $key => $item) {
          ?>
            <div class="tour-card">
              <h3 id="btour-name"><?= $item['name'] ?></h3>
              <h4 id="btour-date"><?= $item['available_days'] ?></h4>
              <h4 id="btour-college"><?= $item['college'] ?></h4>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="footer">
    <div class="socials">
      <div class="site twitter">
        <img src="../images/twitter-square-brands.svg" alt="" width="15px" />
        <a href="">Twitter</a>
      </div>
      <div class="site facebook">
        <img src="../images/facebook-square-brands.svg" alt="" width="15px" />
        <a href="">Facebook</a>
      </div>
      <div class="site instagram">
        <img src="../images/instagram-brands.svg" alt="" width="15px" />
        <a href="">Instagram</a>
      </div>
    </div>
    <div class="contact">
      <h4>Email Address: contact@ivms.com</h4>
      <h4>Contact Number: 9876543219</h4>
    </div>
  </div>
  <?php
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'success') {
  ?>
      <script>
        swal("Success!", "Password has been updated", "success");
      </script>
    <?php
    } elseif ($_GET['msg'] === 'error') {
    ?>
      <script>
        swal("Error", "Some error has occurred", "error");
      </script>
  <?php
    }
  }
  ?>
</body>

</html>