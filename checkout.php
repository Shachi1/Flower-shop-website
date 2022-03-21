<?php
require 'config.php';
$grand_total = 0;
$allItem= '';
$items = array();


$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty,total_price FROM cart";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
	$grand_total +=$row['total_price'];
	$items[] = $row['ItemQty'];
}
$allItem = implode(", ",$items); 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js"></script>
	<title>Flower shopping online </title>
    <link rel="stylesheet"  href="style.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <title>Checkout</title>
</head>
<body>
<?php
include("header.php");
?>



<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4" id="order">
			<h4 class="text-center text-info p-2">Complete your order</h4>
			<div class="jumbotron p-3 mb-2 text-center">
				<h6 class="lead"><b>Product(s): </b><?= $allItem; ?></h6>
				<h6 class="lead"><b>Delivery Charge: </b>Free</h6>
				<h5><b>Total Amount Payable : </b>$<?=  number_format($grand_total,2) ?></h5>
			</div>
			<form action="" method="post" id="placeOrder">
				<input type="hidden" name="products" value="<?= $allItem; ?>">
				<input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
					
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
					
				</div>
				<div class="form-group">
					<input type="tel" name="phone" class="form-control" placeholder="Enter Number" required>
					
				</div>
				<div class="form-group">
					<textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here....."></textarea>
				</div>
				<h6 class="text-center lead">
					Select Payment Mode
				</h6>
				<div class="form-group">
					<select name="pmode" class="form-control">
						<option value="" selected disabled>
							-Select payment Mode-
						</option>
						<option value="cod">Cash On Delivery</option>
						<option value="netbanking">Online Bankling</option>
						<option value="cards">Debit/Credit Card</option>

					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" >
					
				</div>


			</form>
			
		</div>
		
	</div>
	
</div>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#placeOrder").submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'action.php',
				method:'post',
				data:$('form').serialize()+"&action=order",
				success:function(response){
					$("#order").html(response);
				}

			});

		});
	
					

				

		
		load_cart_item_number();

		function load_cart_item_number(){
			$.ajax({
				url:'action.php',
				method:'get',
				data:{cartItem:"cart_item"},
				success:function(response){
					$("#cart-item").html(response);
				}
			});

				
			
		}




	});
</script>





</body>
</html>