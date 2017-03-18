function clickme() {
	var xmlHttp = new XMLHttpRequest();
	var val = getRadioVal(document.getElementById('catalog-form'), 'filter-catalog');
	var get = "showCatalog.php?name="+document.getElementById('search-cat').value+"&filter="+val;
    xmlHttp.open( "GET", get, false ); // false for synchronous request
    xmlHttp.send();
	document.getElementById("catalog-list").innerHTML='';
	document.getElementById("catalog-list").innerHTML=xmlHttp.responseText;
}

function getRadioVal(form, name) {
    var val;
    var radios = form.elements[name];
    
    for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) {
            val = radios[i].value;
            break; 
        }
    }
    return val;
}

function liked(name) {
	var val = document.getElementById(name).value;
	var lik = "click-like"+val+"-y";
	if (name==lik) {
		var xmlHttp = new XMLHttpRequest();
		var get = "index.php?action=unlike&product_id="+val;
		xmlHttp.open( "GET", get, false ); // false for synchronous request
		xmlHttp.send();
		if (!isNaN(xmlHttp.responseText)) {
			document.getElementById('catalog-likes'+val).innerHTML=xmlHttp.responseText+' like';
			document.getElementById(name).setAttribute('id', 'click-like'+val+'-n');
			document.getElementById('click-like'+val+'-a').setAttribute('name', 'click-like'+val+'-n');
			document.getElementById('click-like'+val+'-a').setAttribute('style', 'color:blue');	
			document.getElementById('click-like'+val+'-a').innerHTML = "<b>LIKE</b>";
		}
		else window.location="login.php";
	}
	else {
		var xmlHttp = new XMLHttpRequest();
		var get = "index.php?action=like&product_id="+val;
		xmlHttp.open( "GET", get, false ); // false for synchronous request
		xmlHttp.send();
		if (!isNaN(xmlHttp.responseText)) {
			document.getElementById('catalog-likes'+val).innerHTML=xmlHttp.responseText+' like';
			document.getElementById(name).setAttribute('id', 'click-like'+val+'-y');
			document.getElementById('click-like'+val+'-a').setAttribute('name', 'click-like'+val+'-y');
			document.getElementById('click-like'+val+'-a').setAttribute('style', 'color:red');
			document.getElementById('click-like'+val+'-a').innerHTML = "<b>LIKED</b>";
		}
		else window.location = 'login.php';
	};
}

function calculateTotal() {
	var quantity = document.getElementById('quantity').value;
	var total = quantity*document.getElementById('price').value;
	total = total.toString();
	var count = total.toString().length;
	var cnt = 0;
	for(i=count; i>0;i--) {
		if (cnt == 3) {
			cnt = 0;
			total = total.slice(0, i)+ '.'+ total.slice(i);
		}
		cnt++;
	}
	document.getElementById('calculate-total-price').innerHTML = total;
}

