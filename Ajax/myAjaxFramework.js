function getHTTPObject() {
	var XMLHttpRequestObject = false;
	if(window.XMLHttpRequest){
		XMLHttpRequestObject=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return XMLHttpRequestObject;
}

function getDataReturnText(url, callback){ 
//alert(url);
	var XMLHttpRequestObject = getHTTPObject();
	if(XMLHttpRequestObject) {
		XMLHttpRequestObject.open("GET", url); 
		XMLHttpRequestObject.onreadystatechange = function() { 
			if (XMLHttpRequestObject.readyState == 4 && 
				XMLHttpRequestObject.status == 200) {  
				callback(XMLHttpRequestObject.responseText); 
				delete XMLHttpRequestObject;
				 XMLHttpRequestObject = null;
			} 
	} 
	XMLHttpRequestObject.send(null); 
	}
}

function getDataReturnXml(url, callback){ 
	var XMLHttpRequestObject = getHTTPObject();
	if(XMLHttpRequestObject) {
		XMLHttpRequestObject.open("GET", url); 
		XMLHttpRequestObject.onreadystatechange = function() { 
			if (XMLHttpRequestObject.readyState == 4 && 
				XMLHttpRequestObject.status == 200) { 
				callback(XMLHttpRequestObject.responseXML); 
				delete XMLHttpRequestObject;
				XMLHttpRequestObject = null;
			} 
	} 
	XMLHttpRequestObject.send(null); 
	}
}

function postDataReturnText(url, data, callback){ 
//alert(url);
	var XMLHttpRequestObject = getHTTPObject();
	if(XMLHttpRequestObject) {
		XMLHttpRequestObject.open("POST", url); 
		XMLHttpRequestObject.setRequestHeader('Content-Type', 
		'application/x-www-form-urlencoded'); 
		XMLHttpRequestObject.onreadystatechange = function() { 
			if (XMLHttpRequestObject.readyState == 4 && 
				XMLHttpRequestObject.status == 200) {
				callback(XMLHttpRequestObject.responseText); 
				delete XMLHttpRequestObject;
				XMLHttpRequestObject = null;
			}else{
					if(callback==displayWait){
					callback("<img src='images/loading.gif'>"); 
					
					}
				} 
	}
    XMLHttpRequestObject.send(data); 
	}
}

function postDataReturnXml(url, data, callback){ 
	var XMLHttpRequestObject = getHTTPObject();
	if(XMLHttpRequestObject) {
		XMLHttpRequestObject.open("POST", url); 
		XMLHttpRequestObject.setRequestHeader('Content-Type', 
		'application/x-www-form-urlencoded'); 
    XMLHttpRequestObject.onreadystatechange = function() { 
		if (XMLHttpRequestObject.readyState == 4 && 
			XMLHttpRequestObject.status == 200) {
			callback(XMLHttpRequestObject.responseXML); 
			delete XMLHttpRequestObject;
			XMLHttpRequestObject = null;
		} 
	}
    XMLHttpRequestObject.send(data); 
	}
}