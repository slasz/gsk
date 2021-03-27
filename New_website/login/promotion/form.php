
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
function ImageContent($img,$picTemp, $del , $delpic, $titleTxt, $pic, $oldimg,$n){
		$picempty=(file_exists("iconed/5.gif"))? "iconed/5.gif":"../iconed/5.gif";
		$empImg="<img src='$picempty' id='$oldimg' style='padding:3px;border:solid 1px #cccccc' />"; 
		
		echo (!empty($img))? "<img src='../geng1.php?newsize=80&filedir=login/promotion/images/$img' width='80' id='$oldimg' name='$oldimg' style='padding:3px;border:solid 1px #cccccc' />": $empImg ;
		 $delpic=str_replace("sales/","",$img);
			
		$result="<img  id='$picTemp' style='display:none;position:static' src='../iconed/5.gif' />
					<input type='checkbox' name='del[$n]' id='$del' value='$delpic' style='display:none'><br />";
		$style1.=($titleTxt=="รูปภาพพื้นฐาน *")?" style='color:red;font-weight:bold' ":" class='txt1' ";
		$result.="<span $style1>$titleTxt</span><br />
		<input type='file' class='f10px' name='pic[]' id='$pic'  onchange=\"ClkImage('$pic','$oldimg','$del','files');\" /><br />
					<input name='Button' type='button' class='f10px' value='ลบรูป' style='padding:2px;' onclick=\"ClkImage('$pic','$oldimg','$del','btndel');\"/><input name='Button' type='button' class='f10px' value='ใช้รูปเดิม'  style='padding:2px;' onclick=\"ClkImage('$pic','$oldimg','$del','txtfile');\"/>";
		// showPIC('$pic','$oldimg','$picTemp');
		return $result ;		
}





$get=$_GET['status'];
if($get=='n'){
$msg="ข่าวสาร";
} else if($get=='p'){
$msg="Promotion";
} else if($get=='s'){
$msg="Service";
} else if($get=='e'){
$msg="Event";
}


$getid=(isset($_GET[id]))? $_GET[id]:$_POST[id];

if(!empty($getid)){
	$edit=mysql_query("select p.proid,p.titleTh,p.topicTh,p.detailTh,p.titleEn,p.topicEn,p.detailEn,p.titleJp,p.topicJp,p.detailJp, p.p0,p.hot,p.showindex,p.n_month,p.n_year"
	." from promotion p"
	." where p.proid=".$getid 
	)or die(mysql_error());
	
	if(mysql_num_rows($edit)>0){
		list($proid,$titleTh,$topicTh,$detailTh,$titleEn,$topicEn,$detailEn,$titleJp,$topicJp,$detailJp,$p0,$hot,$showindex,$mount,$year)=mysql_fetch_array($edit);
}

$chkhot=($hot=='y')?"checked":"";
$chk=($showindex=='y')?"checked":"";

	}
	
		
 ?>
<div class="demo">
<form name="formsale" action="saveform.php" method="post" onSubmit="return checkform(this)" enctype="multipart/form-data" >	
    <input type="hidden" name="Event" value="Promotion" /> 
    <input name="command" type="hidden" value="insert" />
    <input type="hidden" name="pid" value="<?=$getid?>" />
    <h4 class="ui-widget-content ui-widget-header ui-corner-all" style="margin:0 100px;padding:4px 10px">กรุณากรอกข้อมูล</h4>
    <div id="tabs" style="width:756px;margin:10px 0px 0 100px">
    	 <ul style="padding:0;margin:0;">
         	<li><a href="#tabs-1" style="padding:3px 8px;">ภาษาไทย</a></li>
            <li><a href="#tabs-2" style="padding:3px 8px;">ภาษาอังกฤษ</a></li>
            <!--<li><a href="#tabs-3" style="padding:3px 8px;">ภาษาญี่ปุ่น</a></li>-->
         </ul>
	</div>


<div  style="width:756;margin:0px 100px 0 100px;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >


