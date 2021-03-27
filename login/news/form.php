
<style>
div.product{
font-family:Arial, Helvetica, sans-serif;font-size:13px;letter-spacing:0.1em;
}
ul.product{
	list-style	:none;
}
.input_product{ width:200px;padding:0;}
.Biz_MyTable_Col_Sell1
{ 
	font-family: "tahoma"; 
	font-size: 13px;
	background-color: #7be0ff;
	font-weight: bold;
} 
.Biz_MyTable_Col_Sell2
{
	font-family: "tahoma"; 
	font-size: 13px;
	background-color: #dcf4fb;
}
</style>
<script type="text/javascript">
function ClkImage(pic,old,del,act){
	var showpic = document.getElementById(pic);
	var oldpic = document.getElementById(old);
	var delpic = document.getElementById(del);
	switch(act){
		case "btndel":
			showpic.value="";			
			delpic.checked=true;
			oldpic.style.display="none";
		break;
		case "txtfile":	
			delpic.checked=false;
			oldpic.style.display="inline";
		break;
		case "files":	
			delpic.checked=false;
			oldpic.style.display="none";
		break;
		}
	}
</script>
<?



$getid=(isset($_GET[id]))? $_GET[id]:$_POST[id];
$getmid=(isset($_GET[mid]))? $_GET[mid]:$_POST[mid];



if(!empty($getid)){
	$edit=mysql_query("select id, titleTh ,main_id from news"
	." where id=".$getid 
	)or die(mysql_error());
	
	if(mysql_num_rows($edit)>0){
		list($id,$titleTh,$main_id)=mysql_fetch_array($edit);//, $homes
	$chkh=($line=='h')?"checked":"";
	$chkw=($line=='w')?"checked":"";	
	}
	
			
}


	

	
	
	
	$Category=mysql_query("select m_id,m_country from m_branch  ")or die(mysql_error());
	if(mysql_num_rows($Category)>0){
	$x=0;
	$strCategory="<select name='main_id' id='main_id' style='margin:8px 0' onChange=\"getDataReturnText('product/subcate.php?subcat='+this.value,Show_Subcategory)\"><option value='0'>เลือกประเทศ</option>";
		while(list($m_id,$m_country)=mysql_fetch_array($Category)){
		$sel=($m_id==$getmid || $m_id==$main_id)? "selected":"";
					$titleCat=$m_country;
					$strCategory.="<option value='$m_id' $sel>$titleCat</option>";
					$x++;				
		}
	$strCategory.="</select>";
	
	}
	
	


 ?>
 

 
<div class="demo">
<form name="formsale" action="saveform.php" method="post" onSubmit="return checkform(this)" enctype="multipart/form-data" >	
    <input type="hidden" name="Event" value="News" /> 
    <input name="command" type="hidden" value="insert" />    
    <input type="hidden" name="nid" value="<?=$getid?>"  />

	<div class='product' style="background:#ffffff;margin:0 80px">
         <fieldset >
            <legend>Department detail</legend>

            
            
      <label style="width:150px;display:block;float:left;margin-top:8px">Department name : </label>
   <input type="text" name="titleTh" id="titleTh" value="<?=$titleTh;?>" style="width:500px" />
            <br style="clear:left"/>
            
             <label style="width:150px;display:block;float:left;margin-top:8px">Country: </label>
      <?=$strCategory?>
    
            <br style="clear:left"/>
            
   
            


   	  </fieldset>
	</div>  

   
  
             <div style="margin:10px 0">
                  <label style="float:left;">Gallery : <font color="red">mark under picture to delete</font></label>
                  <br style="clear:both;" />
          <br style="clear:both;" />
                    <? 
						$strGallery=mysql_query("select id, picname,sorter,em_name,em_position from gallery_news where promotion_id=".$id);
						if($strGallery && mysql_num_rows($strGallery)>0){
							$result_gallery="<ul style='padding:0; margin:0; list-style:none'>";
							$dg0=0;
							while(list($gid,$gname,$sorter,$em_name,$em_position)=mysql_fetch_array($strGallery)){
								$result_gallery.="<li style='float:left;padding: 10px;'><img src='news/gallery/".$gname."' width='120' >
								
					
					<center>Name<br />
<input type='text' maxlength='250' style='width:118px' name='em_name[$gid]' value='$em_name' /></center><br />

					
					<center>Position<br />
<input type='text' maxlength='250' style='width:118px' name='em_position[$gid]' value='$em_position' /></center><br />

					
					<center>Sort No.<br />
<input type='text' maxlength='5' style='width:30px' name='sorter[$gid]' value='$sorter' /></center>
					
								
								<center><input type='checkbox' name='delGallery[]' value='".$gid."' ></center></li>";
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

  
  
  
 
  <!--   ----------------------------------- รูป ------------------------------------------>

  <p>
  <center>
    <input type="submit" value="Save"  />&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"/>
  </center>  
</p>

  </form>
</div>
