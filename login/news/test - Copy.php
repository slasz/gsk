<style type="text/css">
.tblrow{list-style:none;padding:0;margin:0;}
.tblclm{float:left;}
.mover{ background-color:#FFFFCC}
.mout{ background-color:#ffff66}
.mover2{ background-color:#ffffff}
.mout2{ background-color:#dddddd}
</style>
<link href="../dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="../dropzone/dropzone.js"></script>
<script>
<!-- 3 -->
Dropzone.options.myDropzone = {
    init: function() {
	
	 this.on("addedfile", function(file) {

        // Create the remove button
       // var removeButton = Dropzone.createElement("<a class='dz-remove'>Remove file</a>");
        var removeButton = Dropzone.createElement("<a class='dz-remove'></a>");
        

        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        removeButton.addEventListener("click", function(e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          // Remove the file preview.
          _this.removeFile(file);
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
	  
	  
	  
	  this.on("success", function(file, responseText) {
      // Handle the responseText here. For example, add the text to the preview element:
      file.previewTemplate.appendChild(document.createTextNode(responseText));
    });
	  }
};



</script>


<? 

$getmid=isset($_GET['mid'])? $_GET['mid']:$_POST['mid'];
$ll=!empty($getmid)?"&mid=$getmid":"";

$sql=mysql_query("select id,titleTh from news where id=".$_GET['id'] )or die(mysql_error());
if($sql && mysql_num_rows($sql)>0){
		while($r=mysql_fetch_array($sql)){
			$result=$r['titleTh'];		
		}	
}
?>

<div class="ui-widget"  style="margin:1px 8px; padding:10px 0 0 0;">

<div style="height:28px;margin:0 0 5px 0">
	<ul class="tblrow" style="position:absolute;margin:0;">
    	<li class="tblclm" style="width:952px"><?=$result?></li>
    </ul>

</div>


<form action="news/upload.php" class="dropzone" id="my-dropzone" >
<input type="hidden" name="proid" id="proid" value="<?=$_GET['id']?>">


</form>


<form method="post" name="frm" >
<center style="margin:20px">
<input type="button" name="btn" value="กลับหน้า Gallery" onClick="location='administrator.php?p=news/index<?=$ll;?>';"/></center>
</form><br>



</div>