<div id="tabs" style="width:806px;margin:10px 100px 0 0px"><strong>หมวดหมู่ : 
                 </strong>
   <label>
   <?=$msg;?>
   </label>
   
    <input type="hidden" id="status	" name="status" value="<?=$get;?>">
   <br />
      </div>
 
   <div id="tabs" style="width:806px;margin:10px 100px 0 0px"><strong>ภาพประกอบ : 
                 </strong> <?=(!empty($p0))?"<img src='../upload/promotions/".$p0."' width='432' height='258'><br/>":""?>
                      
                      <input name="fileN0" type="file" class="inputbox" id="fileN0"/>
                      
                      <input type="hidden" id="oldpic	" name="oldpic" value="<?=$p0?>">
                      
                      
                      <font color="red">ขนาดที่เหมาะสม 500*250</font><br />
      </div>
      
      
      <div id="tabs" style="width:806px;margin:10px 100px 0 0px; display:none;"><strong>แสดง icon Hot : 
                 </strong> <input name="hot" type="checkbox" id="hot" value="y" <?=$chkhot;?> />
                 <br />
      </div>
      
          <div id="tabs" style="width:806px;margin:10px 100px 0 0px; "><strong>แสดงหน้าแรก : 
                 </strong> <input name="showindex" type="checkbox" id="showindex" value="y" <?=$chk;?>/>
                 <br />
      </div>
      
      
      
      
       <?
 if($get=="n"){
 
 
 if($mount=="01"){
 $s1="selected";
 } else  if($mount=="02"){
 $s2="selected";
 } else  if($mount=="03"){
 $s3="selected";
 } else  if($mount=="04"){
 $s4="selected";
 } else  if($mount=="05"){
 $s5="selected";
 } else  if($mount=="06"){
 $s6="selected";
 } else  if($mount=="07"){
 $s7="selected";
 } else  if($mount=="08"){
 $s8="selected";
 } else  if($mount=="09"){
 $s9="selected";
 } else  if($mount=="10"){
 $s10="selected";
 } else  if($mount=="11"){
 $s11="selected";
 } else  if($mount=="12"){
 $s12="selected";
 }

?>   
         <div id="tabs" style="width:806px;margin:10px 100px 0 0px; "><strong>เดือน / ปี : 
                 </strong>
           <select name="mount" id="mount">
             <option>กรุณาเลือกเดือน</option>
             <option value="01" <?=$s1;?>>มกราคม</option>
             <option value="02" <?=$s2;?>>กุมภาพันธ์</option>
             <option value="03" <?=$s3;?>>มีนาคม</option>
             <option value="04" <?=$s4;?>>เมษายน</option>
             <option value="05" <?=$s5;?>>พฤษภาคม</option>
             <option value="06" <?=$s6;?>>มิถุนายน</option>
             <option value="07" <?=$s7;?>>กรกฎาคม</option>
             <option value="08" <?=$s8;?>>สิงหาคม</option>
             <option value="09" <?=$s9;?>>กันยายน</option>
             <option value="10" <?=$s10;?>>ตุลาคม</option>
             <option value="11" <?=$s11;?>>พฤศจิกายน</option>
             <option value="12" <?=$s12;?>>ธันวาคม</option>
           </select>
           <input name="year" type="text" id="year" size="5" maxlength="4" value="<?=$year;?>" />
           <span class="style1">*ให้ใส่ ค.ศ. ตัวอย่าง 2014*</span><br />
      </div>
    <? } else { }?>  
      


</div>




 <div id="tabs-1" style="width:730;margin:0px 100px 0 100px;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
 
<!--<div class="product" ><strong>หัวข้อ:</strong> <br />
        <input name="titleTh" type="text" class="input_product" id="titleTh" style="margin:5px 0;width:600px" maxlength="200" value="<?=$titleTh?>"/>
     </div>-->
     
     <div class="product" ><strong>บทนำ:</strong><br /><textarea name="topicTh" cols="125" rows="5" id="topicTh" style="width:500px;"><?=$topicTh?></textarea>
      </div>
     
     
      <div class="product" ><strong>รายละเอียด:</strong><br /><textarea name="detailTh" cols="125" rows="30" id="detailTh" style="width:500px;"><?=$detailTh?></textarea>
      </div>
   </div> 
     
   




<div id="tabs-2" style="width:730;margin:0px 100px 0 100px;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
 
     <!-- <div class="product" ><strong>หัวข้อ:</strong> <br />
        <input name="titleEn" type="text" class="input_product" id="titleEn" style="margin:5px 0;width:600px" maxlength="200" value="<?=$titleEn?>"/>
     </div>-->
     
     <div class="product" ><strong>บทนำ:</strong><br />
       <textarea name="topicEn" cols="125" rows="5" id="topicEn" style="width:500px;"><?=$topicEn?></textarea>
      </div>
     
     
      <div class="product" ><strong>รายละเอียด:</strong><br />
        <textarea name="detailEn" cols="125" rows="30" id="detailEn" style="width:500px;"><?=$detailEn?></textarea>
      </div>
   </div>
   
   
   
   
   <!--<div id="tabs-3" style="width:730;margin:0px 100px 0 100px;border-right:solid 1px #FFA74F;border-bottom:solid 1px #FFA74F;border-left:solid 1px #FFA74F" >
 
      <div class="product" ><strong>เรื่อง:</strong> <br />
        <input name="titleJp" type="text" class="input_product" id="titleJp" style="margin:5px 0;width:600px" maxlength="200" value="<?=$titleJp?>"/>
     </div>
     
     <div class="product" ><strong>บทนำ:</strong><br />
       <textarea name="topicJp" cols="125" rows="5" id="topicJp" style="width:500px;"><?=$topicJp?></textarea>
      </div>
     
     
      <div class="product" ><strong>รายละเอียด:</strong><br />
        <textarea name="detailJp" cols="125" rows="30" id="detailJp" style="width:500px;"><?=$detailJp?></textarea>
      </div>
   </div>-->


  
    <p>
  <center>
    <input type="submit" value="บันทึกข้อมูล"  /><input type="reset" value="คืนค่าเดิม"/>
  </center>  
</p>

  </form>
</div>
