<style type="text/css">

.tblrow{list-style:none;padding:0;margin:0;}

.tblclm{float:left;}

.mover{ background-color:#FFFFCC}

.mout{ background-color:#ffff66}

.mover2{ background-color:#ffffff}

.mout2{ background-color:#dddddd}

</style><? 

		function youtubeclip($clips){

			$linked = str_replace("http://","",$clips);

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

		$postclips=isset($_POST['clips'])? $_POST['clips']:"";
		
		$postclipshow=isset($_POST['showindex'])? $_POST['showindex']:"";

	

		$cliped=(!empty($postclips))? youtubeclip($postclips):"";

		$del=isset($_POST['del'])? $_POST['del']:"";
		
		//$showindex=isset($_POST['showindex'])? $_POST['showindex']:"";
		$sid=isset($_POST['sid'])? $_POST['sid']:"";
		

		$buttonSave=$_POST['btn1'];
		
		

		

		
		if((!empty($del))&&sizeof($del)>0){

			foreach($del as $dind=>$dval){

				$delrows.=($dind==0)? "":",";

				$delrows.="$dval";
				echo $delrows;
exit();
			}

			$qry1=mysql_query("delete from clipvdo where id in(".$delrows.")");

			echo "<script>location='?p=clip/index';</script>";

		}

		
			
			
			
			if((!empty($sid))&&sizeof($sid)>0){
			
			mysql_query("update clipvdo set  showindex='n' where id > 0 ");

			foreach($sid  as $sind=>$sval){

				$srows.=($sind==0)? "":",";

				$srows.="$sval";


			}

			$qry1=mysql_query("update clipvdo set  showindex='y' where id in(".$srows.")");

			echo "<script>location='?p=clip/index';</script>";

		}


		

		

		if(!empty($buttonSave) && $buttonSave=="Save" && !empty($postclips)){

			$qry1=mysql_query("insert into clipvdo (clips,showindex)  values('".$cliped."','".$postclipshow."')");

			echo "<script>location='?p=clip/index';</script>";

		}else if(!empty($buttonSave) && $buttonSave=="Edit" && !empty($postclips)){

			$qry1=mysql_query("update clipvdo set clips='".$cliped."',showindex='".$postclipshow."' where id=".$postclipid);

			echo "<script>location='?p=clip/index';</script>";

		}else{

$sqltxt="select id,clips,showindex from clipvdo where id>0";

//$sqltxt.=(!empty($getcate))? " and cate='".$getcate."' ":"";

$sql=mysql_query($sqltxt)or die(mysql_error());

if($sql && mysql_num_rows($sql)>0){

	$result="<div class='ui-state-default  ui-corner-all' style='margin:1px 0'>";

		

		while(list($clipid,$clipname,$clipshow)=mysql_fetch_array($sql)){
	
	
	//$clipshow2=($clipshow=='y')?"<img src=../images/icon/true.gif>":""; 
	$cs=($clipshow=='y')?"checked":""; 

			$result.=

				 "<table style='font-size:12px' width='100%'  cellpadding='0' cellspacing='0' border='0'><tr class='mover'   onmouseover=\"this.className='mout';\" onmouseout=\"this.className='mover';\">

				 <td  style='width:5%;height:30px;padding-left:10px;'><input type='checkbox' name='del[]' value='".$clipid."'></td>

				  <td  style='width:70%'>".$clipname."</td>
				  
				  <td  style='width:10%;' align='center'><input type='radio' name='sid[]' value='".$clipid."' ".$cs." ></td>
				
				  <td  style='width:15%;padding-left:20px;'>

				  <a href='clip/form.php?cpid=".$clipid."&cpname=".$clipname."&cpshow=".$clipshow."' rel='facebox'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>???????????????</a>

				  <a href='clip/views.php?urlclip=".$clipname."' onClick=\"NewWindow(this.href,'name','585','335','yes','');return false;\"  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>??????????????????</a></td></tr></table>";

				

		}

	$result.="</div>";

}
}
/*else{$result="";}

			

		}

		

$cliparray=array("hom"=>"Home","prd"=>"Product","act"=>"Activitie");

	$opt="<select id='c1' >

		<option value='' onclick=\"javascript:location='?p=clip/index';\">????????????????????????????????????</option>

	";

	foreach($cliparray as $ind=>$val){

		$sel=($getcate==$ind)? "selected":"";

		$opt.="<option value='".$ind."' $sel onclick=\"javascript:location='?p=clip/index&getcate=$ind';\">".$val."</option>";

	}*/

	$opt.="</select>";

	

?>

<form name="frm" method="post" enctype="multipart/form-data">



<div style="border:solid 0px #666666;padding:20px;margin:5px 0x;">

        <h3><a href="clip/form.php" rel="facebox">Add Clip Vdo</a>
        <!--<label class="title" style="margin:0 0 0 50px">????????????????????????:</label>--><? //=$opt?></h3>


<div style="height:28px">&nbsp;

	<ul class="tblrow" style="position:absolute;margin:-13px 0 0 0px;font-size:15px;font-weight:normal;">

    	<li class="tblclm" style="width:60px">&nbsp;</li>

        <li class="tblclm" style="width:630px">?????????????????????????????????</li>

        <li class="tblclm" style="width:100px">?????????????????????????????????</li>

        <li class="tblclm" style="width:100px; padding-left:30px;">??????????????????????????????</li>

    </ul>



</div> <?=$result?>   

  <div style="padding:20px 0 0 50px;clear:both">  

  		<input type="submit" name="btn1" value="Save" />     

  </div>

  

  </div>



	

</form>