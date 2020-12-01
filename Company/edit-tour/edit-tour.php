<?php
if (isset($_POST['tour_id'])) {
    $tour_id = $_POST['tour_id'];
} else {
    header('Location: http://localhost/IVSM%20-%20frontend/Company/your-tours/your-tours.php');
}
$url = "http://localhost/IVMS-API/API/tour/getTourDetails.php?tour_id=$tour_id";
$json_data = file_get_contents($url);
$tour = json_decode($json_data, true);
$tour = $tour[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Tour</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <h1>Industrial Visit Management System</h1>
        <div class="header-right">
            <h5>Edit Tour</h5>
        </div>
    </div>
    <!-- sidebar -->
    <div class="sidebar">
        <img src="../images/logo.png" alt="" width="180" />
        <div class="sidebar-links">
            <a href="../company-dashboard/company-dashboard.php">Dashboard</a>
            <a href="">Add New Tour</a>
            <a href="../your-tours/your-tours.php" id="active">View Your Tours</a>
            <a href="../scheduled-tours/scheduled-tours.php">View Scheduled Tours</a>
            <a href="">View Past Tours</a>
        </div>
    </div>

    <div class="content">
        <h3 class="form-heading">Edit Tour Details</h3>
        <!-- form -->
        <form name="tour" onSubmit="return formValidation()" method="POST">
            <input type="hidden" id="tour_id" value="<?= $tour_id ?>">
            <div class="form-element">
                <label for="name" class="form-label">tour name</label>
                <input type="text" name="name" class="form-input" required value="<?= $tour['name'] ?>" />
                <p class="error" id="name-error">Please enter a valid name.</p>
            </div>

            <div class="form-element">
                <label for="branch" class="form-label">branch</label>
                <input type="text" name="branch" class="form-input" value="<?= $tour['branch'] ?>" required />
                <p class="error" id="branch-error">Please enter a valid branch.</p>
            </div>

            <div class="form-element">
                <label for="address" class="form-label">address</label>
                <input type="text" name="place" class="form-input" value="<?= $tour['place'] ?>" required />
                <p class="error" id="address-error">Please enter a valid address.</p>
            </div>

            <div class="form-element">
                <label for="number_people" class="form-label">number of people</label>
                <input type="number" name="number_people" value="<?= $tour['number_people'] ?>" class="form-input" required />
                <p class="error" id="capacity-error">Please enter a valid number.</p>
            </div>

            <div class="form-element">
                <label for="date" class="form-label">tour date</label>
                <input type="hidden" id="defaultDate" value="<?= $tour['available_days'] ?>">
                <input type="text" name="available_days" class="form-input" id="datepicker" />
                <p class="error" id="date-error">Please enter a valid date.</p>
            </div>

            <div class="form-element">
                <label for="rate" class="form-label">rate</label>
                <div class="rupee-input">
                    <img src="../images/rupee.svg" alt="" width="22px" id="rupee-icon" />
                    <input type="number" name="rate" class="form-input rate" required value="<?= $tour['rate'] ?>" />
                    <p class="error" id="rate-error">Please enter a valid rate.</p>
                </div>
            </div>

            <div class="form-element">
                <label for="desc" class="form-label">description</label>
                <textarea name="description" class="form-input">
                    <?= $tour['description'] ?>
                </textarea>
            </div>
            <!-- TODO add reset button -->
            <button type="submit" class="add-tour-btn">edit tour</button>
        </form>
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