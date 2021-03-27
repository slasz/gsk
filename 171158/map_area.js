var areaNameEN = new Array('jp', 'cn', 'th', 'id', 'my', 'sg', 'hk', 'vn');
var areaNameFullEN = new Array('japan', 'shanghai', 'thailand', 'indonesia', 'malaysia', 'singapore', 'hongkong', 'vietnam');
var areaDesc = new Array('GSK ELECTRONICS<br /> JAPAN OFFICE',
			    'GSK ELECTRONICS<br /> SHANGHAI OFFICE',
			    'GSK ELECTRONICS<br /> THAILAND OFFICE',
			    'GSK ELECTRONICS<br /> INDONESIA OFFICE',
			    'GSK ELECTRONICS<br /> MALAYSIA OFFICE',
			    'GSK ELECTRONICS<br /> SINGAPORE OFFICE',
			    'GSK ELECTRONICS<br /> HONGKONG OFFICE',
			    'GSK ELECTRONICS<br /> VIETNAM OFFICE');	
var _imagePath = 'http://gsk.com.sg/wordpress/wp-content/themes/gsk/images/map/';
var _defaultBranch = 1; // display default branch on page load
var _currentSelectedMapIndex = _defaultBranch;

/*
var images = new Array();
for (i = 0; i < areaNameEN.length; i++)
{
	images[i] = new Image();
	images[i].src = _imagePath + 'branch_' + areaNameEN[i] + '.jpg';
}
*/

 // scale 1.0 (original size : 100%)
var winkSize = 40;
// State of each wink
var winkState = new Array(0, 0, 0, 0, 0, 0, 0, 0);


// Original position when original size;
//var winkOffestX = new Array(-8, -7, -7, 195, 190, -6, -6, 168); 
//var winkOffestY = new Array(18, 46, 50, -8, -8, -8, -7, 26);

//window.onload = function () { alert('onload'); }
// onHoverMap(2);



/***************************************************************************************/
// fix window.onload for separate .js files
/***************************************************************************************/
/*
if (window.attachEvent) {window.attachEvent('onload', initBranch);}
else if (window.addEventListener) {window.addEventListener('load', initBranch, false);}
else {document.addEventListener('load', initBranch, false);} 
*/

function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') { window.onload = func; }
	else
	{
		window.onload = function() {
			if (oldonload) { oldonload(); }
			func();
		}
	}
}

addLoadEvent(initBranch);
addLoadEvent(function() {
  /* more code to run on page load */ 
});
/***************************************************************************************/


function initBranch() {	setPreview(_defaultBranch); }

function doWinkScale(index)
{
//	var winkObj = document.getElementById('rpw-' + index);
/*
	if (winkObj.width < 70)
	{
		if (winkObj.style.setProperty) { winkObj.style.setProperty ("width", '70px', "important"); } 
		else { winkObj.style.setAttribute ("width", '70px'); }
	}
	else
	{
		if (winkObj.style.setProperty) { winkObj.style.setProperty ("width", '10px', "important"); } 
		else { winkObj.style.setAttribute ("width", '10px'); }
	}
*/
}

function winkScaleUp(index)
{
//	alert('winkScaleup-' + index);
	var winkObj = document.getElementById('rpw-' + index);
//	alert(winkObj);
//	var t = setTimeout(function(){alert("Hello")},3000)
	if (winkObj.style.setProperty)
	{
		winkObj.style.setProperty ("width", "70px", "important");
		winkObj.style.setProperty ("height", "70px", "important");
	}	
	else
	{
		winkObj.style.setAttribute ("width", "70px");
		winkObj.style.setAttribute ("height", "70px");
	}
}

function winkScaleDown(index)
{
//	alert('winkScaledown-' + index);
	var winkObj = document.getElementById('rpw-' + index);
//	alert(winkObj);
	if (winkObj.style.setProperty)
	{
		winkObj.style.setProperty ("width", "40px", "important");
		winkObj.style.setProperty ("height", "40px", "important");
	} 
	else
	{
		winkObj.style.setAttribute ("width", "40px");
		winkObj.style.setAttribute ("height", "40px");
	}
}

function onHoverMap(indexNo)
{
	setPreview(indexNo);
	setRedPoint(indexNo, 1);
	winkScaleUp(indexNo);
}

function onMouseOutMap(indexNo)
{
	setRedPoint(indexNo, 0);
	winkScaleDown(indexNo);
}

function setPreview(indexNo)
{
    _currentSelectedMapIndex = indexNo;

	/*
	var previewImage = document.getElementById('branch_img');
	previewImage.src = images[indexNo].src;

	var previewDesc = document.getElementById('branch_desc');
	previewDesc.innerHTML = '<p>' + areaDesc[indexNo] + '</p>';
	*/
	
	var previewDesc = document.getElementById('branch_preview_desc');
	previewDesc.innerHTML = areaDesc[indexNo];
	
	var previewImg = document.getElementById('branch_preview');
	var posXY = (String(parseInt(_currentSelectedMapIndex) * -228)) + "px -230px";
    if (previewImg.style.setProperty) { previewImg.style.setProperty ("background-position", posXY, "important"); } 
    else { previewImg.style.setAttribute ("background-position", posXY); }
	
	previewImg.setAttribute("href", "http://gsk.com.sg/wordpress/branches/gsk-electronics-" + areaNameFullEN[_currentSelectedMapIndex]);
	return false;
}

function setRedPoint(indexNo, glow)
{
	var rp = document.getElementById('rp-' + indexNo);
	if (glow) { rp.src = _imagePath + '/red_point_glow.png'; }
	else { rp.src = _imagePath + '/red_point.png'; }
}
