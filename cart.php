<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js"></script>
	<title>Flower Delivery Website</title>
    <link rel="stylesheet"  href="style.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <title>Cart</title>
</head>
<body>
	<?php
	include ("header.php");
	?>



<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
		<div style="display:<?php if(isset($_SESSION['showAlert'])){echo 
		$_SESSION['showAlert'];}
	else
	{echo 'none';}
	unset($_SESSION['showAlert']);
	?>" class="alert alert-success alert-dismissible mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php if(isset($_SESSION['message'])){echo 
		$_SESSION['message'];}
		unset($_SESSION['message ']);		?></strong> 
</div>
			<div class="table-responsive mt-2">
				<table class="table table-bodered table-striped text-center">
					<thead>
						<tr>
						<td colspan="7">
							<h4 class="text-center text-info m-0">Products You Desire to Buy</h4>
							
						</td>
					</tr>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>
							<a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are You Sure?');">Clear Cart</a>
						</th>


					</tr>
					</thead>
					<tbody>
						<?php
						require 'config.php';
						$stmt=$conn->prepare("SELECT * FROM cart");
						$stmt->execute();
						$result=$stmt->get_result();
						$grand_total = 0;
						while($row=$result->fetch_assoc()):


						?>
						<tr>
							<td><?= $row['id'] ?></td>
							<input type="hidden" class="pid" value="<?= $row['id'] ?>">
							<td><?= $row['product_name'] ?></td>
							<td><img src="<?= $row['product_image'] ?>" width="50"></td>
							<td>$<?= number_format($row['product_price'],2); ?></td>
							<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
							<td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
							<td>$<?= number_format($row['total_price'],2);?></td>
							<td>
								<a href="action.php?remove=<?= $row['id']?>" class="text-danger lead" 
								onclick="return confirm('Are you sure you dont want that?');">
								<i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php $grand_total +=$row['total_price'];?>
					<?php endwhile; ?>
					<tr>
						<td colspan="3">
						<a href="cartsystem.php" class="btn btn-success"><i class="fa fa-cart-plus">
						</i>&nbsp;&nbsp;Continue Shopping</a>
						</td>
						<td colspan="2"><b>Grand Total</b>
						
						
						</td>
						<td><b>$<?=number_format($grand_total,2);?>
						</b></td>
						<td>
						<a href="checkout.php" class="btn btn-info <?= ($grand_total>1
						)?"":"disabled";?>"><i class="fa fa-credit-card">
						</i>&nbsp;&nbsp;Checkout</a>
						</td>
					</tr>
					</tbody>
				</table>
				
			</div>
			
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
		
		$(".itemQty").on('change',function(){
			var $el=$(this).closest('tr');
			var pid= $el.find(".pid").val();
			var pprice= $el.find(".pprice").val();
			var qty= $el.find(".itemQty").val();
			location.reload(true);
			
			$.ajax({
				url:'action.php',
				method: 'post',
				cache: false,
				data: {qty:qty,pid:pid,pprice:pprice},
				success: function(response){
					
					console.log(response);
				}
			});
		});
		load_cart_item_number();
		
	});

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
	




	
</script>




</body>
</html>