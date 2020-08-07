<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<?php

date_default_timezone_set("Africa/Lagos");
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $dobErr =$fcErr = $genderErr = $deptErr = $passErr = "";

$fname = $lname = $email = $dob =$fc = $gender = $dept = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
      $fnameErr = "First name is required";
    } else {
      $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
      } else {
        $lname = test_input($_POST["lname"]);
      }
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

    if (empty($_POST["dob"])) {
        $dobErr = "Date is required";
      } else {
        $dob = $_POST["dob"];
      }
      
    if (empty($_POST["fc"])) {
      $fcErr = "Favourite color is required";
    } else {
      $fc = $_POST["fc"];
    }
  
    if (!isset($_POST["gender"]) || count($_POST["gender"]) > 1) {
      $genderErr = "Please select at least 1 choice";
    } else {
      $gender = $_POST["gender"][0];
    }
  
    if (!isset($_POST["dept"])) {
      $deptErr = "Please select a department";
    } else {
      $dept = $_POST["dept"];
    }
  }

  if(!empty($_POST["pass"])) {
    $pass = $_POST["pass"];
    if (strlen($_POST["pass"]) <= '15') {
        $passErr .= "Your Password Must Contain At Least 15 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$pass)) {
        $passErr .= "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$pass)) {
        $passErr .= "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
        $passErr .= "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    elseif(!preg_match("#[\W]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 special character!";
    }
}
 else {
     $passErr = "Please enter password ";
}

  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    
?>

<h2>Sign Up Form</h2>

<h4>* means required</h4>

<form method="post" action="process.php">

<div class="container">

  
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name<span>*</span></label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" placeholder="Your First Name" value="<?php echo $fname;?>" required>  <span class="error"><?php echo $fnameErr;?></span>
    </div>
  </div>


  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name<span>*</span></label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lname" placeholder="Your Last Name" value="<?php echo $lname;?>" required>  <span class="error"><?php echo $lnameErr;?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="email">Email<span>*</span></label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" placeholder="Your Email Address" value="<?php echo $email;?>" required>  <span class="error"><?php echo $emailErr;?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="dob">Date of Birth<span>*</span></label>
    </div>
    <div class="col-75">
      <input type="date" id="dob" name="dob" value="<?php echo date('Y-m-d'); ?>" required> <span class="error"><?php echo $dobErr;?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fc">Favourite Color<span>*</span></label>
    </div>
    <div class="col-75">
      <input type="color" id="fc" name="fc" value="<?php echo $fc; ?> " required> <span class="error"><?php echo $fcErr;?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="gender">Gender<span>*</span></label>
    </div>
    <div class="col-75">
      Male<input type="checkbox" name="gender[]" value="male"> <span class="error"><?php echo $genderErr;?></span>
      Female<input type="checkbox" name="gender[]" value="female"> <span class="error"><?php echo $genderErr;?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="dept">Department<span>*</span></label>
    </div>
    <div class="col-75">
      <select id="dept" name="dept">
        <option value="it">IT</option>
        <option value="hr">HR</option>
        <option value="stuff">Stuff</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Password<span>*</span></label>
    </div>
    <div class="col-75">
    <input type="text" id="pass" name="pass" value="<?php echo $pass;?> " required> <span class="error"><?php echo $passErr;?></span>
    </div>
  </div> <br/>

  <div class="row">.

    <input type="submit" name="submit" value="Submit">
  </div>
  </form>
</div>

</body>
</html>