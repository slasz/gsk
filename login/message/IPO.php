<? 
include_once('../includes/connect.php');
$id='4';
$sqltxt=mysql_query("select aboutTh,p0 from messageweb where id='$id'");
list($QaboutusTh,$p0)=@mysql_fetch_array($sqltxt);

$file_name = $_FILES['fileN0']['name']; 
$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
//$aboutusTh=$_POST['aboutusTh'];
$aboutusTh=addslashes($_POST['aboutusTh']);
echo $aboutusTh;


if(!empty($file_name)){
				$uploads = '../upload/page'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = "IPO";

				$fileRename0 = $re.".".$ext[1];

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 




}

if(!empty($aboutusTh) ){
	mysql_query("update messageweb set aboutTh='".$aboutusTh."', p0='".$fileRename0."' where id='$id' ") or die(mysql_error());
	echo "<script>self.location='?p=message/IPO';</script>";
}


?>
<div class="demo">
<form action="" method="post" enctype="multipart/form-data">
    
    <div style="border:solid 0px #666666;padding:20px;margin:5px 0x;">
        <!--<h3>&#3648;&#3585;&#3637;&#3656;&#3618;&#3623;&#3585;&#3633;&#3610;&#3648;&#3619;&#3634;</h3>-->
     <div id="tabs1">
    	 <ul style="padding:0;margin:0;">
         	<li><a href="#tabs-1" style="padding:2px 8px;">IPO</a></li>
           <!-- <li><a href="#tabs-2" style="padding:2px 8px;">ติดต่อเรา</a></li>-->
         </ul>
		</div>
        
        
           
     <div id="tabs-1" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
            <div class="product" align="center">
              <textarea name="aboutusTh" id="aboutusTh" style="min-height:350px; width:750px;"><?=$QaboutusTh?></textarea>
            </div>
           <!--   <div class="product" align="center">ภาษาอังกฤษ
              <textarea name="aboutusEn" id="aboutusEn" style="min-height:350px; width:750px;"><?=$QaboutusEn?></textarea>
            </div>-->
            
       </div>
       
        
        
        
          <div id="tabs-1" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
            <div class="product" align="center">
               <?php if($p0=="") {} else {?>
                    <img src="../upload/page/<?php echo $p0; ?>"  border="0" width="100%" /> <br />
                   <?php }?>   
                   
                   IPO Photo :  
                     <input name="fileN0" type="file" class="inputbox" id="fileN0"/>
                      <input type="hidden" id="oldpic	" name="oldpic" value="<?=$p0?>">
                      Size width : 1169 pixel<br />             
               
            </div>
         
            
       </div>
        
     
       
       
       <!--<div id="tabs-2" style="margin:-2px 0 0 0;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
         <div class="product" align="center">ภาษาไทย
           <textarea name="contactTh" id="contactTh" style="min-height:350px; width:750px;"><?=$QcontactTh?></textarea>
         </div>
            <div class="product" align="center">ภาษาจีน
              <textarea name="contactEn" id="contactEn" style="min-height:350px; width:750px;"><?=$QcontactEn?></textarea>
            </div></div>-->
       
        
<center style='padding:10px'>
        <input type="submit" value="Save Data">
    </center>    </div>


</form>    
</div>
