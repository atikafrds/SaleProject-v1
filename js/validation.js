function validateForm (){
	document.getElementById("inputunamelog").innerHTML="Username minimal 3 karakter<br>";
	document.getElementById("inputunamelog").style.color="red";
	document.getElementById("inputunamelog").style.display="none";
	document.getElementById("username1").style.borderColor="#ccc";
	var x = document.forms["register"]["username"].value;
	var ok = "true";
	if (x==null || x=="" || x.length<3) {
		document.getElementById("inputunamelog").style.display="initial";
		document.getElementById("username1").style.borderColor="red";
		ok = "false";
	}
	
	document.getElementById("inputnamelog").innerHTML="Nama tidak boleh kosong<br>";
	document.getElementById("inputnamelog").style.color="red";
	document.getElementById("inputnamelog").style.display="none";
	document.getElementById("name").style.borderColor="#ccc";
	x = document.forms["register"]["name"].value;
	if (x==null || x=="") {
		document.getElementById("inputnamelog").style.display="initial";
		document.getElementById("name").style.borderColor="red";
		ok = "false";
	}
	
	document.getElementById("inputemaillog").innerHTML="Email tidak valid<br>";
	document.getElementById("inputemaillog").style.color="red";
	document.getElementById("inputemaillog").style.display="none";
	document.getElementById("email").style.borderColor="#ccc";
	x = document.forms["register"]["email"].value;
	var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("inputemaillog").style.display="initial";
		document.getElementById("email").style.borderColor="red";
        ok = "false";
    }
	
	document.getElementById("inputpass").innerHTML="Password minimal 6 karakter<br>";
	document.getElementById("inputpass").style.color="red";
	document.getElementById("inputpass").style.display="none";
	document.getElementById("password1").style.borderColor="#ccc";
	x = document.forms["register"]["password"].value;
	if (x.length < 6) {
		document.getElementById("inputpass").style.display = "initial";
		document.getElementById("password1").style.borderColor="red";
		ok = "false";
	}

	document.getElementById("inputpasslog").innerHTML="Password tidak cocok<br>";
	document.getElementById("inputpasslog").style.color="red";
	document.getElementById("inputpasslog").style.display="none";
	document.getElementById("email").style.borderColor="#ccc";	
	var y = document.forms["register"]["confirm-password"].value;
	if (x!==y) {
		document.getElementById("inputpasslog").style.display = "initial";
		document.getElementById("confirm-password").style.borderColor="red";
		ok = "false";
	}

	document.getElementById("inputaddresslog").innerHTML="Alamat tidak boleh kosong<br>";
	document.getElementById("inputaddresslog").style.color="red";
	document.getElementById("inputaddresslog").style.display="none";
	document.getElementById("address").style.borderColor="#ccc";	
	x = document.forms["register"]["address"].value;
	if (x==null || x=="") {
		document.getElementById("inputaddresslog").style.display="initial";
		document.getElementById("address").style.borderColor="red";
		ok = "false";
	}

	document.getElementById("inputpostlog").innerHTML="Kode pos tidak boleh kosong<br>";
	document.getElementById("inputpostlog").style.color="red";
	document.getElementById("inputpostlog").style.display="none";
	document.getElementById("postal").style.borderColor="#ccc";	
	x = document.forms["register"]["postal"].value;
	if (x==null || x=="") {
		document.getElementById("inputpostlog").style.display="initial";
		document.getElementById("postal").style.borderColor="red";
		ok = "false";
	} else {
		document.getElementById("inputpostlog").innerHTML="Harus berupa angka<br>";
		document.getElementById("inputpostlog").style.color="red";
		document.getElementById("inputpostlog").style.display="none";
		document.getElementById("postal").style.borderColor="#ccc";
		if (isNaN(x)) {
			document.getElementById("inputpostlog").style.display="initial";
			document.getElementById("postal").style.borderColor="red";
			ok = "false";
		}
	}
	
	document.getElementById("inputphonelog").innerHTML="Nomor telepon tidak boleh kosong<br>";
	document.getElementById("inputphonelog").style.color="red";
	document.getElementById("inputphonelog").style.display="none";
	document.getElementById("phone").style.borderColor="#ccc";
	x = document.forms["register"]["phone"].value;
	if (x==null || x=="") {
		document.getElementById("inputphonelog").style.display="initial";
		document.getElementById("phone").style.borderColor="red";
		ok = "false";
	} else {
		document.getElementById("inputphonelog").innerHTML="Harus berupa angka<br>";
		document.getElementById("inputphonelog").style.color="red";
		document.getElementById("inputphonelog").style.display="none";
		document.getElementById("phone").style.borderColor="#ccc";
		if (isNaN(x)) {
			document.getElementById("inputphonelog").style.display="initial";
			document.getElementById("phone").style.borderColor="red";
			ok = "false";
		}
	}
	
	if (ok == "false") return false;
}

