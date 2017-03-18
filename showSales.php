<?php
	session_start();
	include('class/sales.class.php');
	include('class/login.class.php');
	foreach (Sales::showSales() as $s) {
		echo '<br><br><form role="form" action="" enctype="multipart/form-data" class="market">

		<span class="date-added"><b>' . date("l", strtotime(substr($s["time"], 0, 10))) . ', ' . 
		date("j", strtotime(substr($s["time"], 0, 10))) . ' ' . date("F", strtotime(substr($s["time"], 0, 10))) . ' '
		. date("Y", strtotime(substr($s["time"], 0, 10))) . '</b><br>
		at ' . substr($s["time"], 11, 5) . '</span>
		<hr class="catalog-hr"><br>
		<table class="content">
			<tr>
				<td style="width: 205px"><img class="catalog-img" src="images/' . $s["product_photo"] . '"></img></td>
				<td style="width: 250px">
					<span class="sales-info"><b>' . $s["product_name"] . '</b><br>
					IDR ' . $s["product_price"]*$s["buy_quantity"] . '<br>
					' . $s["buy_quantity"] . ' pcs<br>
					@IDR ' . $s["product_price"] . '</span><br><br><br>
					<span class="product-buyer">bought by <b>' . $s["buyer"] . '</b></span>
				</td>
				<td>
					<span class="delivery">Delivery to <b>' . $s["deliv_name"] . '</b><br>' . $s["deliv_address"] .
					'<br>' . $s["postal_code"] . '<br>' . $s["deliv_phone"] . '</span>
				</td>
			</tr>
		</table>
		<br><br><hr></form>';
	}
?>