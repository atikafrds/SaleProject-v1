<?php
	session_start();
	include('class/catalog.class.php');
	include('class/login.class.php');
	$search='';
	$name=""; $filter="product";
	$username = "";
	$user_id="";
	$set_like="LIKE";
	if (isset($_GET['name']) or isset($_GET['filter'])) {
		$name = $_GET['name'];
		$filter = $_GET['filter'];
	}
	foreach (Catalog::showCatalog($name,$filter) as $r) {
		$color="rgb(74, 134, 232)";
		$liked="n";
		if (isset($_SESSION['username'])) {
			if (in_array($r['id'], Catalog::liked())) {
				$color="rgb(152, 0, 0)";
				$liked="y";
				$set_like = "LIKED";
			}
			else $set_like = "LIKE";
			$user_id = users::getInfoUser()['id'];
		}
		echo '<br><br><form role="form" action="" enctype="multipart/form-data"><span class="market"><b>'.$r["uname"].'</b></span>
		<br>
		<span class="date-added">added this on '.date("l", strtotime(substr($r["timestamp"], 0, 10))).', 
		'.date("j", strtotime(substr($r["timestamp"], 0, 10))).' '.date("F", strtotime(substr($r["timestamp"], 0, 10))).' 
		'.date("Y", strtotime(substr($r["timestamp"], 0, 10))).', 
		at '.substr($r["timestamp"], 11, 5).'</span>
		<hr class="catalog-hr">
		<br>
		<img class="catalog-img" src="images/'.$r['photo'].'"></img>
		<span class="product-name"><b>'.$r["pname"].'</b></span><br><br>
		<span class="product-cost">IDR '.number_format($r["price"], 0,".", ".").'</span>
		<span class="catalog-likes" id="catalog-likes'.$r["id"].'">'.$r["liked"].' like</span><br><br>
		<span class="product-desc">'.$r["description"].'</span>
		<span class="catalog-purchase">'.$r["quantity"].' purchase</span><br><br>
		<span class="buy-catalog"><a href="index.php?action=buy&id_product='.$r['id'].'&user_active='.$user_id.'" name="buy"><b>BUY</b></a></span>
		<span class="like-catalog"><a href="javascript:void(0)" onclick="liked(this.name)" name="click-like'.$r['id'].'-'.$liked.'"
		id="click-like'.$r['id'].'-a" style="color:'.$color.';" href=""><b>'.$set_like.'</b></a></span><br><br><br><hr>
		<input id="click-like'.$r['id'].'-'.$liked.'" type="hidden" value="'.$r['id'].'"></form>';
	}
?>