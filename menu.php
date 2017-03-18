<?php
	session_start();
	include('class/login.class.php');
	if(users::logged()) {
		echo '
		<table>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<thead>
				<th id="1"><a href="catalog.php?id_active='.users::getInfoUser()['id'].'"><span id="span1">Catalog</span></a></th>
				<th id="2"><a href="product.php?id_active='.users::getInfoUser()['id'].'"><span id="span2">Your Products</span></a></th>
				<th id="3"><a href="add.php?id_active='.users::getInfoUser()['id'].'"><span id="span3">Add Product</span></a></th>
				<th id="4"><a href="sales.php?id_active='.users::getInfoUser()['id'].'"><span id="span4">Sales</span></a></th>
				<th id="5"><a href="purchases.php?id_active='.users::getInfoUser()['id'].'"><span id="span5">Purchases</span></a></th>
			</thead>
		</table>';
	}
	else {
		echo '<table>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<thead>
				<th id="1"><a href="catalog.php"><span id="span1">Catalog</span></a></th>
				<th id="2"><a href="product.php"><span id="span2">Your Products</span></a></th>
				<th id="3"><a href="add.php"><span id="span3">Add Product</span></a></th>
				<th id="4"><a href="sales.php"><span id="span4">Sales</span></a></th>
				<th id="5"><a href="purchase.php"><span id="span5">Purchases</span></a></th>
			</thead>
		</table>';
	}
?>