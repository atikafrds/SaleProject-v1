<?php
	session_start();
	include('class/catalog.class.php');
	$id = $_GET['id_product'];
	foreach(catalog::getProduct($id) as $r) {
		$product = $r;
	}
	echo '<form name="edit" role="form" method="POST" action="index.php?action=confirmEdit" onsubmit="return validateEdit()" enctype="multipart/form-data">
		  
		  	<div class="errormessage" id="error-productname"></div>
			<label>Name</label>
			<input type="text" value="'.$product['name'].'" id="namaproduk" name="namaproduk"><br><br>
		  
		  	<div class="errormessage" id="error-desc"></div>
			<label>Description (max 200 chars)</label>
			<textarea name="deskripsi" maxlength="200" cols="131" rows="10" id="deskripsi">'.$product['description'].'</textarea><br><br>
			
		  	<div class="errormessage" id="error-price"></div>
			<label>Price (IDR)</label>
			<input type="text" name="harga" id="harga" value="'.$product['price'].'"><br><br>

			<label>Photo</label>
			<div class="fileinputs">
				<div class="fakefile">
					<img src="images/choose.png"></img>
					<input style="border:none;" value="'.$product['photo'].'"/>
				</div>
				<input type="file" class="file" disabled>
			</div>
			<br><br>
		  	<input type="hidden" name="id_product" value="'.$id.'">
			<input type="reset" class="btn" value="CANCEL">
			<input type="submit" class="btn" value="UPDATE">
		  </form>';
?>