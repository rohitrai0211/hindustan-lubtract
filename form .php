<!DOCTYPE html>
<html>
<head>
	<title>Form Submission</title>
</head>
<body>

	<?php
		$nameErr = $emailErr = "";
		$name = $email = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
		    $nameErr = "Name is required";
		  } else {
		    $name = test_input($_POST["name"]);
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		      $nameErr = "Only letters and white space allowed";
		    }
		  }
		  
		  if (empty($_POST["email"])) {
		    $emailErr = "Email is required";
		  } else {
		    $email = test_input($_POST["email"]);
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailErr = "Invalid email format";
		    }
		  }
		  
		  if (empty($nameErr) && empty($emailErr)) {
		    $to = "youremail@example.com";
		    $subject = "Form Submission";
		    $message = "Name: " . $name . "\nEmail: " . $email;
		    mail($to, $subject, $message);
		    echo "<p>Thank you for submitting the form.</p>";
		  }
		}
		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>

	<h2>Form Submission</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label for="name">Name:</label>
	  <input type="text" id="name" name="name" value="<?php echo $name;?>">
	  <span class="error"><?php echo $nameErr;?></span><br><br>
	  <label for="email">Email:</label>
	  <input type="email" id="email" name="email" value="<?php echo $email;?>">
	  <span class="error"><?php echo $emailErr;?></span><br><br>
	  <input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>
