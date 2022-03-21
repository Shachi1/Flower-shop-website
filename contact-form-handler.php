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
        $error ='<p><label class="text-success">Thank You for your saupport </label></p>';
        $name='';
        $email='';
        $message='';

	}

}
?>