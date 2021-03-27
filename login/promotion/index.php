
<style type="text/css">
.tblrow{list-style:none;}
.tblclm{float:left;}

</style>














<? 

$get=$_GET['status'];






if(!empty($get)){


		$start=0;
		$limit=10;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		$sql="select * from promotion where status='$get' order by proid";
		$q=mysql_query($sql);
		$num=@mysql_num_rows($q);
		$page=ceil($num/$limit);
		$sql="select proid,topicTh,numS,status,hot,showindex,p0 from promotion where status='$get' order by numS asc limit $start,$limit";

		
} else {

$start=0;
		$limit=10;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		$sql="select * from promotion where  order by proid";
		$q=mysql_query($sql);
		$num=@mysql_num_rows($q);
		$page=ceil($num/$limit);
		$sql="select proid,topicTh,numS,status,hot,showindex,p0 from promotion order by numS asc limit $start,$limit";
}
$query=mysql_query($sql);
$rcount=mysql_num_rows($query);
if($rcount>0){
	$result="<div class='ui-state-default  ui-corner-all' style='margin:1px 0'>";
		while(list($proid,$topicTh,$numS,$status,$hot,$showindex,$p0)=mysql_fetch_array($query)){
	$p0=(!empty($p0))?"<img src='../upload/promotions/$p0' width='120'/>":""	;
		
		if($status=='n'){
$cate="News";
} else if($status=='s'){
$cate="Service";
} else if($status=='p'){
$cate="Promotion";
} else if($status=='e'){
$cate="Event";
}
	
	$icon=($hot=='y')?"<img src='../images/icon/icon_hot.gif' />":"";
	$icon2=($showindex=='y')?"<img src='../images/icon/showindex.gif' />":"";
	
	
	$topicTh=strip_tags($topicTh);
	
			$result.=
				 "<table  style='font-size:12px;margin:2px 0'><tr >
				 <td  style='width:80px'; padding-left:10px;' >
				
				 <input type='checkbox' name='del' value='$proid'>"."&nbsp;&nbsp;&nbsp;&nbsp;"."$icon </td>"

				."<td valign='top' style='width:350px'>$p0 &nbsp;&nbsp; $icon2 <br />$topicTh
</td>"
				
				."<td valign='top' style='width:200px'>$cate</td>"
				
				."<td valign='top' style='width:200px'><input type='text' maxlength='5' style='width:30px' name='numS' value='".$numS."' /></td>"
		
				."<td valign='top' style='width:90px'><a href='?p=promotion/form&id=$proid&status=$status'  class='ui-widget-header  ui-corner-all' style='padding:1px;margin'>Edit</a></td></tr></table>";
		$opt="";
		$img="";
		}
	$result.="</div>";
}
?>
<div class="ui-widget"  style="margin:1px 8px; padding: 0 .7em;" >

<?
if(!empty($get)){

echo "<h3><a href='?p=promotion/form&status=$get'>Add </a></h3>";

} else {}
?>





<div align="right"><span class="txt02">Total &nbsp; <?php echo $page;?> &nbsp;page   &nbsp;Current Page &nbsp;&nbsp;
                      <script  language="JavaScript" type="text/javascript">
						                  </script>
                          </span>
                              <script  language="JavaScript" type="text/javascript">  <!--
							function gotoPage(p){								
								var sta=<?php echo $limit;?>;
								var start=sta*(p-1);
								location="administrator.php?p=promotion/index&status=<?=$get;?>&page="+p+"&start="+start;
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








<form method="post" name="frm"  >


<div >&nbsp;
	<ul class="tblrow" style="margin:3;width:940px;font-size:14px">
    	<li class="tblclm" style="width:80px" >Delete</li>
        <li class="tblclm" style="width:350px">Head line</li>
         <li class="tblclm" style="width:200px">Category</li>
        <li class="tblclm" style="width:200px">Sort</li>
        <li class="tblclm" style="width:90px">Tools</li>
    </ul>
</div>
<?=$result?>
<center style="margin:20px">
 
<input type="button" name="btn" value="Save" onclick="if(updatepromotion('Promotion','saveform.php',displaymain)==true){alert('บันทึกเรียบร้อยค่ะ');self.location='administrator.php?p=promotion/index&status=<?=$get?>';} "/>
</center>
</form>
</div>