<html>
<head>
        <title> User Login And Registration </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/bootstrap.min.css">
 
<style>

.backimage  {
    background-image: url("image/loginBack.jpg");
    background-position: center;
    background-size: cover;
	height:100%;
}

</style>   

</head>

<body>

<?php
include ("header.php");
?>
	<div class="backimage">
        <div style= "float:right;margin-right: 300px;width: 40%">
			<h2 class="text-center"></br></br></h2>
            <h1 class="font-weight-bold text-center"><i>Send flower, spread happiness</i></h1></br>
				<div class="container">
				<div class="login-box">
				<div class="row">
				<div class="col-md-12 login-left"  style= "background-color:#bd90fc">
					<h2> Login Here </h2>
					<form action="validation.php" method="post">
					  <div class="form-group">
						<label>Username</label>
						<input type="text" name="user" class="form-control" required>  
						</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>  
						</div>
						<button type="submit" class="btn btn-primary"> Log In </button>
					</form>
				</div>
				</div>
			   </div> 
			</div> 
			</br></br></br>
			<div class="container">
				<div class="login-box">
				<div class="row">
				<div class="col-md-12 login-left"  style= "background-color:#bd90fc">
					<h2> Register Here </h2>
					<form action="registration.php" method="post">
					  <div class="form-group">
						<label>Usename</label>
						<input type="text" name="user" class="form-control" required>  
						</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>  
						</div>
						<button type="submit" class="btn btn-primary"> Register </button>
					</form>
				</div>
				</div>
			   </div> 
			</div> 
		</div>
    </div>
   
   
</body>
</html>