function validateLogin () {
	document.getElementById("inputunamelog").innerHTML="Wajib diisi<br>";
	document.getElementById("inputunamelog").style.color="red";
	document.getElementById("inputunamelog").style.display="none";
	document.getElementById("username").style.borderColor="#ccc";
	var x = document.forms["login"]["username"].value;
	var ok = "true";
	if (x==null || x=="" || x.length<3) {
		document.getElementById("inputunamelog").style.display="initial";
		document.getElementById("username").style.borderColor="red";
		ok = "false";
	}
	
	document.getElementById("inputpasslog").innerHTML="Wajib diisi<br>";
	document.getElementById("inputpasslog").style.color="red";
	document.getElementById("inputpasslog").style.display="none";
	document.getElementById("password").style.borderColor="#ccc";
	x = document.forms["login"]["password"].value;
	if (x==null || x=="") {
		document.getElementById("inputpasslog").style.display="initial";
		document.getElementById("password").style.borderColor="red";
		ok = "false";
	}
	
	if (ok=="false") return false;
}

function validateAdd (){
	var x = document.forms["add"]["namaproduk"].value;
	var valid = "true";
	document.getElementById("error-productname").innerHTML="Nama tidak boleh kosong<br>";
	document.getElementById("error-productname").style.color="red";
	document.getElementById("error-productname").style.display="none";
	document.getElementById("namaproduk").style.borderColor="#ccc";
	if(x==null || x==""){
		document.getElementById("error-productname").style.display="initial";
		document.getElementById("namaproduk").style.borderColor="red";
		valid="false";
	}
	
	
	x = document.getElementById("deskripsi").value;
	document.getElementById("error-desc").innerHTML="Deskripsi harus kurang dari sama dengan 200 karakter<br>";
	document.getElementById("error-desc").style.color="red";
	document.getElementById("error-desc").style.display="none";
	document.getElementById("deskripsi").style.borderColor="#ccc";
	if(x.length>200){
		document.getElementById("error-desc").style.display="initial";
		document.getElementById("deskripsi").style.borderColor="red";
		valid = "false";
	}
	
	x = document.getElementById("harga").value;
	document.getElementById("error-price").innerHTML="Harga tidak boleh kosong<br>";
	document.getElementById("error-price").style.color="red";
	document.getElementById("error-price").style.display="none";
	document.getElementById("harga").style.borderColor="#ccc";
	if(x==null || x==""){
		document.getElementById("error-price").style.display="initial";
		document.getElementById("harga").style.borderColor="red";
		valid="false";
	}else{
	
		document.getElementById("error-price").innerHTML="Harus berupa angka<br>";
		document.getElementById("error-price").style.color="red";
		document.getElementById("error-price").style.display="none";
		document.getElementById("harga").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("error-price").style.display="initial";
			document.getElementById("harga").style.borderColor="red";
			valid="false";
		}
	}

	x = document.getElementById("foto").value;
	document.getElementById("image").innerHTML="Gambar produk harus ada<br>";
	document.getElementById("image").style.color="red";
	document.getElementById("image").style.display="none";
	if(x==null || x==""){
		document.getElementById("image").style.display="initial";
		valid="false";
	}
	
	
	if(valid=="false") {
		return false;
	}
}

function validateEdit(){
	var x = document.getElementById("namaproduk").value;
	var valid = "true";
	document.getElementById("error-productname").innerHTML="Nama tidak boleh kosong<br>";
	document.getElementById("error-productname").style.color="red";
	document.getElementById("error-productname").style.display="none";
	document.getElementById("namaproduk").style.borderColor="#ccc";
	if(x==null || x==""){
		document.getElementById("error-productname").style.display="initial";
		document.getElementById("namaproduk").style.borderColor="red";
		valid="false";
	}
	
	
	x = document.getElementById("deskripsi").value;
	document.getElementById("error-desc").innerHTML="Deskripsi harus kurang dari sama dengan 200 karakter<br>";
	document.getElementById("error-desc").style.color="red";
	document.getElementById("error-desc").style.display="none";
	document.getElementById("deskripsi").style.borderColor="#ccc";
	if(x.length>200){
		document.getElementById("error-desc").style.display="initial";
		document.getElementById("deskripsi").style.borderColor="red";
		valid = "false";
	}
	
	x = document.getElementById("harga").value;
	document.getElementById("error-price").innerHTML="Harga tidak boleh kosong<br>";
	document.getElementById("error-price").style.color="red";
	document.getElementById("error-price").style.display="none";
	document.getElementById("harga").style.borderColor="#ccc";
	if(x==null || x==""){
		document.getElementById("error-price").style.display="initial";
		document.getElementById("harga").style.borderColor="red";
		valid="false";
	}else{
	
		document.getElementById("error-price").innerHTML="Harus berupa angka<br>";
		document.getElementById("error-price").style.color="red";
		document.getElementById("error-price").style.display="none";
		document.getElementById("harga").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("error-price").style.display="initial";
			document.getElementById("harga").style.borderColor="red";
			valid="false";
		}
	
	}

	if(valid=="false") {
		return false;
	}
}