<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-6</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="css/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div id="navbar">
        <div class="left">
          <img src="images/logo.png" alt="logo" />
          <h2>One School</h2>
        </div>
        <div class="right">
          <img
            src="images/profile.jpg"
            alt="profile"
            style="border-radius: 50%"
          />
        </div>
      </div>
    <div class="main">
      <div class="sidebar">
        <nav>
            <a href="#"><i class="bi bi-house"></i> STUDENTS</a>
            <a href="#"><i class="bi bi-person"></i> STAFF</a>
            <a href="#"><i class="bi bi-book"></i> EXAMS</a>
        </nav>
      </div>
      <div class="main-content">
        <div class="left-main">
          <h2>STUDENTS</h2>
        </div>
        <div class="right-main">
          <a href="register.php"><i class="bi bi-plus"></i>Add Student</a>
        </div>
        <div class="table-div">
          <table>
            <tr>
              <th>R NO.</th>
              <th>FULL NAME</th>
              <th>BRANCH</th>
              <th>MOBILE</th>
              <th>EMAIL</th>
              <th>ACTIONS</th>
            </tr>
            <?php
              require 'db.php';
              $sql = "SELECT * FROM student";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                    <td><?php echo $row['branch']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                      <a class="button" href="edit.php?id=<?php echo $row['id'];  ?>">
                        <i class="fa-solid fa-pencil"></i>
                      </a>
                      <a class="button" href="view.php?id=<?php echo $row['id'];  ?>">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                      <a class="button" href="delete.php?id=<?php echo $row['id'];  ?>" onclick="return confirm('Are you sure to delete?');">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php }
              } else { ?>
                <tr>
                  <td colspan="6">No Records Found!</td>
                </tr>
              <?php
              }
    
              $conn->close();
              ?>
          </table>
        </div>
      </div>
    </div>
</body>
</html>