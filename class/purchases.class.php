<?php
	if (!class_exists('Purchases')) {
		include('connect.class.php');
		class Purchases {
			//menampilkan sales
			public static function showPurchases() {
				$buyer = $_SESSION['username'];
				$query = "SELECT c.name as product_name, c.price as product_price, t.quantity as buy_quantity,
				t.uname_seller as seller, t.name as deliv_name, t.timestamp as time, t.address as deliv_address, t.postal as postal_code,
				t.phone as deliv_phone,	c.photo as product_photo FROM transaction as t, catalog as c, users as u
				WHERE t.id_product=c.id AND t.uname_buyer='$buyer' AND u.id=c.id_user";
				$res = mysqli_query(Connect::connectdb(), $query);
				return $res;
			}
		}
	}
?>