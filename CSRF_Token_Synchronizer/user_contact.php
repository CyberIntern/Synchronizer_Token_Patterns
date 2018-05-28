<?php

	if(isset($_POST['uname']) && isset($_POST['psw']))
	{
		$uname=$_POST['uname'];
		$psw=$_POST['psw'];

		if (($uname=='sinthu') && ($psw=='sinthu'))
		{
			//echo "USER LOGIN SUCCESSFUL.";	
		}

		else
		{
			echo "INVALID LOGIN. PLEASE TRY AGAIN.";
			exit();
		}

	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Cross Site Request Foregery Protection using Synchronizer Token Patterns</title>
	<link rel="stylesheet" href="styles_2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function()
	{
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				document.getElementById("csrf_token_hidden").setAttribute('value', this.responseText) ;
			}
	
		};
	
		xhttp.open("GET", "csrf_token_gen.php", true);
		xhttp.send();
	});
	</script>
</head>

<body>

<div class="container">
  <form action="user_confirmation.php" method="post">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="Sri Lanka">Sri Lanka</option>
      <option value="India">India</option>
      <option value="Singapore">Singapore</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
	
	<input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>

  </form>
</div>

</body>

</html>