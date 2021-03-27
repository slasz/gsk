	function toUpper(obj, e){
		obj.value=obj.value.toUpperCase();
		return true;
	}
	function validateAlpha(obj,e) {
		if (e.keyCode==13) { return true; }
		if (e.type!="keypress") { return true; }
		if (isAlpha(e.keyCode)) { return true; }
		e.keyCode = 0;
		return false;
	}

	function validateNumeric(obj,e) {
		if (e.keyCode==13) {  return true; }
		if (e.type!="keypress") { return true; }
		if (isNumeric(e.keyCode)) { return true; }
		if (isMinusChar(e.keyCode)) { return true; }
		e.keyCode = 0;
		return false;
	}

	function validateAlphaNumeric(obj,e) {
		if(window.event)
			intcode=e.keyCode
		else intcode=e.which
		
			if (intcode==13) { return true; }
			if (e.type!="keypress") { return true; }
			if (isAlpha(intcode)) { return true; }
			if (isNumeric(intcode)) { return true; }			
			if (isSpecialCharOfGorillaProductID(intcode)) { return false; }
			e.keyCode = 0;		
			return false;
	}

	function validateGeneral(obj,e) {
		if (e.keyCode==13) { return true; }
		if (e.type!="keypress") { return true; }
		if (isDoubleQuote(e.keyCode)) {
			e.keyCode = 0;
			return false;
		}
		return true;
	}

	function validateEmail(obj,e) {
		if (e.keyCode==13) { return true; }
		if (e.type!="keypress") { return true; }
		if (isAlpha(e.keyCode)) { return true; }
		if (isNumeric(e.keyCode)) { return true; }
		if (isDecimalPlace(e.keyCode)) { return true; }
		if (isAtSign(e.keyCode)) { return true; }
		if (isUnderscore(e.keyCode)) { return true; }
		if (isMinusChar(e.keyCode)) { return true; }
		e.keyCode = 0;
		return false;
	}
	function validateFileName(obj,e) {
		if (e.keyCode==13) { return true; }
		if (e.type!="keypress") { return true; }
		if (isAlpha(e.keyCode)) { return true; }
		if (isNumeric(e.keyCode)) { return true; }
		if (isDecimalPlace(e.keyCode)) { return true; }
		//if (isAtSign(e.keyCode)) { return true; }
		if (isUnderscore(e.keyCode)) { return true; }
		if (isMinusChar(e.keyCode)) { return true; }
		e.keyCode = 0;
		return false;
	}
	function validateURL(obj,e) {
		if (e.keyCode==13) { return true; }
		if (e.type!="keypress") { return true; }
		if (isAlpha(e.keyCode)) { return true; }
		if (isNumeric(e.keyCode)) { return true; }
		if (isDecimalPlace(e.keyCode)) { return true; }
		if (isUnderscore(e.keyCode)) { return true; }
		if (isForwardSlash(e.keyCode)) { return true; }
		if (isColon(e.keyCode)) { return true; }
		if (isMinusChar(e.keyCode)) { return true; }
		e.keyCode = 0;
		return false;
	}

	function validateDecimal(obj,e) {
		//if (e.keyCode==13) { return false; }
		var keyCode = window.event ? e.keyCode : e.which;		
		//alert(keyCode);
		if (e.type!="keypress") { return true; }
		if (isNumeric(e.keyCode)) { return true; }
		if (isDecimalPlace(e.keyCode)) { return true; }
		if (isMinusChar(e.keyCode)) { return true; }
		e.keyCode = 0;
		
		return false;
	}

	function isAlpha(myKeyCode) {
		if (myKeyCode >= 97 && myKeyCode <= 122) {
			return true;
		}
		if (myKeyCode >=65 && myKeyCode <=90) {
			return true;
		}
		return false;
	}

	function isNumeric(myKeyCode) { 
		if (myKeyCode >= "48" && myKeyCode <="57") {
			return true;
		}
		return false;
	}
	
	function isSpecialChar(myKeyCode){
		if (myKeyCode >= "32" && myKeyCode <="47") {return true;}
		if (myKeyCode >= "58" && myKeyCode <="64") {return true;}
		if (myKeyCode >= "91" && myKeyCode <="96") {return true;}
		if (myKeyCode >= "123" && myKeyCode <="126") {return true;}
		return false;
	}
	
	function isSpecialCharOfGorillaProductID(myKeyCode){
		if (myKeyCode >= "32" && myKeyCode <="44") {return true;}
		if(myKeyCode >= "46" && myKeyCode <= "47") {return true;}
		if (myKeyCode >= "58" && myKeyCode <="64") {return true;}
		if (myKeyCode >= "91" && myKeyCode <="94") {return true;}
		if(myKeyCode == "96") {return true;}
		if (myKeyCode >= "123" && myKeyCode <="126") {return true;}
		return false;
	}
	
	function isDecimalPlace(myKeyCode) {
		if (myKeyCode == 46) { return true; }
		return false;
	}

	function isDoubleQuote(myKeyCode) {
		if (myKeyCode == 34) { return true; }
		return false;
	}

	function isAtSign(myKeyCode) {
		if (myKeyCode == 64) { return true; }
		return false;
	}

	function isUnderscore(myKeyCode) {
		if (myKeyCode == 95) { return true; }
		return false;
	}

	function isForwardSlash(myKeyCode) {
		if (myKeyCode == 47) { return true; }
		return false;
	}

	function isColon(myKeyCode) {
		if (myKeyCode == 58) { return true; }
		return false;
	}
	
	function isSemiColon(myKeyCode) {
		if (myKeyCode == 59) { return true; }
		return false;
	}	

	function isMinusChar(myKeyCode) {
		if (myKeyCode == 45) { return true; }
		return false;
	}
	
	function isAmp(myKeyCode) {
		if (myKeyCode == 38) { return true; }
		return false;
	}
	
	function isEquals(myKeyCode) {
		if (myKeyCode == 61) { return true; }
		return false;
	}

	function conf(myText){
		return confirm(myText);
	}
