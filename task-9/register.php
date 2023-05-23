<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/register.css" />
</head>

<body>
  <?php
  require 'db.php';
  $isError = false;
  $firstname = '';
  $lastname = '';
  $mobile = '';
  $email = '';
  $branch = '';
  $address = '';
  $add_subjects = [];
  $hostel = 0;

  // Variables for storing error
  $firstNameError = '';
  $lastNameError = '';
  $mobileError = '';
  $emailError = '';
  $branchError = '';
  $addressError = '';
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // print_r($_POST);
    // collect value of input field
    $firstname = sanitizeField($_POST['firstname']);
    $lastname = sanitizeField($_POST['lastname']);
    $email = sanitizeField($_POST['email']);
    $mobile = sanitizeField($_POST['mobile']);
    $branch = $_POST['branch'];
    $hostel = sanitizeField($_POST['inlineRadioOptions']);
    $address = sanitizeField($_POST['address']);
    $add_subjects = json_encode($_POST['add_subjects']);

    $sql = "INSERT INTO `student` (`firstname`, `lastname`, `email`, `mobile`, `branch`, `hostel`, `address`, `add_subjects`)
VALUES ('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $mobile . "', '" . $branch . "', '" . $hostel . "', '" . $address . "', '" . $add_subjects . "')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  function sanitizeField($field)
  {
    $field = trim($field);
    $field = stripslashes($field);
    $field = htmlspecialchars($field);
    return $field;
  }
  ?>
  <div id="navbar">
    <div class="left">
      <img src="images/logo.png" alt="logo" />
      <h3>One School</h3>
    </div>
    <div class="right">
      <img src="images/profile.jpg" alt="profile" style="border-radius: 50%" />
    </div>
  </div>
  <div class="sidebar">
    <nav>
    <a href="#"><i class="bi bi-house"></i> STUDENTS</a>
    <a href="#"><i class="bi bi-person"></i> STAFF</a>
    <a href="#"><i class="bi bi-book"></i> EXAMS</a>
    </nav>
  </div>
  <div class="container main">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
      <div class="row">
        <h5 class="main-heading">STUDENT REGISTRATION</h5>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <label class="row" for="First Name">First name * :</label>
          <input type="text" name="firstname" id="fn" class="row" placeholder="Enter your first name" value="<?php echo "$firstname"; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="Last Name" class="row">Last name * :</label>
          <input type="text" placeholder="Enter your last name" class="row" name="lastname" />
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <label for="" class="row">Mobile * :</label>
          <input type="tel" placeholder="Enter your mobile number" class="row" name="mobile" />
        </div>
        <div class="col-sm-6">
          <label for="" class="row">Email * :</label>
          <input type="email" placeholder="Enter your email" class="row" name="email" />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="" class="row">Branch * :</label>
          <select name="branch" id="" class="row">
            <option value="" disabled selected hidden>
              Select branch you like
            </option>
            <option value="Computer Science Engineering">Computer Science Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
          </select>
        </div>
        <div class="col">
          <label for="" class="row">Do you need hostel facility :</label>
          <div class="row" id="hostel_radio">
            <div class="form-check form-check-inline col col-lg-2">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline col col-lg-2">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
              <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <label for="additional sub" class="row">Choose Additional Subjects :
        </label>
        <div class="row">
          <div class="form-check form-check-inline col col-lg-2">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Cyber Security" name="add_subjects[]">
            <label class="form-check-label" for="inlineCheckbox1">Cyber Security</label>
          </div>
          <div class="form-check form-check-inline col col-lg-2">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Artificial Intelligence" name="add_subjects[]">
            <label class="form-check-label" for="inlineCheckbox2">Artificial Intelligence</label>
          </div>
          <div class="form-check form-check-inline col col-lg-2">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Blockchain" name="add_subjects[]">
            <label class="form-check-label" for="inlineCheckbox1">Blockchain</label>
          </div>
          <div class="form-check form-check-inline col col-lg-2">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="IoT" name="add_subjects[]">
            <label class="form-check-label" for="inlineCheckbox2">IoT</label>
          </div>
          <div class="form-check form-check-inline col col-lg-2">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Robotics" name="add_subjects[]">
            <label class="form-check-label" for="inlineCheckbox2">Robotics</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="address">
          <label for="" class="row">Permanent Address * :</label>
          <textarea name="address" id="" cols="80" rows="10" placeholder="Enter your full address" class="row"></textarea>
        </div>
      </div>
      <div class="row float-end">
        <div class="btn-main">
          <div class="buttons">
            <button type="reset" id="clr" class="btn">CLEAR</button>
            <button type="submit" id="sub" class="btn">SUBMIT</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>