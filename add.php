<HTML>
<HEAD>
	<TITLE>
		Sale Project
	</TITLE>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"></link>
	<link type="text/css" rel="stylesheet" href="css/style.css"></link>
</HEAD>
<BODY>
	<h1><img src="images/sale.png"></img></h1><br>
	<div id="userdata" class="user-logged"></div>
	<ul id="menu"> </ul>
	<br>
	<div class="title">
		<h2>Please add your product here</h2>
		<hr>
	</div>
	<br>
	<div class="catalog-list">
		<form name="add" method="POST" enctype="multipart/form-data" onsubmit="return validateAdd()" action="index.php?action=addProduct">
			
				<div class="errormessage" id="error-productname"></div>
				<label>Name</label>
				<input type="text" name="namaproduk" id="namaproduk" value=""><br><br>
				
				<div class="errormessage" id="error-desc"></div>
				<label>Description (max 200 chars)</label>
				<textarea name="deskripsi" maxlength="200" cols="131" rows="10" id="deskripsi"></textarea><br><br>
				
				<div class="errormessage" id="error-price"> </div>
				<label>Price (IDR)</label>
				<input type="text" name="harga" id="harga" value=""><br><br>
				
				<div class="errormessage" id="image"> </div>
				<label>Photo</label><br>
				<input type="file" name="foto" id="foto" value=""><br><br>
				
				<input type="reset" class="btn" value="CANCEL">
				<input type="submit" class="btn" value="ADD">

		</form>
	</div>
	<input type="hidden" value="3" id="id_page">
	<script type="text/javascript" src="js/init.js"></script>
	<script type="text/javascript" src="js/validation.js"></script>
</BODY>
</HTML>