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



		$start=0;
		$limit=15;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		
		$sql="select m_id,m_country,m_map,m_mail,m_flag,m_pic,m_sorter from m_branch  where m_id>0 ";


			$q=mysql_query($sql);
			$num=@mysql_num_rows($q);
			$page=ceil($num/$limit);
?>

<div class="ui-widget"  style="margin:1px 8px; padding: 10px;">
<input type="button" value="Add Main Branch" onclick="javascript:location='?p=product/form&catid=<?=$getCat;?>';" />
<div align="right" style="margin:10px 0">


<span class="txt02">Total &nbsp; <?php echo $page;?> &nbsp; page &nbsp;Current Page&nbsp;&nbsp;</span>
<script  language="JavaScript" type="text/javascript">  <!--
function gotoPage(p){								
	var sta=<?php echo $limit;?>;
	var start=sta*(p-1);
	location="administrator.php?p=product/index&page="+p+"&start="+start+"&search[code]=<?=$avsrc['code']?>&search[name]=<?=$avsrc['name']?>";
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
    <td width="5%" align="center">Delete</td>
    <td width="6%" align="center">Sort</td>
    <td width="49%" align="center">Country</td>
    <td width="40%" align="center">Tools</td>
  </tr>
  
  
  <? 


		$sql.=" order by m_sorter asc  limit $start,$limit";
		$query=mysql_query($sql)or die(mysql_error());

while(list($m_id,$m_country,$m_map,$m_mail,$m_flag,$m_pic,$m_sorter)=mysql_fetch_array($query)){

?>
  
  <tr bgcolor="#F7F7F7">
    <td align="center"><input type='checkbox' name='del' value="<?=$m_id;?>"></td>
    <td align="center"><input type='text' maxlength='5' style='width:30px' name='m_sorter' value="<?=$m_sorter;?>" /></td>
    <td><?=$m_country;?></td>
    <td align="center">
    
    <a href='?p=product/form&id=<?=$m_id;?>'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>Edit</a>&nbsp;
    
    <a href='?p=sub_product/index&mid=<?=$m_id;?>'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>Sub Branch</a>&nbsp;
    
    <a href='?p=news/index&mid=<?=$m_id;?>'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>Organization chart & staff setting</a>    </td>
  </tr>
  
 <? }?> 
  
  
  <tr>
    <td colspan="4">
    
    <center style="margin:20px">
  
<input type="button" name="btn" value="Save" onclick=
"if(updateproduct('M_Branch','saveform.php',displaymain)==true){alert('Save Complete');self.location='administrator.php?p=product/index';} "/>
</center>

</td>
    </tr>
</table>

</div>



</form>
</div>