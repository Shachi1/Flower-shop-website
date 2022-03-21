<?php
$error='';
$name='';
$email='';

$message='';
function clean_text($string)
{
	$string=trim($string);
	$string=stripcslashes($string);
	$string=htmlspecialchars($string);
	return $string;

}
if(isset($_POST["submit"]))
{
	if(empty($_POST["name"]))
	{
		$error .='<p><label class="text-danger">Please Enter Your Name</label></p>';

	
	}
	else
	{
		$name=clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .='<p><label class="text-danger">Only Letters and white space</label></p>';
		}

	}
	if(empty($_POST["email"]) )
	{
		$error .='<p><label class="text-danger">Please enter your email</label></p>';
	}
	else
	{
		$email=clean_text($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$error .='<p><label class="text-danger">Invalid  email</label></p>';
		}
	}
	
	if(empty($_POST["message"]) )
	{
		$error .='<p><label class="text-danger">Message is required </label></p>';

	}
	else
	{
		$message=clean_text($_POST["message"]);

	}
	if($error=='')
	{
		$file_open=fopen("contact_data.csv","a");
		$no_rows=count(file("contact_data.csv"));
		if($no_rows>1)
		{
			$no_rows=($no_rows-1)+1;
		}
		$form_data = array(
			'sr_no' =>$no_rows,
			'name'=> $name,
			'email'=>$email,
			'message'=>$message

        );
        fputcsv($file_open,$form_data);
        $error ='<p><label class="text-success">Thank You for your support </label></p>';
        $name='';
        $email='';
        $message='';

	}

}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Contact form
	</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	

</head>
<body>
</body>
	<div class="contact_title">
		<h1>Say Hello</h1>
		<h2>We are always ready to serve you!</h2>
	</div>
	
	<div class="contact-form">
		<form id="contact-form" method="POST">
		<?php echo $error; ?>
		<input name="name" type="text" class="form-control" placeholder="Your Name"
		required value="<?php echo $name;?>"><br>

		<input name="email" type="email" class="form-control" placeholder="Your Email"
		required value="<?php echo $email;?>" ><br>
	
		<textarea name="message" class="form-control" placeholder="Message" row="4" 
		required value="<?php echo $message;?>" ></textarea><br>
		
		<input type="submit" name ="submit" class="form-control submit" value="SEND MESSAGE">
	</form>
	
	</div>
		




</html>
