<html>
<head>
        <title> User Login And Registration </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
 
   

</head>

<body>
<?php
include ("header.php");
?>

   
<div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-12 login-left">
        <h1> Login  </h1>
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
</body>
</html>