function confirmed() {
	var isValid = true;
	document.getElementById("inputnamelog").innerHTML="Nama tidak boleh kosong<br>";
	document.getElementById("inputnamelog").style.color="red";
	document.getElementById("inputnamelog").style.display="none";
	document.getElementById("consigne").style.borderColor="#ccc";
	x = document.getElementById("consigne").value;
	if (x==null || x=="") {
		document.getElementById("inputnamelog").style.display="initial";
		document.getElementById("consigne").style.borderColor="red";
		isValid = false;
	}

	document.getElementById("inputaddresslog").innerHTML="Alamat tidak boleh kosong<br>";
	document.getElementById("inputaddresslog").style.color="red";
	document.getElementById("inputaddresslog").style.display="none";
	document.getElementById("address").style.borderColor="#ccc";	
	x = document.getElementById("address").value;
	if (x==null || x=="") {
		document.getElementById("inputaddresslog").style.display="initial";
		document.getElementById("address").style.borderColor="red";
		isValid = false;
	}

	document.getElementById("inputpostlog").innerHTML="Kode pos tidak boleh kosong<br>";
	document.getElementById("inputpostlog").style.color="red";
	document.getElementById("inputpostlog").style.display="none";
	document.getElementById("postal").style.borderColor="#ccc";	
	x = document.getElementById("postal").value;
	if (x==null || x=="") {
		document.getElementById("inputpostlog").style.display="initial";
		document.getElementById("postal").style.borderColor="red";
		isValid = false;
	} else {
		document.getElementById("inputpostlog").innerHTML="Harus berupa angka<br>";
		document.getElementById("inputpostlog").style.color="red";
		document.getElementById("inputpostlog").style.display="none";
		document.getElementById("postal").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("inputpostlog").style.display="initial";
			document.getElementById("postal").style.borderColor="red";
			isValid=false;
		}
	}
	
	document.getElementById("inputphonelog").innerHTML="Nomor telepon tidak boleh kosong<br>";
	document.getElementById("inputphonelog").style.color="red";
	document.getElementById("inputphonelog").style.display="none";
	document.getElementById("phone").style.borderColor="#ccc";
	x = document.getElementById("phone").value;
	if (x==null || x=="") {
		document.getElementById("inputphonelog").style.display="initial";
		document.getElementById("phone").style.borderColor="red";
		isValid = false;
	} else {
		document.getElementById("inputphonelog").innerHTML="Harus berupa angka<br>";
		document.getElementById("inputphonelog").style.color="red";
		document.getElementById("inputphonelog").style.display="none";
		document.getElementById("phone").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("inputphonelog").style.display="initial";
			document.getElementById("phone").style.borderColor="red";
			isValid=false;
		}
	}
	
	document.getElementById('err-credit-card').innerHTML="";
	document.getElementById('credit-card').style.borderColor = "";
	x = document.getElementById('credit-card').value;
	if (document.getElementById('credit-card').value.length < 12 || document.getElementById('credit-card').value.length > 12) {
		document.getElementById('err-credit-card').style.color = "red";
		document.getElementById('err-credit-card').innerHTML="Nomor kartu kredit harus 12 digit<br>";
		document.getElementById('credit-card').style.borderColor = "red";
		isValid = false;
	} else {
		document.getElementById("err-credit-card").innerHTML="Harus berupa angka<br>";
		document.getElementById("err-credit-card").style.color="red";
		document.getElementById("err-credit-card").style.display="none";
		document.getElementById("credit-card").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("err-credit-card").style.display="initial";
			document.getElementById("credit-card").style.borderColor="red";
			isValid=false;
		}
	}
	
	document.getElementById('err-verf-num').innerHTML="";
	document.getElementById('verf').style.borderColor = "";
	x = document.getElementById('verf').value;
	if (document.getElementById('verf').value.length < 3 || document.getElementById('verf').value.length > 3) {
		document.getElementById('err-verf-num').style.color = "red";
		document.getElementById('err-verf-num').innerHTML="Kode verifikasi harus 3 digit<br>";
		document.getElementById('verf').style.borderColor = "red";
		isValid = false;
	} else {
		document.getElementById("err-verf-num").innerHTML="Harus berupa angka<br>";
		document.getElementById("err-verf-num").style.color="red";
		document.getElementById("err-verf-num").style.display="none";
		document.getElementById("verf").style.borderColor="#ccc";
		if(isNaN(x)){
			document.getElementById("err-verf-num").style.display="initial";
			document.getElementById("verf").style.borderColor="red";
			isValid= false;
		}
	}
	
	if (!isValid) return false;
	return confirm("Apakah data yang anda masukkan sudah benar?");
}

function cancel() {
	window.location = 'catalog.php';
}


function deleteItem(name) {
	if (confirm("Apakah anda ingin menghapus item ini?")) {
		var val = document.getElementById(name).value;
		var xmlHttp = new XMLHttpRequest();
		var get = "index.php?action=delete&id_product="+val;
		xmlHttp.open( "GET", get, false ); // false for synchronous request
		xmlHttp.send();
		showProduct();
	}
	return false;
}