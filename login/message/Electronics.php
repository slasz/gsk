<? 
include_once('../includes/connect.php');
$id='3';
$sqltxt=mysql_query("select aboutTh,p0 from messageweb where id='$id'");
list($QaboutusTh,$p0)=@mysql_fetch_array($sqltxt);

$file_name = $_FILES['fileN0']['name']; 
$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
//$aboutusTh=$_POST['aboutusTh'];


$aboutusTh=addslashes($_POST['aboutusTh']);





$delGallery=$_POST['delGallery'];
$sorter=$_POST['sorter'];
$custname=$_POST['custname'];	

		





if(!empty($file_name)){
				$uploads = '../upload/page'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = "Electronics";

				$fileRename0 = $re.".".$ext[1];

				if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

				$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

} else{

						$fileRename0=$oldpic;

				}


if(!empty($aboutusTh) ){
	mysql_query("update messageweb set aboutTh='".$aboutusTh."', p0='".$fileRename0."' where id='$id' ") or die(mysql_error());
	echo "<script>self.location='?p=message/Electronics';</script>";
}


if($custname!=""){
	foreach($custname as $gind=>$gval){
	//echo "$gind=>$gval<br/>";
			mysql_query("update gallery_cust set custname='".$gval."' where id='".$gind."'") or die(mysql_error());
			echo "<script>self.location='?p=message/Electronics';</script>";
	}
}


if(sizeof($sorter)>0){
	foreach($sorter as $gind=>$gval){
	//echo "$gind=>$gval<br/>";
		if(!empty($gval) && $gval>0){
			mysql_query("update gallery_cust set sorter=".$gval." where  id=".$gind);
			echo "<script>self.location='?p=message/Electronics';</script>";
		}
	}
}


if(sizeof($delGallery)>0){
		
foreach($delGallery as $gind=>$gval){
			//echo $gind."<=>".$gval."<br>";
$strGallery=mysql_query("select id, picname from gallery_cust where id=".$gval);
						if($strGallery && mysql_num_rows($strGallery)>0){
							while(list($gid,$gname)=mysql_fetch_array($strGallery)){
							
							
								if(unlink("../upload/customer/".$gname)){
									
									$getDeleteGallery.= !empty($getDeleteGallery)? ",": "";
									$getDeleteGallery.=$gid;
									
								}
							}
							
							
							$QryDel=!empty($getDeleteGallery) ? mysql_query("delete from gallery_cust where id in(".$getDeleteGallery.")") :exit();
							
						}
			
			echo "<script>self.location='?p=message/Electronics';</script>";
			}
		}	






?>
<div class="demo">
<form action="" method="post" enctype="multipart/form-data">
    
    <div style="border:solid 0px #666666;padding:20px;margin:5px 0x;">
        <!--<h3>&#3648;&#3585;&#3637;&#3656;&#3618;&#3623;&#3585;&#3633;&#3610;&#3648;&#3619;&#3634;</h3>-->
     <div id="tabs1">
    	 <ul style="padding:0;margin:0;">
         	<li><a href="#tabs-1" style="padding:2px 8px;">Electronics</a></li>
           <!-- <li><a href="#tabs-2" style="padding:2px 8px;">ติดต่อเรา</a></li>-->
         </ul>
		</div>
        
        
           
     <div id="tabs-1" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
            <div class="product" align="center">
              <textarea name="aboutusTh" id="aboutusTh" style="min-height:150px; width:750px;"><?=$QaboutusTh?></textarea>
            </div>
           <!--   <div class="product" align="center">ภาษาอังกฤษ
              <textarea name="aboutusEn" id="aboutusEn" style="min-height:350px; width:750px;"><?=$QaboutusEn?></textarea>
            </div>-->
            
       </div>
       
        
        
        
          <div id="tabs-1" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
            <div class="product" align="center">
               <?php if($p0=="") {} else {?>
                    <img src="../upload/page/<?php echo $p0; ?>"  border="0" width="300" /> <br />
                   <?php }?>   
                   
                   Electronics Photo :  
                     <input name="fileN0" type="file" class="inputbox" id="fileN0"/>
                      <input type="hidden" id="oldpic	" name="oldpic" value="<?=$p0?>">
                      Size : width 391 pixel * height 416 pixel<br />             
               
            </div>
         
            
       </div>
        
     
       
       
       <!--<div id="tabs-2" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
         <div class="product" align="center">ภาษาไทย
           <textarea name="contactTh" id="contactTh" style="min-height:350px; width:750px;"><?=$QcontactTh?></textarea>
         </div>
            <div class="product" align="center">ภาษาจีน
              <textarea name="contactEn" id="contactEn" style="min-height:350px; width:750px;"><?=$QcontactEn?></textarea>
            </div></div>-->
       
        
        
        
        
        
        
   <div class="demo" style="border:0px solid red; margin-top:50px;">



                  <label style="float:left; width:100%;"><strong>Gallery Logo Maker : </strong> <font color="red">mark under picture to delete</font></label>
                  <br style="clear:both;" />
          <br style="clear:both;" />
                    <? 
						$strGallery=mysql_query("select id,picname,custname,sorter from gallery_cust where promotion_id='4' order by sorter asc, id desc");
						if($strGallery && mysql_num_rows($strGallery)>0){
							$result_gallery="<ul style='padding:0; margin:0; list-style:none'>";
							$dg0=0;
							while(list($gid,$gname,$custname,$sorter)=mysql_fetch_array($strGallery)){
								$result_gallery.="<li style='float:left;padding: 10px;'><img src='../upload/customer/".$gname."' width='120' >
								
					
					<center>Name<br />
<input type='text' maxlength='250' style='width:118px' name='custname[$gid]' value='$custname' /></center><br />


					
					<center>Sort No.<br />
<input type='text' maxlength='5' style='width:30px' name='sorter[$gid]' value='$sorter' /></center>
					
								
								<center><input type='checkbox' name='delGallery[]' value='".$gid."' > Del</center></li>";
								if($dg0==4){
									$result_gallery.="<br style='clear:both'/>";
									$dg0=0;
								}else{
									$dg0++;
								}
							}
							$result_gallery.="</ul>";
							echo $result_gallery;
						}
					?>
        



</div>     
        
        
        
        
        
        
        
 
    
    
    
       </div>

       

    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><center style='padding:10px'>
        <input type="submit" value="Save Data">
    </center> </td>
  </tr>
</table>

</form>    
</div>




















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



			$result="Upload maker logo";		

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
    
    
    <div class="demo" style="border:0px solid red; margin-top:50px; padding:20px;">
<div class="ui-widget"  style="margin:1px 8px; padding:10px 0 0 0;">

<div style="height:28px;margin:0 0 5px 0">
	<ul class="tblrow" style="position:absolute;margin:0;">
    	<li class="tblclm" style="width:952px"><strong><?=$result?></strong> : images size (150 pixel * 50 pixel)</li>
    </ul>

</div>


<form action="message/upload.php" class="dropzone" id="my-dropzone" enctype="multipart/form-data" >
<input type="hidden" name="proid" id="proid" value="4">


</form>


<form method="post" name="frm" enctype="multipart/form-data" >
<center style="margin:20px">
<input type="button" name="btn" value="Refresh" onClick="location='administrator.php?p=message/Electronics';"/></center>
</form><br>



</div>
</div>
    
    
    </td>
  </tr>
</table>


