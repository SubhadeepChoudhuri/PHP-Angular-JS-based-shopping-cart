<?php
session_start();
if(!isset($_SESSION["user_name"])){
 header("Location: login.php");
}
else
{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Shopping Cart using AngularJS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		
		<style>
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}

		.x{
			
			display:inline;
			
		}
		input { 
    text-align: center; 
}
</style>
		</style>
	</head>


<!--<div class="col-sm-offset-2 col-sm-2">
<p class="x" style="font-size:50px;"></p>
<a class="x" href="logout.php" style="font-size:50px;"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
</div>
</div>-->

	<body>
		<div class="container"  ng-app="shoppingCart" ng-controller="shoppingCartController" ng-init="loadProduct(); fetchCart();">
		
		
			<br />
			<h2 align="center">Welcome! &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user_name']; ?>&nbsp;&nbsp;<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></h2>
			<br />
			<h4 class="x">Search</h4> : <input type="text" ng-model="searchText" placeholder="Search product" />
			<form method="post">
				<div class="row">
					<div class="col-md-3" style="margin-top:12px;" ng-repeat = "product in products">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
							<img ng-src="images/{{product.image}}" class="img-responsive" /><br />
							<h4 class="text-info">{{product.name}}</h4>
							<h4 class="text-danger">${{product.price}}</h4>
							
	


	<!--<input type='button' value='-' class='qtyminus' field='quantity' ng-click='getCountMinus()'/>
    <input type='text' name='quantity' value='{{count}}' class='qty'/>
    <input type='button' value='+' class='qtyplus' field='quantity' ng-click='getCountPlus()'/>-->
	

	
	
	

	  <!--  <div ng-init="counter = 0"></div>
    <button ng-click="counter = counter + 1">+</button>
    <button ng-click="counter = counter - 1">-</button>
    {{counter}}-->
							<input type="button" name="add_to_cart" style="margin-top:5px;" class="btn btn-success form-control" value="Add to Cart" ng-click="addtoCart(product)" />
						</div>
					</div>
				</div>
			</form>
			<br />
			<h3 align="center">Your Cart Details</h3>
			<div class="table-responsive" id="order_table">
				<table class="table table-bordered table-striped">
					<tr>  
						<th width="40%">Product Name</th>  
						<th width="10%">Quantity</th>  
						<th width="20%">Price</th>  
						<th width="15%">Total</th>  
						<th width="5%">Action</th>  
					</tr>
					<tr ng-repeat = "cart in carts | filter:searchText">
						<td>{{cart.product_name}}</td>
						<td>{{cart.product_quantity}}</td>
						<td>${{cart.product_price}}</td>
						<td>${{cart.product_quantity * cart.product_price}}</td>
						<td><button type="button" name="remove_product" class="btn btn-danger btn-xs" ng-click="removeItem(cart.product_id)">Remove</button></td>
					</tr>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td colspan="2">${{ setTotals() }}</td>
					</tr>
				</table>
			</div>
		</div>
		</div>
	</body>
</html>

<script>




var app = angular.module('shoppingCart', []);

app.controller('shoppingCartController', function($scope, $http){
	
	$scope.loadProduct = function(){
		$http.get('fetch.php').success(function(data){
            $scope.products = data;
        })
	};
	
	$scope.carts = [];
	
	$scope.fetchCart = function(){
		$http.get('fetch_cart.php').success(function(data){
            $scope.carts = data;
        })
	};
	
	$scope.setTotals = function(){
		var total = 0;
		for(var count = 0; count<$scope.carts.length; count++)
		{
			var item = $scope.carts[count];
			total = total + (item.product_quantity * item.product_price);
		}
		return total;
	};
	
	$scope.addtoCart = function(product){
		$http({
            method:"POST",
            url:"add_item.php",
            data:product
        }).success(function(data){
			$scope.fetchCart();
        });
	};
	
	$scope.removeItem = function(id){
		$http({
            method:"POST",
            url:"remove_item.php",
            data:id
        }).success(function(data){
			$scope.fetchCart();
        });
	};
	
	 
	 
  
	
 });




</script>

<body>
</body>
</html>
<?php
}
?>