function trim(inputString) {
   // Removes leading and trailing spaces from the passed string. Also removes
   // consecutive spaces and replaces it with one space. If something besides
   // a string is passed in (null, custom object, etc.) then return the input.
   if (typeof inputString != "string") { return inputString; }
   var retValue = inputString;
   var ch = retValue.substring(0, 1);
   while (ch == " ") { // Check for spaces at the beginning of the string
      retValue = retValue.substring(1, retValue.length);
      ch = retValue.substring(0, 1);
   }
   ch = retValue.substring(retValue.length-1, retValue.length);
   while (ch == " ") { // Check for spaces at the end of the string
      retValue = retValue.substring(0, retValue.length-1);
      ch = retValue.substring(retValue.length-1, retValue.length);
   }
   while (retValue.indexOf("  ") != -1) { // Note that there are two spaces in the string - look for multiple spaces within the string
      retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ")+1, retValue.length); // Again, there are two spaces in each of the strings
   }
   return retValue; // Return the trimmed string back to the user
} // Ends the "trim" function

function NewWindow(winname,file,w,h) {
	var lp = (screen.width) ? (screen.width-w)/2 : 0;
	var tp = (screen.height) ? (screen.height-h)/2 : 0;
window.open(file,winname,'width='+w+',height='+h+',toolbar=0,location=0,status=0,menubar=0,scrollbars=auto,resizeable=no,left='+lp+',top='+tp+' ');
}

function roundNumber(argNum, argDec) {
	var numberField = argNum;
	if (isNaN(numberField)) numberField=0;
	var rlength = argDec; // The number of decimal places to round to
	if (isNaN(rlength))  rlength=2;
	var newnumber = Math.round(numberField*Math.pow(10,rlength))/Math.pow(10,rlength);
	return newnumber;
}

