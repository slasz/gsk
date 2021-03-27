<!--UI Frame-->
<link type="text/css" href="../css/jquery.css" rel="stylesheet" />
<link type="text/css" href="../css/demos.css" rel="stylesheet" />
<link type="text/css" href="../css/style.css" rel="stylesheet" />	
<link type="text/css" href="../jQuery/css/ui-lightness/jquery-ui-1.8.4.custom.css" rel="stylesheet" />	

<script type="text/javascript" src="../jQuery/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jQuery/js/jquery-ui-1.8.4.custom.min.js"></script>
<!-- TinyMCE -->


<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        tinymce.init({
            selector: "textarea",
			theme: "modern",
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern imagetools"
			],
			relative_urls: false,
    		remove_script_host: false,
			verify_html : false,
			
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor",
			
			file_picker_callback : elFinderBrowser
			
			//image_advtab: true,
			/*templates: [
				{title: 'Test template 1', content: 'Test 1'},
				{title: 'Test template 2', content: 'Test 2'}
			]*/
        });
		
		function elFinderBrowser (callback, value, meta) {
		  tinymce.activeEditor.windowManager.open({
			file: '../elfinder/elfinder.html',// use an absolute path!
			title: 'elFinder 2.0 :: File Management',
			width: 900,  
			height: 450,
			resizable: 'yes'
		  }, {
			oninsert: function (file, elf) {
			  var url, reg, info;
		
			  // URL normalization
			  url = file.url;
			  //alert(url);
			  /*reg = /\/[^/]+?\/\.\.\//;
			  while(url.match(reg)) {
				url = url.replace(reg, '/');
			  }*/
		
			  // Make file info
			  info = file.name + ' (' + elf.formatSize(file.size) + ')';
		
			  // Provide file and text for the link dialog
			  if (meta.filetype == 'file') {
				callback(url, {text: info, title: info});
			  }
		
			  // Provide image and alt text for the image dialog
			  if (meta.filetype == 'image') {
				callback(url, {alt: info});
			  }
		
			  // Provide alternative source and posted for the media dialog
			  if (meta.filetype == 'media') {
				callback(url);
			  }
			}
		  });
		  return false;
		}
    </script>

  
 <!--Sorter and Pager	
<link type="text/css" href="../tablesorter/tests/assets/css/default.css" rel="stylesheet" />
<script type="text/javascript" src="../tablesorter/jquery.tablesorter.js"></script>
<link type="text/css" href="../tablesorter/addons/pager/jquery.tablesorter.pager.css" rel="stylesheet" />
<script type="text/javascript" src="../tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>-->

<!--Facebox script-------------------------------------------------->
<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../facefiles/facebox.js" type="text/javascript"></script>

<script type="text/javascript" src="../Ajax/myAjaxFramework.js"></script>
<script type="text/javascript" src="../Ajax/function.js"></script>


<script type="text/javascript">
			$(function(){			

				// Tabs
				$('#tabs').tabs();				
				$('#tabs1').tabs();				
				$("button, input:submit").button();		
				$("button, input:button").button();
				$("button, input:reset").button();	
				// Facebox
				$('a[rel*=facebox]').facebox();	 
				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});
				
				$("table#large")/* , widgets: ['zebra']*/
				.tablesorter({widthFixed: true , sortList: [[0,0]]})
				.tablesorterPager({container: $("#pager")});
			
			//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); });
			
			// Datepicker
				$('#datepicker').datepicker({
					dateFormat: 'dd/mm/yy' 
				});
			
			
			
			
			
			});
			
			
function showPIC(pic,oldpic,pictemp){
	var pictur = document.getElementById(pic);
	var addimg = document.getElementById(oldpic);
	var shwIn = document.getElementById(pictemp);
	var browserName=navigator.appName; 
	if (browserName=="Netscape")
	{ 
	 //alert("Hi Netscape User!");
	 shwIn.src=pictur.files[0].getAsDataURL(); 
	 addimg.src=pictur.files[0].getAsDataURL(); 
	}
	else 
	{ 
	 if (browserName=="Microsoft Internet Explorer")
	 {
	  //alert("Hi, Explorer User!");
	  shwIn.src=pictur.value;
	  addimg.src=pictur.value;
	   
	 }
	 else
	  {
		alert("What ARE you browsing with here?");
	   }
	}
	addimg.style.width=150 + "px";
	//-->	
	//alert(shwIn.width+" x "+shwIn.height);
	
	
	
}


			</script>

<style type="text/css">
body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			ul#icons {margin:0 42%; padding: 0}
			ul#icons li { position:relative; padding: 0; cursor: pointer; float:left;  list-style: none;}
			ul#icons span.ui-icon {float: left; }
a:link {
	color: #000000 ;
	text-decoration: none;
		font-size: 13px;
			font-family: "tahoma", AngsanaUPC, CordiaUPC, BrowalliaUPC;

}
a:visited {
	color: #000000 ;
	text-decoration: none;
		font-size: 13px;
			font-family: "tahoma", AngsanaUPC, CordiaUPC, BrowalliaUPC;

}
a:hover {
	font-family: "tahoma", AngsanaUPC, CordiaUPC, BrowalliaUPC;
	color: #ff6600 ;
		font-size: 13px;
}
a:active {
    color: #000000 ;
	text-decoration: none;
		font-size: 13px;
	font-family: "tahoma", AngsanaUPC, CordiaUPC, BrowalliaUPC;
}





</style>
<?
	$styleform="../css/login_styleform.css";
	$baseform="../css/login_style.base.css";


?>
<link href="<?=$styleform?>" rel="stylesheet" type="text/css" />
<link href="<?=$baseform?>" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />