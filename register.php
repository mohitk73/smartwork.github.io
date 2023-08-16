<?php
$insert = false;
if(isset($_POST['submit'])){
$submit = true;
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'smartwork';

    $con = mysqli_connect($server, $username, $password, $dbname);

    
    if (!$con) {
        die("Connection failed due to " .mysqli_connect_error());
    }
    //echo "success connecting to the db";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $assignment = $_POST['assignment'];
    $file = $_POST['file'];
    $date = $_POST['date'];
    $sql = "INSERT INTO `applyform` (`name`, `email`, `number`, `branch`, `semester`, `assignment`, `file`, `date`)
        VALUES ('$name', '$email', '$number', '$branch', '$semester', '$assignment', '$file', '$date')";
     echo $sql;

     if ($con->query($sql) == true) {
        //echo "Successfully inserted";
        $insert = true;
    }
     else{
        echo "ERROR: $sql <br> $con->error";
     }
        $con->close();
     
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Assignment done </title>
</head>
<body>

        <header>
        <div class="logo">
            <img src="images/s (2).jpg" alt="logo">
            <h1>SmartWork</h1>
        </div>
            <nav id="navbar">
            <ul>
                <a href="index.html">Home</a>
                <a href="aboutus.html">About Us</a>
                <a href="services.html">Services</a>
                <a href="contact.html">Contact</a>
                <a href="price.html">Price list</a>
                <a class="signup" href="login.html">Login</a>
            </ul>
            </nav>
            <div class="menu">
            <i class='bx bx-menu' ></i>
        </div>
        </header>
        <div class="register-form">
            <div class="register-image">
                <div class="register-contain">
                    <div class="register-heading">
                        <h2>Apply Now</h2>
                    </div>
                    <div class="register-details">
                        <?php
                        if($insert ==true){
                        echo "<p class='submitmsg'>Thankyou for registering our team will contact you soon</p>";
                        }
                        ?>
                  <form action="register.php" method="post" enctype="multipart/form-data">
                            <input type="text"  required="required" placeholder="Name" name="name">&nbsp;
                            <input type="email"  required="required" placeholder="Email Address" name="email"><br>
                            <input type="tel"  required="required" placeholder="Mobile number" name="number">&nbsp;
                            <input type="text"  required="required" placeholder="Branch" name="branch"><br>
                            <input type="number"  required="required" placeholder=" Semester" name="semester">&nbsp;
                            <label for="type">Select Type</label>
                            <select id="assignment" name="assignment" placeholder=" Select Assignment Type">
                                <option value="assignment">Assignment</option>
                                <option value="practical">Practical file</option>
                                <option value="project">Frontend project</option>
                              </select><br>
                              <label for="file">Please attach the pdf or Topic of the work<br> So i can make for you</label>
                              <input type="file"  required="required" placeholder="choose file" name="file"><br>
                              <label for="deadline">Deadline:</label>
                              <input type="date"  required min="2023-05-10" max="2023-06-30" name="date">
                            <button type="submit">Register</button>
                            <p>you can see our&nbsp;<a href="price.html">PriceList</a></p>
                            <p>Don't have created account yet?&nbsp;<a href="signup.html"> Signup Now</a></p>
                           
            
            
                        </form>
                    </div>
                </div>
              </div>
        </div>
        <script src="script.js"></script>
</body>
</html>
