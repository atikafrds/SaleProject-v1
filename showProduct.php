<?php
	session_start();
	include('class/catalog.class.php');
	include('class/login.class.php');
	foreach (Catalog::showProduct() as $r) {
		echo '<br><br><form role="form" action="" enctype="multipart/form-data" class="market">
		
		<span class="date-added"><b>'.date("l", strtotime(substr($r["timestamp"], 0, 10))).', 
		'.date("j", strtotime(substr($r["timestamp"], 0, 10))).' '.date("F", strtotime(substr($r["timestamp"], 0, 10))).' 
		'.date("Y", strtotime(substr($r["timestamp"], 0, 10))).'</b><br>
		at '.substr($r["timestamp"], 11, 5).'</span>
		
		<hr class="catalog-hr">
		<br>
		<img class="catalog-img" src="images/'.$r['photo'].'"></img>
		<span class="product-name"><b>'.$r["name"].'</b></span><br><br>
		<span class="product-cost">IDR '.number_format($r["price"], 0,".", ".").'</span>
		<span class="catalog-likes-2" id="catalog-likes'.$r["id"].'">'.$r["liked"].' like</span><br><br>
		<span class="product-desc">'.$r["description"].'</span>
		<span class="catalog-purchase-2">'.$r["quantity"].' purchase</span><br><br>
		<span class="delete"><a href="javasricpt:void(0)" id="delete" name="delete'.$r['id'].'" onclick="return deleteItem(this.name)"><b>DELETE</b> </a></span>
		<span class="edit"><a href="index.php?action=edit&id_product='.$r['id'].'&user_active='.$_SESSION['username'].'" name="edit"><b>EDIT</b></a></span><br><br>
		<input type="hidden" id="delete'.$r['id'].'" value="'.$r['id'].'"><br><br><hr></form>
		';		
	}
?>