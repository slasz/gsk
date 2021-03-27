<style type="text/css">
.tblrow{list-style:none;}
.tblclm{float:left;}

</style>
<? 

		$start=0;
		$limit=15;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		$sql="select * from promotion order by proid";
		$q=mysql_query($sql);
		$num=@mysql_num_rows($q);
		$page=ceil($num/$limit);
		$sql="select proid,titleTh,numS from promotion order by numS asc limit $start,$limit";

		$query=mysql_query($sql);


$rcount=mysql_num_rows($query);
if($rcount>0){
	$result="<div class='ui-state-default  ui-corner-all' style='margin:1px 0'>";
		while(list($proid,$titleTh,$numS,$cate)=mysql_fetch_array($query)){
		
	
			$result.=
				 "<table  style='font-size:12px;margin:2px 0'><tr >
				 <td  style='width:80px'; padding-left:10px;' >
				
				 <input type='checkbox' name='del' value='$proid'></td>"

				."<td valign='top' style='width:350px'>$titleTh</td>"
				
				."<td valign='top' style='width:200px'>$cate2</td>"
				
				."<td valign='top' style='width:200px'><input type='text' maxlength='5' style='width:30px' name='numS' value='".$numS."' /></td>"
		
				."<td valign='top' style='width:90px'><a href='?p=promotion/form&id=$proid'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>แก้ไข</a></td></tr></table>";
		$opt="";
		$img="";
		}
	$result.="</div>";
}
?>
<div class="ui-widget"  style="margin:1px 8px; padding: 0 .7em;" >
<h3><a href="?p=promotion/form">เพิ่มรายการ </a></h3>
<div align="right"><span class="txt02">ข้อมูลทั้งหมด&nbsp; <?php echo $page;?> &nbsp;หน้า &nbsp;
                        ปัจจุบันหน้าที่&nbsp;&nbsp;
                      <script  language="JavaScript" type="text/javascript">
						                  </script>
                          </span>
                              <script  language="JavaScript" type="text/javascript">  <!--
							function gotoPage(p){								
								var sta=<?php echo $limit;?>;
								var start=sta*(p-1);
								location="administrator.php?p=product/index&page="+p+"&start="+start;
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
<div >&nbsp;
	<ul class="tblrow" style="margin:3;width:940px;font-size:14px">
    	<li class="tblclm" style="width:80px" >ลบ</li>
        <li class="tblclm" style="width:350px">หัวข้อ</li>
         <li class="tblclm" style="width:200px"></li>
        <li class="tblclm" style="width:200px">จัดลำดับ</li>
        <li class="tblclm" style="width:90px">เครื่องมือ</li>
    </ul>
</div>

<form method="post" name="frm"  ><!--action="saveform.php" onsubmit="return confirm('Sure')"-->
<?=$result?>
<center style="margin:20px">
<!--	<input type="submit" name="btn" value="บันทึกข้อมูล" />-->    
<input type="button" name="btn" value="บันทึกข้อมูล" onclick="if(updatepromotion('Promotion','saveform.php',displaymain)==true){alert('บันทึกเรียบร้อยค่ะ');self.location='administrator.php?p=promotion/index';} "/>
</center>
</form>
</div>