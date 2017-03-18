<?php
	if (!class_exists('Catalog')) {
		include('connect.class.php');
		class Catalog {
			//mengembalikan barang-barang yang telah disukai user
			public static function liked() {
				if (isset($_SESSION['username'])) {
					$username = $_SESSION['username'];
					$query = "SELECT likes FROM users WHERE username='$username'";
					$res = mysqli_query(Connect::connectdb(), $query);
					$result = mysqli_fetch_assoc($res);
					$finddotcomma = 0;
					$nextdotcomma = strpos($result['likes'], ';', $finddotcomma+1);//cari ';' yang selanjutnya
					$liked = array(substr($result['likes'], $finddotcomma+1, $nextdotcomma-$finddotcomma-1));
					$finddotcomma = $nextdotcomma;
					while ($finddotcomma < strlen($result['likes'])) {
						if ($finddotcomma+1<strlen($result['likes'])) {
							$nextdotcomma = strpos($result['likes'], ';', $finddotcomma+1);
							array_push($liked,substr($result['likes'], $finddotcomma+1, $nextdotcomma-$finddotcomma-1));//masukkan nilai yang merupakan id barang ke dalam array
							$finddotcomma = $nextdotcomma;
						}
						else break;
					}
					return $liked;
				}
			}
			
			//menambahkan daftar barang yang disukai user
			public static function like($id) {
				session_start();
				$liked = self::liked();
				array_push($liked, $id);
				$strlike = ';'.implode(";", $liked).';';
				$username = $_SESSION['username'];
				$update_user_like = "UPDATE users SET likes = '$strlike' WHERE username = '$username'";
				$res = mysqli_query(Connect::connectdb(), $update_user_like);
				$select_product_like = "SELECT liked FROM catalog WHERE id ='$id'";
				$res = mysqli_query(Connect::connectdb(), $select_product_like);
				$res = mysqli_fetch_assoc($res);
				$number_of_like = $res['liked'] + 1;
				$update_product_like = "UPDATE catalog SET liked = '$number_of_like' WHERE id = '$id'";
				$res = mysqli_query(Connect::connectdb(), $update_product_like);
				echo $number_of_like;
			}
			
			//mengurangi daftar barang yang disukai user
			public static function unlike($id) {
				session_start();
				$liked = self::liked();
				$liked = array_diff($liked, [$id]);
				$stliked = ';'.implode(";", $liked).';';
				$username = $_SESSION['username'];
				$update_user_like = "UPDATE users SET likes = '$stliked' WHERE username = '$username'";
				$res = mysqli_query(Connect::connectdb(), $update_user_like);
				$select_product_like = "SELECT liked FROM catalog WHERE id ='$id'";
				$res = mysqli_query(Connect::connectdb(), $select_product_like);
				$res = mysqli_fetch_assoc($res);
				$number_of_like = $res['liked'] - 1;
				$update_product_like = "UPDATE catalog SET liked = '$number_of_like' WHERE id = '$id'";
				$res = mysqli_query(Connect::connectdb(), $update_product_like);
				echo $number_of_like;
			}
			
			//menampilkan catalog
			public static function showCatalog ($name, $filter) {
				$query = "SELECT c.name as pname, c.id, quantity, description, price, liked, timestamp, u.name as uname, photo 
					FROM catalog as c INNER JOIN users as u ";
				if ($filter=='product') {
					$query.="WHERE c.name LIKE '%{$name}%' AND id_user=u.id ORDER BY timestamp DESC";
				}
				else {
					$query.="WHERE u.name LIKE '%{$name}%' AND id_user=u.id ORDER BY timestamp DESC";
				}
				$res = mysqli_query(Connect::connectdb(), $query);
				//$row = mysqli_fetch_array($res);
				return $res;
			}
			
			//konfirmasi
			public static function confirmUser($user_id) {
				$query = "SELECT * FROM users WHERE id ='$user_id'";
				$user =  mysqli_query(Connect::connectdb(), $query);
				return $user;
			}
			
			public static function confirmProduct($product_id) {
				$query = "SELECT name, price, id, id_user FROM catalog WHERE id ='$product_id'";
				$product = mysqli_query(Connect::connectdb(), $query);
				return $product;
			}
			
			//puchase
			public static function purchasing() {
				session_start();
				$pid = $_POST['product-id']; 
				$quantity = $_POST['quantity']; 
				$consigne = $_POST['consigne'];
				$addr = $_POST['address'];
				$postal = $_POST['postal'];
				$phone = $_POST['phone'];
				$credit = $_POST['credit-card'];
				$verf = $_POST['verf'];
				$pid_user = $_POST['product-id_user'];
				$date = date("Y-m-d H:i:s");
				$buyer = $_SESSION['username'];
				$query = "SELECT id FROM users WHERE username='$buyer'";
				$res = mysqli_query(Connect::connectdb(), $query);
				$val_id = "";
				foreach($res as $r) {
					$val_id = $r['id'];
				}
				$query = "SELECT username FROM users as u, catalog as c WHERE c.id_user = '$pid_user' AND u.id = c.id_user AND c.id = '$pid'";
				$res = mysqli_query(Connect::connectdb(), $query);
				$val_seller_name = "";
				foreach($res as $r) $val_seller_name = $r['username'];
				$query = "INSERT INTO transaction (id_seller, id_buyer, id_product, quantity, name, address, postal, 
				phone, cc_number, verif_value, timestamp, uname_seller, uname_buyer) 
				VALUES ('$pid_user', '$val_id', '$pid', '$quantity', '$consigne', '$addr', '$postal', '$phone', 
				'$credit', '$verf', '$date', '$val_seller_name', '$buyer')";
				$res = mysqli_query(Connect::connectdb(), $query);
				$query = "UPDATE catalog SET quantity = quantity + '$quantity' WHERE id = $pid";
				$res = mysqli_query(Connect::connectdb(), $query);
				header('Location: catalog.php');
			}
			
			//show product
			public static function showProduct(){
				$username = $_SESSION['username'];
				$query = "SELECT * FROM catalog WHERE id_user=(SELECT id FROM users WHERE username='$username');";
				$res = mysqli_query(Connect::connectdb(), $query);
				return $res;
			}
		//add product
			public static function addProduct(){
				session_start();
				$nama = $_POST['namaproduk'];
				$desc = $_POST['deskripsi'];
				$harga = $_POST['harga'];
				$foto = $_FILES['foto']['name'];;
				
		
					//var_dump($_POST);
					$target_dir = 'images/';
					//$target_file = $target_dir.basename($_FILES["foto"]["name"]);
					$tmp_name = $_FILES['foto']['tmp_name'];
					$namefile = $_FILES['foto']['name'];
					move_uploaded_file($tmp_name,$target_dir.$namefile);
				
				
				$date = date("Y-m-d H:i:s");
				//cari id
				$username = $_SESSION['username'];
				$id = mysqli_query(Connect::connectdb(), "SELECT id from users where username='$username';");
				foreach ($id as $id) $id = $id['id'];
				$query = "INSERT INTO catalog(name,price,description,liked,timestamp,quantity,photo,id_user) VALUES ('$nama','$harga','$desc',0,'$date',0,'$foto','$id');";
				$res = mysqli_query(Connect::connectdb(),$query); //add
				return $res;
			}
			
			//edit product
			public static function getProduct($product_id) {
				$query = "SELECT * FROM catalog WHERE id ='$product_id'";
				$product = mysqli_query(Connect::connectdb(), $query);
				return $product;
			}
			//confirm edit
			public static function confirmEdit() {
				$nama = $_POST['namaproduk'];
				$desc = $_POST['deskripsi'];
				$harga = $_POST['harga'];
				$id_product = $_POST['id_product'];
				
				//cari id
				session_start();
				$username = $_SESSION['username'];
				$id = mysqli_query(Connect::connectdb(), "SELECT id from users where username='$username';");
				foreach ($id as $id) $id = $id['id'];
				$query = "UPDATE catalog SET name = '$nama', description='$desc', price = '$harga' WHERE id = '$id_product'";
				$res = mysqli_query(Connect::connectdb(),$query); //edit
				return $res;
			}

			//delete product
			public function delete() {
				$id_product = $_GET['id_product'];
				$query = "DELETE FROM catalog WHERE id = '$id_product'";
				$res = mysqli_query(Connect::connectdb(), $query);
				return $res;
			}
		}
	}
?>