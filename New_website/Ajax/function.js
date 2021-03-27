function AntispamCheck(AntispamCode){

	var param="antispamcode="+AntispamCode;

	//alert(param);

	postDataReturnText("send.php", param, displayMessage);

	return false;	

	

}





function updatepageCustomer(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');

var delsub = document.getElementsByName('delsub');

var online = document.getElementsByName('online');

var sorts = document.getElementsByName('sorts');

for (var i=0; i<online.length; i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "custid[]="+del[i].value+"&del[]="+ del[i].checked+"&online[]="+online[i].checked+"&sorts[]="+sorts[i].value;

	}

	

for (var i=0; i<delsub.length; i++) {

	//	if (i > 0) {

			queryString += "&";

	//	}

		queryString += "subid[]="+delsub[i].value+"&delsub[]="+ delsub[i].checked;

	}	

var param = queryString+"&Event="+events;

//alert(param);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}



function updateCareerRe(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');


for (var i=0; i<del.length;i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "re_id[]="+del[i].value+"&del[]="+ del[i].checked;

	}

	


var param = queryString+"&Event="+events;

//alert(events);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}

function updatepageSection(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');

var delsub = document.getElementsByName('delsub');

var online = document.getElementsByName('online');

var sorts = document.getElementsByName('sorts');

for (var i=0; i<online.length; i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "s_id[]="+del[i].value+"&del[]="+ del[i].checked+"&online[]="+online[i].checked+"&sorts[]="+sorts[i].value;

	}

	

for (var i=0; i<delsub.length; i++) {

	//	if (i > 0) {

			queryString += "&";

	//	}

		queryString += "subid[]="+delsub[i].value+"&delsub[]="+ delsub[i].checked;

	}	

var param = queryString+"&Event="+events;

//alert(param);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}






function colorform(colorname,colorcode,catid,command,events,url,callback){

var param = "colorname="+colorname+"&colorcode="+colorcode+"&catid="+catid+"&Event="+events+"&command="+command;

var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";

	if(colorname==""){

		msg+="รหัสสีไม่เกิน 20 อักษร \n";

		n=1;

	}

	if(colorcode==""){

		msg+="เลือกสีด้วยค่ะ\n";

		n=1;

	}

msg+="=========================";

	

	if(n==0){

		

		 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}







if(n==1){

alert(msg);

}

return false;

}



	function checkform()

	{    

		var msg="";

		var n=0;

		var frm = document.formsale;

		msg="เกิดข้อผิดพลาดกรุณาตรวจสอบข้อมูลดังนี้"+

			 "\n=========================\n";

	/*	if(frm.itemcode.value=='')

		{

			msg="โปรดกรอกรหัสสินค้าด้วย\n";

			n=1;

		}

		

		if(frm.itemcode.value=='')

		{

			msg="โปรดกรอกรหัสสินค้าด้วย\n";

			n=1;

		}
*/


		

		if(n==0){

			return true;	

		}else{

			alert(msg);

			return false;

		}



	}



	

function ckform(username,newpwd,events,url,callback){

var param = "username="+username+"&newpwd="+newpwd+"&Event="+events;

var msg = "";

var n=0;

msg="เกิดข้อผิดพลาดกรุณาตรวจสอบข้อมูลดังนี้"+

	 "\n=========================\n";

	if(username==""){

		msg+="ชื่อผู้ใช้งาน\n";

		n=1;

	}

	if(newpwd==""){

		msg+="รหัสผ่าน\n";

		n=1;

	}

msg+="=========================";

	

	if(n==0){

		 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}

if(n==1){

alert(msg);

}

return false;



}

function displayMessage(text){

	if(text=="n"){ 

	alert("Anti Spam Code Invalid\nรหัสป้องกันสแปม ไม่ถูกต้อง");	

	}else if(text=="y"){

			//alert("ถูกแล้ว");

		chkSubmit();

		

	}

	return false;

}

function displaymain(text){

		//alert(text);

		document.getElementById("main").innerHTML =  text ;

}

function displayWait(text){

		if(text!=""){ document.getElementById("main").innerHTML =  text ;

			return true;

		}else{

			return false;

		}

}

function Show_category(text){

		if(text!=""){ 

		document.getElementById("Show_category").innerHTML =  text ;

		document.getElementById("Show_Subcategory").innerHTML =  "";

			return true;

		}else{

			return false;

		}

}

function Show_Subcategory(text){

	

		if(text!=""){ document.getElementById("Show_Subcategory").innerHTML =  text ;

			return true;

		}else{

			return false;

		}

}

function displaylogin(text){

		//alert("test");

		document.getElementById("memberlogin").innerHTML =  text ;

}



function displaycart(text){

	//alert(text);

	window.location.assign("order.php");

	//document.getElementById("cart").innerHTML = text;

	}



function displayPM(text){

		document.getElementById("show_msg").innerHTML =  text ;

}



function permissionx(text){

		//alert("test");

		document.getElementById("main").innerHTML =  text ;

}

function approve_member(username,pwd,url,callback){

	var param = "username="+username+"&pwd="+pwd;

			 postDataReturnText(url, param, callback);

		

}



function reFresh(url,title){

	alert(title);

	self.location = url ;

}



function saveform(thcat,encat,catid,online,events,url,callback){

var pic = document.getElementsByName("pic");

var queryString="";

		for (var i=0; i<pic.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "pic[]="+pic[i].value;

		}

var param = queryString+"&thcat="+thcat+"&encat="+encat+"&catid="+catid+"&online="+online+"&Event="+events;

//alert(param);

var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";

	if(thcat==""){

		msg+="ชื่อหมวดหมู่ภาษาไทย \n";

		n=1;

	}

	if(encat==""){

		msg+="ชื่อหมวดหมู่ภาษาอังกฤษ\n";

		n=1;

	}

msg+="=========================";

	

	if(n==0){

		

		 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}







if(n==1){

alert(msg);

}

return false;

}



function savebrand(brandname_th,brandname_en,brandid,online,events,url,callback){

var param = "brandname_th="+brandname_th+"&brandname_en="+brandname_en+"&brandid="+brandid+"&online="+online+"&Event="+events;

var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลให้ครบในช่อง ต่อไปนี้"+

	 "\n=========================\n";

	if(brandname_th==""){

		msg+="ชื่อหมวดหมู่ ภาษาไทย \n";

		n=1;

	}

	if(brandname_en==""){

		msg+="ชื่อหมวดหมู่ ภาษาอังกฤษ \n";

		n=1;

	}

msg+="=========================";

	

	if(n==0){

		

		 if(confirm("ยืนยันคำสั่งอีกครั้ง")){

			 //alert(param);

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}







if(n==1){

alert(msg);

}

return false;

}



function saveproduct(itemcode,color,titleTh,detailTh,titleEn,detailEn,size,price,discount,pic1,pic2,pic3,online,events,url,callback){

var param = "itemcode="+itemcode+"&color="+color+"&titleTh="+titleTh+"&detailTh="+detailTh+"&titleEn="+titleEn+"&detailEn="+detailEn+"&size[]="+size+"&price[]"+price+"&discount[]"+discount+"&Event="+events;

var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";

	if(thcat==""){

		msg+="ชื่อหมวดหมู่ภาษาไทย \n";

		n=1;

	}

	if(encat==""){

		msg+="ชื่อหมวดหมู่ภาษาอังกฤษ\n";

		n=1;

	}

msg+="=========================";

	

	if(n==0){

		

		 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}







if(n==1){

alert(msg);

}

return false;

}





function sizeform(code,dimension,sizeid,events,command,url,callback){

var param = "code="+code+"&dimension="+dimension+"&sizeid="+sizeid+"&Event="+events+"&command="+command;

var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";

	if(code==""){

		msg+="รหัสไซส์เช่น S,M,L,XL \n";

		n=1;

	}

	/*if(dimension==""){

		msg+="ความกว้างยาวเช่น 34x42\n";

		n=1;

	}*/

msg+="=========================";

	

	if(n==0){

		

		 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

			 postDataReturnText(url, param, callback);

			 return true;

		 }else{

			return false;	 

		}

	}







if(n==1){

alert(msg);

}

return false;

}



function shoppingcart(ID,Qty,Price,Event){

		var param="ID="+ID+"&Qty="+Qty+"&Price="+Price+"&Event="+Event;

		alert("สินค้าถูกหยิบลงตะกร้าแล้ว");		

		postDataReturnText("order/cart.php", param, displaycart);	

		

}



function showPM(hostid,guessid,postmessage,Event,url,callback){

		var param="hostid="+hostid+"&guessid="+guessid+"&postmessage="+postmessage+"&Event="+Event;

		//alert("ฝากข้อความเรียบร้อย");		

		postDataReturnText(url, param, callback);

		

}



function Addtocart(ID,Qty,Price,Size,Color,Event,lang){

	

	var n=0;

	var msg="";

/*	if(Size==""){

		switch(lang){

			case "th":msg+="เลือก Size ก่อนค่ะ\n";

			break;

			case "en": msg+="Please select a Size\n";

			break;

		}

		

		n=1;

	}*/

	if(Qty==0 || Qty==""){

		switch(lang){

			case "th":msg+="ใส่จำนวนที่ต้องการซื้อด้วยค่ะ\n";

			break;

			case "en":msg+="Please enter the number you wish to purchase\n";

			break;

		}

		

		n=1;

	}	

if(n==1){

alert(msg);

return false;

}

	

		

	var param="ID="+ID+"&Qty="+Qty+"&Price="+Price+"&Size="+Size+"&Color="+Color+"&Event="+Event;

	/*	switch(lang){

			case "th":alert("สินค้าถูกหยิบลงตะกร้าแล้ว");

			break;

			case "en":	alert("New products to be picked up");

		}*/

				

		postDataReturnText("order/cart.php", param, displaycart);	

}	



function updatecolor(events,command,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

		for (var i=0; i<del.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "catid[]="+del[i].value+"&del[]="+ del[i].checked+"&command="+command;

		}

	var param = queryString+"&Event="+events;

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }



}



function updatepage(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');

var delsub = document.getElementsByName('delsub');

var sorts = document.getElementsByName('sorts');

var sortss = document.getElementsByName('sortss');


for (var i=0; i<sorts.length; i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "catid[]="+del[i].value+"&del[]="+ del[i].checked+"&sorts[]="+sorts[i].value;

	}


for (var i=0; i<delsub.length; i++) {

	//	if (i > 0) {

			queryString += "&";

	//	}

		queryString += "subid[]="+delsub[i].value+"&delsub[]="+ delsub[i].checked+"&sortss[]="+sortss[i].value;

	}	

var param = queryString+"&Event="+events;

//alert(queryString);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}

/*function updatepage(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');

var delsub = document.getElementsByName('delsub');

var online = document.getElementsByName('online');

var sorter = document.getElementsByName('sorter');

for (var i=0; i<online.length; i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "catid[]="+del[i].value+"&del[]="+ del[i].checked+"&online[]="+online[i].checked+"&sorter[]="+sorter[i].value;

	}

	

for (var i=0; i<delsub.length; i++) {

	//	if (i > 0) {

			queryString += "&";

	//	}

		queryString += "subid[]="+delsub[i].value+"&delsub[]="+ delsub[i].checked;

	}	

var param = queryString+"&Event="+events;

alert(param);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}
*/


function updatepageBrand(events,url,callback){

var queryString = "";

var del = document.getElementsByName('del');

var delsub = document.getElementsByName('delsub');

var online = document.getElementsByName('online');

var sorts = document.getElementsByName('sorts');

for (var i=0; i<online.length; i++) {

		if (i > 0) {

			queryString += "&";

		}

		queryString += "b_id[]="+del[i].value+"&del[]="+ del[i].checked+"&online[]="+online[i].checked+"&sorts[]="+sorts[i].value;

	}

	

for (var i=0; i<delsub.length; i++) {

	//	if (i > 0) {

			queryString += "&";

	//	}

		queryString += "subid[]="+delsub[i].value+"&delsub[]="+ delsub[i].checked;

	}	

var param = queryString+"&Event="+events;

//alert(param);

 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

	postDataReturnText(url, param, callback);

	return true;

 }else{

	return false;	 

 }

}



function confirmOrder(url,member_id,fname,lname,emails,phone,mobile,address,update_profile,shipment,events,callback){

	/* var transport=document.getElementsByName('transport');

	 for(var i=0; i<transport.length; i++){

		 if(transport[i].checked==true){

		 	selTransport=transport[i].value;

		 }

	 }+"&transport="+selTransport*/

		var param="member_id="+member_id+"&fname="+fname+"&lname="+lname+"&emails="+emails+"&phone="+phone+"&mobile="+mobile+"&address="+address+"&update_profile="+update_profile+"&event="+events+"&shipment="+shipment;

	var n=0;

	var msg="";

	msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";



	if(fname=="" || lname==""){

		msg+="ชื่อ-นามสกุล ผู้รับ\n";

		n=1;

	}

	if(emails==""){

		msg+="อีเมล์ ผู้สั่งซื้อ \n";

		n=1;

	}

		if(address==""){

		msg+="ที่อยู่ ผู้สั่งซื้อ \n";

		n=1;

	}

	msg+="=========================";



	

	if(n==1){

	alert(msg);

	return false;

	}



		

		//alert(param);

		postDataReturnText(url, param, callback);	



	}

function SaveOrder(url,member_id,customer,email,phone,mobile,address,orderstatus,transport,transportNet,shipment,callback){

	var itemcode=document.getElementsByName('itemcode');

	var unitprice=document.getElementsByName('unitprice');

	var qty=document.getElementsByName('qty');

	var size=document.getElementsByName('size');

	var color=document.getElementsByName('colorpd');

	var queryString="";

		for (var i=0; i<itemcode.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "itemcode[]="+itemcode[i].value+"&unitprice[]="+ unitprice[i].value+"&qty[]="+qty[i].value+"&size[]="+size[i].value+"&color[]="+color[i].value;

	}

		var param=queryString+"&member_id="+member_id+"&customer="+customer+"&email="+email+"&phone="+phone+"&mobile="+mobile+"&address="+address+"&orderstatus="+orderstatus+"&transport="+transport+"&transportNet="+transportNet+"&shipment="+shipment;

		//alert(param);

		postDataReturnText(url, param, callback);	



	}

function updatemember(url,member_id,login_name,password1,password2,popup_container,gender,fname,lname,emails,phone,mobile,address,update_profile,callback){

		var param="member_id="+member_id+"&login_name="+login_name+"&password1="+password1+"&password2="+password2+"&popup_container="+popup_container+"&gender="+gender+"&fname="+fname+"&lname="+lname+"&emails="+emails+"&phone="+phone+"&mobile="+mobile+"&address="+address+"&update_profile="+update_profile;

		//alert(param);

		var msg = "";

var n=0;

msg="กรุณากรอกข้อมูลต่อไปนี้ให้ครบด้วยค่ะ"+

	 "\n=========================\n";

	if(login_name==""){

		msg+="ชื่อที่ใช้ Login\n";

		n=1;

	}

	if(password1!=password2){

		msg+="รหัสผ่านไม่ตรงกันทั้งสองช่อง\n";

		n=1;

	}

	if(fname==""){

		msg+="ชื่อผู้สมัคร\n";

		n=1;

	}

	if(lname==""){

		msg+="นามสกุลผู้สมัคร\n";

		n=1;

	}

	if(emails==""){

		msg+="อีเมล์ที่ใช้ติดต่อ\n";

		n=1;

	}

		if(emails==""){

		msg+="ที่อยู่ที่ใช้ติดต่อ\n";

		n=1;

	}

msg+="=========================";

if(n==0){

postDataReturnText(url, param, callback);	

	return true;

}else{

	alert(msg);

 	return false;

}



		

}

function SaveStatus(events,url,callback){

	

var queryString="";

	var poids=document.getElementsByName('oid');

	var orderstatus = document.getElementsByName('updateStatus');		

	for (var i=0; i<poids.length; i++) {

			if (i > 0) {

				queryString += "&";

			}

			queryString += "poids[]="+poids[i].value+"&orderstatus[]="+ orderstatus[i].value;

	}

var param = queryString+"&Event="+events;

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }	

}



function updatebrand(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var sorts = document.getElementsByName('sorts');

		for (var i=0; i<sorts.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "brand_id[]="+del[i].value+"&del[]="+ del[i].checked+"&sorts[]="+sorts[i].value;

		}

	var param = queryString+"&Event="+events;

	

	 if(confirm("ยืนยันคำสั่งอีกครั้ง")){

		 //alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }



}

function updatetype(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var sorts = document.getElementsByName('sorts');

		for (var i=0; i<sorts.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "type_id[]="+del[i].value+"&del[]="+ del[i].checked+"&sorts[]="+sorts[i].value;

		}

	var param = queryString+"&Event="+events;

	

	 if(confirm("ยืนยันคำสั่งอีกครั้ง")){

		 //alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }



}

function updateproduct(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var m_sorter = document.getElementsByName('m_sorter');

	

	for (var i=0; i<m_sorter.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "mid[]="+del[i].value+"&del[]="+ del[i].checked+"&m_sorter[]="+m_sorter[i].value;

	}

	var param = queryString+"&Event="+events+"&command=delete";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(queryString);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }

}


function updateproductS(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var s_sorter = document.getElementsByName('s_sorter');

	

	for (var i=0; i<s_sorter.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "sid[]="+del[i].value+"&del[]="+ del[i].checked+"&s_sorter[]="+s_sorter[i].value;

	}

	var param = queryString+"&Event="+events+"&command=delete";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(queryString);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }

}

function updatepromotion(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var numS = document.getElementsByName('numS');

	//var productrate = document.getElementsByName('productrate');

	for (var i=0; i<numS.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "pid[]="+del[i].value+"&del[]="+ del[i].checked+"&numS[]="+numS[i].value;//+"&productrate[]="+productrate[i].value;

	}

	var param = queryString+"&Event="+events+"&command=delete";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }

}

