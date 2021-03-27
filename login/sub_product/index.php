<style type="text/css">
.tblrow{list-style:none;}
.tblclm{float:left;}

.top {
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	background-color: #FF9933;
	border:2px solid #FF6600;
	-moz-border-radius: 7px;-webkit-border-radius:7px;
	
}
</style>

<?
$getmid=isset($_GET['mid'])? $_GET['mid']:$_POST['mid'];
$qrycate=mysql_query("select m_id,m_country from m_branch")or die(mysql_error());
if($qrycate && mysql_num_rows($qrycate)>0){
		while(list($m_id,$m_country)=mysql_fetch_array($qrycate)){
			$selcat[title]=$m_country;
			$selcat[selected]=($m_id==$getmid)? "selected":"";
			$selCate.="<option value='".$m_id."' $selcat[selected]>".$selcat[title]."</option>";
		}
		
}

$ll=!empty($getmid)?"&mid=$getmid":"";









		$start=0;
		$limit=15;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		
		$sql="select s_id,s_country,s_map,s_mail,s_flag,s_pic,s_sorter,main_id from s_branch  where s_id>0 ";

		$sql.=!empty($getmid)? " and main_id=".$getmid : "";
			$q=mysql_query($sql);
			$num=@mysql_num_rows($q);
			$page=ceil($num/$limit);
?>

<div class="ui-widget"  style="margin:1px 8px; padding: 10px;">
<input type="button" value="Add Sub Branch" onclick="javascript:location='?p=sub_product/form<?=$ll;?>';" />
<div align="right" style="margin:10px 0">

<label style="float:left">Search by <select id="main_id" name="main_id" style="font-size:13px" onchange="location='?p=sub_product/index&mid='+this.value;"><option value="">Category</option><?=$selCate?></select></label>


<span class="txt02">Total&nbsp; <?php echo $page;?> &nbsp;page &nbsp;Current Page&nbsp;&nbsp;</span>
<script  language="JavaScript" type="text/javascript">  <!--
function gotoPage(p){								
	var sta=<?php echo $limit;?>;
	var start=sta*(p-1);
	location="administrator.php?p=sub_product/index&mid=<?=$getCat?>&page="+p+"&start="+start+"&search[code]=<?=$avsrc['code']?>&search[name]=<?=$avsrc['name']?>";
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
                              

                            </div>










<!--<div style="height:28px">&nbsp;
	<ul class="tblrow" style="position:absolute;margin:-13px 0 0 0px;width:935px">
    	<li class="tblclm" style="width:60px">ลบ</li>
        <li class="tblclm" style="width:100px">&nbsp;</li>
        <li class="tblclm" style="width:450px">ชื่อบริการ</li>
        <li class="tblclm" style="width:200px">
        	<ul class="tblrow" style="padding:0;margin:0;">
            	<li class="tblclm" style="width:90px">ลำดับ</li>
                <li class="tblclm" style="width:90px">แสดงหน้าแรก</li>
            </ul>
        </li>
        <li class="tblclm" style="width:90px">เครื่องมือ</li>
    </ul>

</div>
-->





<form method="post" name="frm" ><!--action="saveform.php" onsubmit="return confirm('Sure')"-->
<? //=$result?>



<div style="height:28px">

<table width="100%" border="0" cellpadding="7" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FF9900" class="top" >
    <td width="4%" align="center">Delete</td>
    <td width="6%" align="center">Sort</td>
    <td width="43%" align="center">Sub Branch</td>
    <td width="25%" align="center">Country</td>
    <td width="22%" align="center">Tools</td>
  </tr>
  
  
  <? 


		$sql.=" order by s_sorter asc  limit $start,$limit";
		$query=mysql_query($sql)or die(mysql_error());

while(list($s_id,$s_country,$s_map,$s_mail,$s_flag,$s_pic,$s_sorter,$main_id)=mysql_fetch_array($query)){



 
	$cc=mysql_fetch_array(mysql_query("select m_id,m_country,m_flag from m_branch where m_id='$main_id' "));

	 
	 $catename=$cc['m_country'];
	 $fl=(!empty($cc['m_flag']))?"<img src='../upload/flag/".$cc['m_flag']."' style='border:1px solid #d7d7d7; width:27px; height:18px;' />":"";
?>
  
  <tr bgcolor="#F7F7F7">
    <td align="center"><input type='checkbox' name='del' value="<?=$s_id;?>"></td>
    <td align="center"><input type='text' maxlength='5' style='width:30px' name='s_sorter' value="<?=$s_sorter;?>" /></td>
    <td><?=$s_country;?></td>
    <td align="center">
	
    <table width="200" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td width="60" align="left"><?=$fl;?></td>
    <td align="left"><?=$catename;?></td>
  </tr>
</table>
    
    
	</td>
    <td align="center">
    
    <a href='?p=sub_product/form&id=<?=$s_id;?>'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>Edit</a>    </td>
  </tr>
  
 <? }?> 
  
  
  <tr>

    <td colspan="5">
    
    <center style="margin:20px">
  
<input type="button" name="btn" value="Save" onclick=
"if(updateproductS('S_Branch','saveform.php',displaymain)==true){alert('บันทึกเรียบร้อยค่ะ');self.location='administrator.php?p=sub_product/index<?=$ll;?>';} "/>
</center></td>
    </tr>
</table>

</div>



</form>
</div>