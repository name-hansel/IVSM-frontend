<?php
$url = 'http://localhost/IVMS-API/API/tour/getSampleCompanyData.php';
$json_data = file_get_contents($url);
$tour_array = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Dashboard</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- header -->
  <div class="header">
    <h1>Industrial Visit Management System</h1>
    <div class="header-right">
      <h5>Company Dashboard</h5>
    </div>
  </div>

  <!-- sidebar -->
  <div class="sidebar">
    <img src="../images/logo.png" alt="" width="180" />
    <div class="sidebar-links">
      <a href="../add-new-tour/add-new-tour.html">Add New Tour</a>
      <a href="">View Tour Catalog</a>
      <a href="">View Scheduled Tours</a>
      <a href="">Edit Tour</a>
      <a href="">View Past Tours</a>
    </div>
  </div>

  <!-- content -->
  <div class="content">
    <!-- content header -->
    <div class="content-header">
      <h2 id="main-heading">Hello, ABC Company.</h2>
      <div class="content-header-icons">
        <a href=""><img src="../images/user.svg" alt="" width="35" /></a>
        <a href=""><img src="../images/logout.svg" alt="" width="32" /></a>
      </div>
    </div>

    <!-- tours -->
    <div class="sample-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Your Tours</h4>
        <button class="view-all">
          View All <img src="../images/arrow.svg" alt="" width="12px" />
        </button>
      </div>
      <div class="sample-tours-container">
        <?php
        if (!isset($tour_array['data']['tourData']['message'])) {
          foreach ($tour_array['data']['tourData'] as $key => $item) {
            echo
              '<div class="tour-card">
                    <div class="tour-card-content">
                      <h3 id="tour-name">' . $item['name'] . '</h3>
                      <h4 id="tour-branch">' . $item['branch'] . '</h4>
                      <h4 id="tour-place">' . $item['place'] . '</h4>
                      <h5 id="tour-rate">' . $item['rate'] . '</h5>
                    </div>
                  </div>';
          }
        } else {
          // TODO show no tours here
        }
        ?>
      </div>
    </div>

    <!-- booked -->
    <div class="booked-tours">
      <div class="sample-tours-head-div">
        <h4 id="sample-tours-heading">Booked Tours</h4>
        <button class="view-all">
          View All <img src="../images/arrow.svg" alt="" width="12px" />
        </button>
      </div>

      <div class="sample-tours-container">
        <?php
        if (!isset($tour_array['data']['bookedTourData']['message'])) {
          foreach ($tour_array['data']['bookedTourData'] as $key => $item) {
            echo
              '<div class="tour-card" id="card4">
                  <div class="tour-card-content">
                    <h3 id="btour-name">' . $item['name'] . '</h3>
                    <h4 id="btour-date">' . $item['date'] . '</h4>
                    <h4 id="btour-college">' . $item['college'] . '</h4>
                  </div>
                </div>';
          }
        } else {
          // TODO show no booked tours here
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
</body>

</html>