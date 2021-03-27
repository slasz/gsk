<?php

if($_POST['Delete']!="") {

$id_array=$_POST['id_array'];
$sorter=$_POST['sorter'];
$page=$_GET['page'];

if(sizeof($sorter)>0){
	foreach($sorter as $r=>$d){
	//echo "$r=>$d<br/>";
		if(!empty($d) && $d>0){
			mysql_query("update banner set sorter=".$d." where id=".$r);
		}
	}
}

for ($i=0;$i<count($id_array);$i++ )  
  {
  
$id = $id_array[$i];
//echo " Delete ID  = ".$id."<br>";
	$sql="select *  from  banner where id=$id  "; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$p0=$row['p0'];

	
	@unlink ("../upload/bannerright/$p0");
	
	}
////////////////////////////////
for ($i=0;$i<count($id_array);$i++ )  
  {
$id = $id_array[$i];

	$sql="delete  from  banner where id=$id  "; 
	$result=mysql_query($sql);
	}
if($result) {
	echo "<center><h2>Update Success</h2></center>";
			  echo "<script>setTimeout(\"self.location='?p=branner/index'\",2000);</script> ";
	exit();
	
	} else {
	echo "<center><h2></h2></center>";
			  echo "<script>setTimeout(\"self.location='?p=branner/index'\",0);</script> ";
			 exit();
		}

}


		$start=0;
		$limit=10;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		$sql="select * from banner";
		$q=mysql_query($sql);
		$num=mysql_num_rows($q);
		$page=ceil($num/$limit);
		$sql.=" order by position asc , sorter asc limit $start,$limit";
		
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		$msg=$num;
		
		
		
		
		
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt1">
          <tr>
            <td><div align="right"><span class="txt02">ทั้งหมด&nbsp; <?php echo $page;?> &nbsp;หน้า &nbsp;
              ปัจจุบันหน้าที่&nbsp;&nbsp;
                              <script  language="JavaScript" type="text/javascript">
						                  </script>
                </span>
                    <script  language="JavaScript" type="text/javascript">  <!--
							function gotoPage(p){								
								var sta=<?php echo $limit;?>;
								var start=sta*(p-1);
								location="?p=branner/index&page="+p+"&start="+start;
							}
							
						-->
						                      </script>
                    <select name="selPage" id="selPage" onchange="gotoPage(this.value);">
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
            </div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><div align="left">
            <p class="txt1"><strong><a href='?p=branner/form'>เพิ่ม Banner</a></strong><br>          </p>
          <form name="form1" method="post" ACTION="<?php echo $_SERVER["php_self"]; ?>">
              <table width="600" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" class="txt1">
                <tr >
                  <td width="26" >&nbsp;ID </td>
                 <!-- <td width="300" >ชื่อ</td>-->
                  <td>ภาพ</td>
                  <td width="22" ><div align="center">ลบ</div></td>
                  <td width="22" ><div align="center">จัดลำดับ</div></td>
                  <td width="41" ><div align="center">แก้ไข</div></td>
                </tr>
                <?php  $n=1;
 while($row=mysql_fetch_array($query)) 
 {

	?>
                <tr bgcolor="#FFFFFF">
                  <td width="26" bgcolor="#F8F8F8" class="text3"><div align="center"><font size="2" class="FontThai"><?php echo $row['id'];?> </font></div></td>
                <!--  <td width="300" bgcolor="#F8F8F8" ><?php//echo $row['name'];?></td>-->
                  <td width="185" bgcolor="#F8F8F8" ><img src="../upload/bannerright/<?=$row['p0'];?>" border="0" width="400">
			</td>
                  <td width="22" bgcolor="#F8F8F8"><div align="center"><font color="#FFFFFF" size="2">
                      <input type="checkbox" name="id_array[]" value="<?php echo $row['id']; ?>">
                  </font></div></td>
                  <td width="22" bgcolor="#F8F8F8"><div align="center"><font color="#FFFFFF" size="2">
                      <input type="text" name="sorter[<?=$row['id']?>]" value="<?php echo $row['sorter']; ?>" style="padding:0;margin:0;width:30px;">
                  </font></div></td>
                  <td width="41" bgcolor="#F8F8F8"><div align="center"><font color="#FFFFFF" size="2"><a href="?p=branner/form&id=<?php echo $row['id']; ?>" class='ui-widget-header  ui-corner-all' style='padding:1px;'> Edit </a></font></div></td>
                </tr>
                <?php
   $n++;
   
   } ?>
              </table>
            <br>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="t1" align="right">
                <tr>
                  <td class="txt1"><?php
 
  // }
/*    	for($i=1;$i<=$num_pages;$i++)
				  {
		                if($i != $page) {
                            echo " หน้า<a href=\"$PHP_SELF?page=$i\"> $i </a> |";
				   }
					else {
				   echo "หน้า <b>$i </b>|"; 
				}
}*/
  ?></td>
                </tr>
              </table>
              <center style='margin:20px;'>
                <input name="Delete" type="submit" id="Delete" value="Update">
              </center>
              
          </form>
          </div></td>
      </tr>
    </table>