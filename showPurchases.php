<?php
	session_start();
	include('class/purchases.class.php');
	include('class/login.class.php');
	foreach (Purchases::showPurchases() as $p) {
		echo '<br><br><form role="form" action="" enctype="multipart/form-data" class="market">

		<span class="date-added"><b>' . date("l", strtotime(substr($p["time"], 0, 10))) . ', ' . 
		date("j", strtotime(substr($p["time"], 0, 10))) . ' ' . date("F", strtotime(substr($p["time"], 0, 10))) . ' '
		. date("Y", strtotime(substr($p["time"], 0, 10))) . '</b><br>
		at ' . substr($p["time"], 11, 5) . '</span>
		<hr class="catalog-hr"><br>
		<table class="content">
			<tr>
				<td style="width: 205px"><img class="catalog-img" src="images/' . $p["product_photo"] . '"></img></td>
				<td style="width: 250px">
					<span class="sales-info"><b>' . $p["product_name"] . '</b><br>
					IDR ' . $p["product_price"]*$p["buy_quantity"] . '<br>
					' . $p["buy_quantity"] . ' pcs<br>
					@IDR ' . $p["product_price"] . '</span><br><br><br>
					<span class="product-buyer">bought from <b>' . $p["seller"] . '</b></span>
				</td>
				<td>
					<span class="delivery">Delivery to <b>' . $p["deliv_name"] . '</b><br>' . $p["deliv_address"] .
					'<br>' . $p["postal_code"] . '<br>' . $p["deliv_phone"] . '</span>
				</td>
			</tr>
		</table>
		<br><br><hr></form>';
	}
?>