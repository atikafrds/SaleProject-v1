<?php
	session_start();
	include('class/catalog.class.php');
	$id_product = $_GET['id_product'];
	$user_id = $_GET['user_active'];
	$user = array();
	$product = array();
	foreach(catalog::confirmProduct($id_product) as $r) {
		$product = $r;
	}
	foreach(catalog::confirmUser($user_id) as $r) {
		$user = $r;
	}
	echo '<form role="form" method="POST" action="index.php?action=confirm" onsubmit="return confirmed()" enctype="multipart/form-data">
			<input type="hidden" value="'.$product['id'].'" id="product-id" name="product-id">
			<input type="hidden" value="'.$product['id_user'].'" id="product-id_user" name="product-id_user">
			<span id="buy-data"><span>Product	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$product['name'].'</span><br>
			<span>Price		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: IDR </span>
			<span>'.number_format($product['price'], 0, ".", ".").'</span><br>
			<input type="hidden" id="price" value="'.$product['price'].'">
			<span>Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
			<input type="text" name="quantity" style="width:10%;" class="quantity-input" id="quantity" value="1" placeholder="" oninput="calculateTotal()"> pcs </span><br>
			<span>Total Price &nbsp;&nbsp;&nbsp;&nbsp;: IDR </span><span  id="calculate-total-price">'.number_format($product['price'], 0, ".", ".").'</span></br>
			<input type="hidden" id="total" name="total" value="'.$product['price'].'">
			<span>Delivery to	&nbsp;&nbsp;&nbsp;: </span></span><br><br>
			
			<div class="errormessage" id="inputnamelog"></div>
			<label>Consignee</label>
			<input type="text" name="consigne" id="consigne" class="form-control"value="'.$user['name'].'"><br><br>
			
			<div class="errormessage" id="inputaddresslog"></div>
			<label>Full Address</label>
			<input type="text" name="address" id="address" class="form-control" value="'.$user['address'].'"><br><br>
			
			<div class="errormessage" id="inputpostlog"></div>
			<label>Postal code</label>
			<input type="text" name="postal" id="postal" class="form-control" value="'.$user['postal'].'"><br><br>
			
			<div class="errormessage" id="inputphonelog"></div>
			<label>Phone number</label>
			<input type="text" name="phone" id="phone" class="form-control" value="'.$user['phone'].'"><br><br>
			
			<div class="errormessage" id="err-credit-card"></div>
			<label>12 digits credit card number</label>
			<input type="text" name="credit-card" id="credit-card" class="form-control" value=""><br><br>
			
			<div class="errormessage" id="err-verf-num"></div>
			<label>3 digits card verification value</label>
			<input type="text" name="verf" id="verf" class="form-control"><br><br>
			
			<input class="btn" type="button" onclick="cancel()" value="CANCEL">
			<input onclick="confirmed()" class= "btn" type="submit" value="CONFIRM">
			<br><br><br>
			</form>';
?>