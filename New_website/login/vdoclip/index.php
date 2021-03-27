<style type="text/css">

.tblrow{list-style:none;padding:0;margin:0;}

.tblclm{float:left;}

.mover{ background-color:#FFFFCC}

.mout{ background-color:#ffff66}

.mover2{ background-color:#ffffff}

.mout2{ background-color:#dddddd}

</style><? 

$getCat=isset($_GET['catid'])? $_GET['catid']:$_POST['catid'];
$qrycate=mysql_query("select catid,th_name,online from category order by th_name")or die(mysql_error());
if($qrycate && mysql_num_rows($qrycate)>0){
		while(list($catid,$thname,$online)=mysql_fetch_array($qrycate)){
			$selcat[title]=$thname;
			$selcat[selected]=($catid==$getCat)? "selected":"";
			$selCate.="<option value='".$catid."' $selcat[selected]>".$selcat[title]."</option>";
		}
		
}

$start=0;
		$limit=15;
		if(isset($_GET['start']))
		$start=$_GET['start'];
	//	$sql="select p.id from products p  order by itemcode";
		
		$sql="select p.id, p.vdo, p.category_id , c.th_name from vdoclip p , category c where p.id>0 and p.category_id=c.catid";
		$sql.=!empty($getCat)? " and p.category_id=".$getCat : "";
	
		
			$q=mysql_query($sql);
			$num=@mysql_num_rows($q);
			$page=ceil($num/$limit);
		$sql.=" order by p.id desc limit $start,$limit";
		//$query=mysql_query($sql)or die(mysql_error());



		function youtubeclip($vdo){

			$linked = str_replace("http://","",$vdo);

			$linked = str_replace("?rel=0","",$linked);

			$linkarry=explode("/",$linked);

			$items=count($linkarry);			

			for($i=1;$i<=$items;$i++){

				$j=$i-1;

				if($i==$items){ $cliped="http://www.youtube.com/v/".$linkarry[$j]."?rel=0"; break;}

			}

			return $cliped;

		}

		$postclipid=isset($_POST['clipid'])? $_POST['clipid']:"";

		$postclips=isset($_POST['vdo'])? $_POST['vdo']:"";
		
		$postclipshow=isset($_POST['category'])? $_POST['category']:"";

	

		$cliped=(!empty($postclips))? youtubeclip($postclips):"";

		$del=isset($_POST['del'])? $_POST['del']:"";

		$buttonSave=$_POST['btn1'];
		
		

		

		
		if((!empty($del))&&sizeof($del)>0){

			foreach($del as $dind=>$dval){

				$delrows.=($dind==0)? "":",";

				$delrows.="$dval";

			}

			$qry1=mysql_query("delete from vdoclip where id in(".$delrows.")");

			echo "<script>location='?p=vdoclip/index';</script>";

		}

		

		

		

		if(!empty($buttonSave) && $buttonSave=="Save" && !empty($postclips)){

			$qry1=mysql_query("insert into vdoclip (vdo,category_id)  values('".$cliped."','".$postclipshow."')");

			echo "<script>location='?p=vdoclip/index';</script>";

		}else if(!empty($buttonSave) && $buttonSave=="Edit" && !empty($postclips)){

			$qry1=mysql_query("update vdoclip set vdo='".$cliped."',category_id='".$postclipshow."' where id=".$postclipid);

			echo "<script>location='?p=vdoclip/index';</script>";

		}else{

//$sqltxt="select vdoclip.id,vdoclip.vdo,vdoclip.category_id,category.th_name from vdoclip,category where vdoclip.category_id=category.catid and id>0";

//$sqltxt.=(!empty($getcate))? " and cate='".$getcate."' ":"";

$sql=mysql_query($sql)or die(mysql_error());

if($sql && mysql_num_rows($sql)>0){

	$result="<div class='ui-state-default  ui-corner-all' style='margin:1px 0'>";

		

		while(list($clipid,$clipname,$clipshow,$cate)=mysql_fetch_array($sql)){
	
	
	$clipshow2=$cate; 

			$result.=

				 "<table style='font-size:12px'  cellpadding='0' cellspacing='0' border='0'><tr class='mover'   onmouseover=\"this.className='mout';\" onmouseout=\"this.className='mover';\">

				 <td  style='width:60px;height:30px;padding-left:10px;'><input type='checkbox' name='del[]' value='".$clipid."'></td>

				  <td  style='width:560px'>".$clipname."</td>
				  
				  <td  style='width:200px;padding-left:80px;'>".$clipshow2."</td>
				
				  <td  style='width:150px;padding-left:20px;'>

				  <a href='?p=vdoclip/form&cpid=$clipid&cpshow=$clipshow'>แก้ไข</a>

				  <a href='vdoclip/views.php?urlclip=".$clipname."' onClick=\"NewWindow(this.href,'name','585','335','yes','');return false;\"  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>ดูคลิป</a></td></tr></table>";

				

		}

	$result.="</div>";

}
}
/*else{$result="";}

			

		}

		

$cliparray=array("hom"=>"Home","prd"=>"Product","act"=>"Activitie");

	$opt="<select id='c1' >

		<option value='' onclick=\"javascript:location='?p=vdoclip/index';\">เลือกทั้งหมด</option>

	";

	foreach($cliparray as $ind=>$val){

		$sel=($getcate==$ind)? "selected":"";

		$opt.="<option value='".$ind."' $sel onclick=\"javascript:location='?p=vdoclip/index&getcate=$ind';\">".$val."</option>";

	}*/

	$opt.="</select>";

	

?>

<form name="frm" method="post" enctype="multipart/form-data">

<div class="ui-widget"  style="margin:1px 8px; padding: 10px;">
<input type="button" value="เพิ่ม VDO" onclick="javascript:location='?p=vdoclip/form';" />
<div align="right" style="margin:10px 0">
<label style="float:left">ค้นหาจาก <select id="catid" name="catid" style="font-size:13px" onchange="location='?p=vdoclip/index&catid='+this.value;"><option value="">หมวดหมู่</option><?=$selCate?></select></label>

<span class="txt02">ข้อมูลทั้งหมด&nbsp; <?php echo $page;?> &nbsp;หน้า &nbsp;ปัจจุบันหน้าที่&nbsp;&nbsp;</span>
<script  language="JavaScript" type="text/javascript">  <!--
function gotoPage(p){								
	var sta=<?php echo $limit;?>;
	var start=sta*(p-1);
	location="administrator.php?p=vdoclip/index&catid=<?=$getCat?>&page="+p+"&start="+start+"&search[code]=<?=$avsrc['code']?>&search[name]=<?=$avsrc['name']?>";
}
-->
</script>
<select name="selPage" id="selPage" onChange="gotoPage(this.value);">
        <?php	
					
  						if($page>0){
								for($i=1;$i<=$page;$i++){ 
										if($i==$_GET['page']){
												echo "<option value='".$i."' selected>".$i."</option>";
										}else{
												echo "<option value='".$i."'>".$i."</option>";
										}
								}
						}else{
								echo "<option value='' selected>-</option>";	
						}
						
							?>
                              </select>


       
        
   <div style="height:28px">&nbsp;    

        

<div style="height:28px" align="left">&nbsp;

	<ul class="tblrow" style="position:absolute;margin:-13px 0 0 0px;font-size:15px;font-weight:normal;">

    	<li class="tblclm" style="width:100px">ลบ</li>

        <li class="tblclm" style="width:525px; margin-left:0px;">ลิงค์วีดีโอ</li>

        <li class="tblclm" style="width:200px">หมวดหมู่&nbsp;&nbsp;&nbsp;&nbsp;</li>

        <li class="tblclm" style="width:100px; margin-left:0px;">เครื่องมือ</li>

    </ul>



</div> <?=$result?>   

  <div style="padding:20px 0 0 50px;clear:both">  

  		<input type="submit" name="btn1" value="Save" />     

  </div>

  


</div>

	

</form>