function ShowHide(argID){
	var fncTemp=document.getElementById(argID);
	if (fncTemp.style.display=='' || fncTemp.style.display=='none'){
		fncTemp.style.display='inline';
		self.location.href='#'+argID+"Anchor"
	}else{
		fncTemp.style.display='none';
	}
	return true;
}
function extractNumber(obj, decimalPlaces, allowNegative)
{
	var temp = obj.value;
	
	// avoid changing things if already formatted correctly
	var reg0Str = '[0-9]*';
	if (decimalPlaces > 0) {
		reg0Str += '\\.?[0-9]{0,' + decimalPlaces + '}';
	} else if (decimalPlaces < 0) {
		reg0Str += '\\.?[0-9]*';
	}
	reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
	reg0Str = reg0Str + '$';
	var reg0 = new RegExp(reg0Str);
	if (reg0.test(temp)) return true;

	// first replace all non numbers
	var reg1Str = '[^0-9' + (decimalPlaces != 0 ? '.' : '') + (allowNegative ? '-' : '') + ']';
	var reg1 = new RegExp(reg1Str, 'g');
	temp = temp.replace(reg1, '');

	if (allowNegative) {
		// replace extra negative
		var hasNegative = temp.length > 0 && temp.charAt(0) == '-';
		var reg2 = /-/g;
		temp = temp.replace(reg2, '');
		if (hasNegative) temp = '-' + temp;
	}
	
	if (decimalPlaces != 0) {
		var reg3 = /\./g;
		var reg3Array = reg3.exec(temp);
		if (reg3Array != null) {
			// keep only first occurrence of .
			//  and the number of places specified by decimalPlaces or the entire string if decimalPlaces < 0
			var reg3Right = temp.substring(reg3Array.index + reg3Array[0].length);
			reg3Right = reg3Right.replace(reg3, '');
			reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
			temp = temp.substring(0,reg3Array.index) + '.' + reg3Right;
		}
	}
	
	obj.value = temp;
}
function extractNumber2(obj, decimalPlaces, allowNegative)
{
	var temp = obj.value;
	if(temp.length==1 && temp=="-"){obj.value = temp.replace('-', '');return false;}
	// avoid changing things if already formatted correctly
	var reg0Str = '[0-9]*';
	if (decimalPlaces > 0) {
		reg0Str += '\\.?[0-9]{0,' + decimalPlaces + '}';
	} else if (decimalPlaces < 0) {
		reg0Str += '\\.?[0-9]*';
	}
	
	reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str ;
	reg0Str = reg0Str + '$';
	//alert("allowNegative = "+allowNegative+" RegExp = "+reg0Str);
	var reg0 = new RegExp(reg0Str);
	if (reg0.test(temp)) return true;

	// first replace all non numbers
	var reg1Str = '[^0-9' + (decimalPlaces != 0 ? '.' : '') + (allowNegative ? '-' : '') + ']';
	var reg1 = new RegExp(reg1Str, 'g');
	temp = temp.replace(reg1, '');
//alert("temp = "+temp+" RegExp = "+reg1Str);
	if (decimalPlaces != 0) {
		var reg3 = /\./g;
		var reg3Array = reg3.exec(temp);
		if (reg3Array != null) {
			// keep only first occurrence of .
			//  and the number of places specified by decimalPlaces or the entire string if decimalPlaces < 0
			var reg3Right = temp.substring(reg3Array.index + reg3Array[0].length);
			reg3Right = reg3Right.replace(reg3, '');
			reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
			temp = temp.substring(0,reg3Array.index) + '.' + reg3Right;
		}
	}
	
	obj.value = temp;
}
function blockNonNumbers(obj, e, allowDecimal, allowNegative)
{
	var key;
	var isCtrl = false;
	var keychar;
	var reg;
		
	if(window.event) {
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if(e.which) {
		key = e.which;
		isCtrl = e.ctrlKey;
	}	
	// check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl)
	{
		return false;
	}
	
if (isNaN(key)) return true;
	
	keychar = String.fromCharCode(key);
	
	reg = /\d/;
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;
	
	return isFirstN || isFirstD || reg.test(keychar);
}
function blockNonNumbers2(obj, e, allowDecimal, allowNegative)
{
	var key;
	var isCtrl = false;
	var keychar;
	var reg;
		
	if(window.event) {
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if(e.which) {
		key = e.which;
		isCtrl = e.ctrlKey;
	}
	if (isNaN(key)) return true;
	
	keychar = String.fromCharCode(key);
	
	// check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl)
	{
		return true;
	}

	reg = /\d/;	
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;
//alert(obj.value.length+" show ="+obj.value.substr(obj.value.length -1,1));
	if(keychar =='-' && obj.value.substr(obj.value.length -1,1) != '-'){  isFirstN=true;}else{ isFirstN=false;}
	return isFirstN || isFirstD || reg.test(keychar);
}

function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
