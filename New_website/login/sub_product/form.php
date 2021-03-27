
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
.lb {
	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #000000;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
	background-color: #DCF4FB;
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
function ImageContent($img,$picTemp, $del , $delpic, $titleTxt, $pic, $oldimg,$n){
		$picempty=(file_exists("iconed/5.gif"))? "iconed/5.gif":"../iconed/5.gif";
		$empImg="<img src='$picempty' id='$oldimg' style='padding:3px;border:solid 1px #cccccc' />"; 
		//echo $img;
		
		echo (!empty($img))? "<img src='../upload/product/$img' width='110' id='$oldimg' name='$oldimg' style='padding:3px;border:solid 1px #cccccc' />": $empImg ;
		 $delpic=str_replace("sales/","",$img);
			
		$result="<img  id='$picTemp' style='display:none;position:static' src='../iconed/5.gif' />
					<input type='checkbox' name='del[$n]' id='$del' value='$delpic' style='display:none'><br />";
		$style1.=($titleTxt=="Flag *")?" style='color:red;font-weight:bold' ":" class='txt1' ";
		$result.="<span $style1>$titleTxt</span><br />
		<input type='file' class='f10px' name='pic[]' id='$pic'  onchange=\"ClkImage('$pic','$oldimg','$del','files');\" /><br />
					<input name='Button' type='button' class='f10px' value='ลบรูป' style='padding:2px;' onclick=\"ClkImage('$pic','$oldimg','$del','btndel');\"/><input name='Button' type='button' class='f10px' value='ใช้รูปเดิม'  style='padding:2px;' onclick=\"ClkImage('$pic','$oldimg','$del','txtfile');\"/>";
		// showPIC('$pic','$oldimg','$picTemp');
		return $result ;		
}


$getid=(isset($_GET[id]))? $_GET[id]:$_POST[id];
$getmid=(isset($_GET[mid]))? $_GET[mid]:$_POST[mid];

$getT=(isset($_GET[type]))? $_GET[type]:$_POST[type];
$getC=(isset($_GET[catid]))? $_GET[catid]:$_POST[catid];

//echo $getT;

if(!empty($getid)){
	$edit=mysql_query("select s_id,s_country,s_map,s_mail,s_flag,s_pic,s_sorter,main_id,
	s_b1,s_b2,s_b3,s_b4,s_b5,s_b6,s_b7,s_b8,s_b9,s_b10,s_f1,s_f2,s_f3,s_f4,s_f5,s_f6,s_f7,s_f8,s_f9,s_f10
	 from s_branch"
	." where s_id=".$getid 
	)or die(mysql_error());
	
	if(mysql_num_rows($edit)>0){
		list($s_id,$s_country,$s_map,$s_mail,$s_flag,$s_pic,$s_sorter,$main_id,
		$s_b1,$s_b2,$s_b3,$s_b4,$s_b5,$s_b6,$s_b7,$s_b8,$s_b9,$s_b10,$s_f1,$s_f2,$s_f3,$s_f4,$s_f5,$s_f6,$s_f7,$s_f8,$s_f9,$s_f10
		)=mysql_fetch_array($edit);//, $homes
	$chkh=($line=='h')?"checked":"";
	$chkw=($line=='w')?"checked":"";	
	}
	
		$query_pic=mysql_query("select id, picture, folders from sales_pic where main_id='".$id."' order by picture") or die(mysql_error());
		while($rpic=mysql_fetch_array($query_pic)){
			list($picname, $pictype)=explode(".",$rpic['picture']);
			list($piccode,$piclist)=explode("_",$picname);
			if($rpic['folders']=="../upload/product/"){
				switch($piclist){
					case 0 : $img0=$picname.".".$pictype; 
					break;
					case 1 : $img1=$picname.".".$pictype;
					break;
					case 2 : $img2=$picname.".".$pictype;
					break;
					case 3 : $img3=$picname.".".$pictype;
					break;
					case 4 : $img4=$picname.".".$pictype;
					break;
					case 5 : $img5=$picname.".".$pictype;
					break;
					
					
					case 6 : $img6=$picname.".".$pictype;
					break;
					case 7 : $img7=$picname.".".$pictype;
					break;
					case 8 : $img8=$picname.".".$pictype;
					break;
					case 9 : $img9=$picname.".".$pictype;
					break;
				}
			}
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
    <input type="hidden" name="Event" value="S_Branch" /> 
    <input name="command" type="hidden" value="insert" />    
    <input type="hidden" name="sid" value="<?=$getid?>"  />

	<div class='product' style="background:#ffffff;margin:0 80px">
         <fieldset >
            <legend><strong>ข้อมูลสาขาย่อย</strong></legend>

            
            
            <label style="width:150px;display:block;float:left;margin-top:8px">ชื่อสาขาย่อย : </label><input type="text" name="s_country" id="s_country" value="<?=$s_country;?>" style="width:500px" />
            <br style="clear:left"/>
            
             <label style="width:150px;display:block;float:left;margin-top:8px">ประเทศ: </label><?=$strCategory?>
    
            <br style="clear:left"/>
            
   
            
<label style="width:150px;display:block;float:left;margin-top:8px">Map : </label><input type="text" name="s_map" id="s_map" value="<?=$s_map;?>" style="width:500px" />
            <br style="clear:left"/>
             
            

<? $s_map2=str_replace("&#34;"," \" ",$s_map); ?>
<?=(!empty($s_map2))?$s_map2:"";?>

   	  </fieldset>
	</div>  

   
   

  
  
  
  <!--************************************** ข้อมูล **************************************-->
  
  
  <div class='product' style="margin:10px 80px; ">   
        <table   border="0" cellpadding="1" cellspacing="1" width="100%">
          <tr>
            <td colspan="4" class="Biz_MyTable_Col_Sell1" ><h3 style="padding:0;margin:5px 3px;">ข้อมูล</h3></td>
            </tr>
          
          <tr>
            <td align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">Send E-mail</td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_mail" type="text" id="s_mail" style="width:100%;" value="<?=$s_mail;?>"/></td>
          </tr>
          <tr>
            <td width="25%" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_f1" type="text" class="lb" id="s_f1" style="width:100%;" value="<?=$s_f1;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b1" type="text" id="s_b1" style="width:100%;" value="<?=$s_b1;?>"/></td>
          </tr>
          <tr>
            <td width="25%" height="48" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_f2" type="text" class="lb" id="s_f2" style="width:100%;" value="<?=$s_f2;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b2" type="text" id="s_b2" style="width:100%;" value="<?=$s_b2;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_f3" type="text" class="lb" id="s_f3" style="width:100%;" value="<?=$s_f3;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_b3" type="text" id="s_b3" style="width:100%;" value="<?=$s_b3;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" height="48" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_f4" type="text" class="lb" id="s_f4" style="width:100%;" value="<?=$s_f4;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b4" type="text" id="s_b4" style="width:100%;" value="<?=$s_b4;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_f5" type="text" class="lb" id="s_f5" style="width:100%;" value="<?=$s_f5;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_b5" type="text" id="s_b5" style="width:100%;" value="<?=$s_b5;?>"/>            </td>
          </tr>
          
          <tr>
            <td width="25%" height="48" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_f6" type="text" class="lb" id="s_f6" style="width:100%;" value="<?=$s_f6;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b6" type="text" id="s_b6" style="width:100%;" value="<?=$s_b6;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_f7" type="text" class="lb" id="s_f7" style="width:100%;" value="<?=$s_f7;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_b7" type="text" id="s_b7" style="width:100%;" value="<?=$s_b7;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" height="48" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_f8" type="text" class="lb" id="s_f8" style="width:100%;" value="<?=$s_f8;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b8" type="text" id="s_b8" style="width:100%;" value="<?=$s_b8;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_f9" type="text" class="lb" id="s_f9" style="width:100%;" value="<?=$s_f9;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;">              <input name="s_b9" type="text" id="s_b9" style="width:100%;" value="<?=$s_b9;?>"/>            </td>
          </tr>
          <tr>
            <td width="25%" height="48" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_f10" type="text" class="lb" id="s_f10" style="width:100%;" value="<?=$s_f10;?>"/>            </td>
            <td height="48" colspan="3" align="left" class="Biz_MyTable_Col_Sell2" style="padding:0px 20px;"><input name="s_b10" type="text" id="s_b10" style="width:100%;" value="<?=$s_b10;?>"/>            </td>
          </tr>
      
 
         
        
          <tr>
            <td width="25%">&nbsp;</td>
            <td width="25%">&nbsp;</td>
            <td width="25%"> </td>
            <td width="25%" ></td>
          </tr>
        </table>
       
  </div>
  
  
 
  <!--   ----------------------------------- รูป ------------------------------------------>

  <p>
  <center>
    <input type="submit" value="บันทึกข้อมูล"  /><input type="reset" value="คืนค่าเดิม"/>
  </center>  
</p>

  </form>
</div>
