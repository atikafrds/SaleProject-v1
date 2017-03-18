<HTML>
<head>
	<title>
		Sale Project
	</title>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"></link>
	<link type="text/css" rel="stylesheet" href="css/style.css"></link>
</head>
<body>
	<h1><img src="images/sale.png"></img></h1><br>
	<div id="userdata" class="user-logged"></div>
	<ul id="menu">
	</ul><br>
	<div class="title">
		<h2>What are you going to buy today?</h2>
		<hr>
	</div>
	<br>
	<form role="form" action="" enctype="multipart/form-data" id="catalog-form">
		<div class="search-catalog">
			<input type="text" class="search-cat" name="search-cat" id="search-cat" placeholder="Search catalog...">
		</div>
		<div class="inputbutton">
			<input type="button" class="btn" name="search-button" id="search-button" value="GO" onclick="clickme()">
		</div>
		<div class="filter-selector">
			<span>By</span>
			<div class="filter-selector-child">
				<input type="radio" value="product" name="filter-catalog" id="filter-catalog">Product</option>
				<br>
				<input type="radio" name="filter-catalog" id="filter-catalog" value="store">Store</option>
			</div>
		</div>
	</form>
	<div id="catalog-list" class="catalog-list">
	</div>
	<input type="hidden" value="1" id="id_page"></input>
	<script type="text/javascript" src="js/catalog.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</HTML>