function updateservice(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

	var numS = document.getElementsByName('numS');

	//var productrate = document.getElementsByName('productrate');

	for (var i=0; i<numS.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "pid[]="+del[i].value+"&del[]="+ del[i].checked+"&numS[]="+numS[i].value;//+"&productrate[]="+productrate[i].value;

	}

	var param = queryString+"&Event="+events+"&command=delete";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }

}

function updatefranchise(events,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');



	for (var i=0; i<del.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "pid[]="+del[i].value+"&del[]="+ del[i].checked;//+"&productrate[]="+productrate[i].value;

	}

	var param = queryString+"&Event="+events+"&command=delete";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		//alert(param);

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }

}


function updatesize(events,command,url,callback){

	var queryString = "";

	var del = document.getElementsByName('del');

		for (var i=0; i<del.length; i++) {

			

			if (i > 0) {

				queryString += "&";

			}

			queryString += "sizeid[]="+del[i].value+"&del[]="+ del[i].checked+"&command="+command;

		}

	var param = queryString+"&Event="+events;

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }



}



function NewWindow(mypage,myname,w,h,scroll){

LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;

TopPosition = (screen.height) ? (screen.height-h)/2 : 0;

settings =

'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'

win = window.open(mypage,myname,settings)

}



function checkSelect(text,choosedel){

	var del = document.getElementsByName('del');

	var param="";

	var msg=choosedel;

	var n=0;

	

	for (var i=0; i<del.length; i++) {

		if(del[i].checked==false){

			n+=1;

		}else{

			if (i > 0) {

				param += "&";

			}

			param+="del[]="+del[i].value;

		}

	}

	

	if(del.length==n){

		alert(msg);

		exit();

	}

	

	if(confirm(text)==true)

	{

		postDataReturnText('order/Dibasket.php', param, displayDiBasket);

	}

	

}

function displayDiBasket(text){

 	document.frm_orderlist.submit();

}

function CancelOrder(text)

{ 

	if(confirm(text)==true)

	{

		top.location='?clear=all';

	}

	

}

function fncSubmit(text)

{ 

	if(confirm(text)==true)

	{

		document.frm_orderlist.submit();

	}

	

}



function RegisSeller(url,fn,login,mail,pass,callback){

	var param = "name="+fn+"&email="+mail+"&username="+login+"&password="+pass+"&subjects=Register Reseller";

	 if(confirm("ยืนยันคำสั่งอีกครั้งค่ะ")){

		postDataReturnText(url, param, callback);

		return true;

	 }else{

		return false;	 

	 }



}

////////////////////////////////////////////////////WEBBOARD////////////////////////////////////////////////////



////////////////////////////////////////////////////WEBBOARD////////////////////////////////////////////////////