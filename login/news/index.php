<?php
session_start();
include('../includes/connect.php');
include('../includes/pejfunction.php');

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


if(!empty($_POST['Update'])) {

$page=$_GET['page'];
$itemid=$_POST[itemid];

$id_array=$_POST['id_array'];
if(sizeof($id_array)>0){
 $result = call_user_func("delete_dbN",$id_array,"news","news/images");
}


$sort_array=$_POST['sort_array'];
if(sizeof($sort_array)>0){
 $result = call_user_func("update_db_sort",$sort_array,"news");
}

	
	
if($result) {
	echo $ok;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=?p=news/index$ll\"> ";
	exit();
	
	} else {
	echo $error;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=?p=news/index$ll\"> ";
			 exit();
		}

}








$start=0;
		$limit=20;
		if(isset($_GET['start']))
		$start=$_GET['start'];
		
		$sql="select * from news  where id>0 and main_id='$getmid'  ";
		
		
		$q=mysql_query($sql);
		$num=@mysql_num_rows($q);
		$page=ceil($num/$limit);
		
		$sql.=" order by sortder  limit $start,$limit";

		$query=mysql_query($sql);



		

		
	
	
	
	
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? include_once("plugin.php"); ?>
<link href="../style/textadmin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/function.js"></script>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//--
</script>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="width:100%;height:100%;border:solid 1px #ccc">
      <tr>
        <td valign="top"><div align="left">
          <form name="form1" method="post" ACTION="<?php echo $_SERVER["php_self"]; ?>">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" class="txt1">
               
              <? if ($mark=="s") { } else {?>
                <tr >
                  <td colspan="6" ><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt1">
          
                    <tr>
                      <td width="52%" height="40">
                     
                      <a href="?p=news/form<?=$ll;?>" style="font-size:14px; font-weight:bold; padding:5px 10px; background:#F4F4F4; border:1px #C7C7C7 solid; margin:5px;-moz-border-radius: 3px;-webkit-border-radius:3px; "><strong>Add Department</strong>&nbsp;</a>                      </td>
                      <td width="48%"><div align="right"><span class="txt02">Total&nbsp; <?php echo $page;?> &nbsp;page &nbsp;Current Page&nbsp;&nbsp;
                          </span>
      <script  language="JavaScript" type="text/javascript">  <!--
							function gotoPage(p){								
								var sta=<?php echo $limit;?>;
								var start=sta*(p-1);
								location="administrator.php?p=news/index<?=$ll;?>&page="+p+"&start="+start;
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
                      <div align="right"></div></td>
                    </tr>
                    <tr>
                      <td><label style="float:left">Search by <select id="main_id" name="main_id" style="font-size:13px" onchange="location='?p=news/index&mid='+this.value;"><?=$selCate?></select></label></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                
                <? } ?>
                
                
                
                
                
                
                
              <!--<tr >
                  <td width="475" bgcolor="#CCCCCC" >Subject</td>
                  <td width="143" bgcolor="#CCCCCC" ><div align="center">ประเทศ</div></td>
                  <td width="41" bgcolor="#CCCCCC" ><div align="center">ลบ</div></td>
                  <td nowrap="nowrap" bgcolor="#CCCCCC" ><div align="center">เครื่องมือ</div></td>              
				  <td width="62" nowrap="nowrap" bgcolor="#CCCCCC" ><div align="center">ลำดับ</div></td>
              </tr>-->  
                
                
                
                
                
                
                
                
                
                
                
                
                <tr >
                  <td colspan="5">
                  
                  
                  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF" class="txt1">
					
                  <tr >
                  <td width="475" bgcolor="#CCCCCC" >Department</td>
                  <td width="143" bgcolor="#CCCCCC" ><div align="center">Country</div></td>
                  <td width="41" bgcolor="#CCCCCC" ><div align="center">Delete</div></td>
                  <td nowrap="nowrap" bgcolor="#CCCCCC" ><div align="center">Tools</div></td>              
				  <td width="62" nowrap="nowrap" bgcolor="#CCCCCC" ><div align="center">Sort</div></td>
             	  </tr>  
                  
                  
               <!------------------------เริ่ม------------------>   
                  
                 <?php  $n=1;
if($num>0){				
				
 while($row=mysql_fetch_array($query)) 
 {

	?>
                <tr bgcolor="#FFFFFF">
                
                
                  <td width="475" bgcolor="#f7f7f7" >  
  <?php 
		
		$resultTitleTh=strip_tags($row[titleTh]);
		$resultTitleEn=strip_tags($row[titleEn]);
	
	$QtitleTh=mb_substr($resultTitleTh,0,200,"UTF-8");
	$QtitleEn=mb_substr($resultTitleEn,0,200,"UTF-8");	 
	 
	 
	 $news=$row['news'];
	 
	 
	$cc=mysql_fetch_array(mysql_query("select m_id,m_country,m_flag from m_branch where m_id='$getmid' "));

	 
	 $catename=$cc['m_country'];
	 $fl=(!empty($cc['m_flag']))?"<img src='../upload/flag/".$cc['m_flag']."' style='border:1px solid #d7d7d7;' />":"";
	 
				  ?>  
                   <?=$QtitleTh?>				                </td>
                  <td width="143" align="center" valign="top" bgcolor="#efefef"> <table width="200" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td width="60" align="left"><?=$fl;?></td>
    <td align="left"><?=$catename;?></td>
  </tr>
</table></td>
          <td width="41" bgcolor="#efefef" valign="top"><div align="center"><font color="#FFFFFF" size="2">
                  	<input type="hidden" name="itemid[]" value="<?=$row[id]?>" />
                      <input type="checkbox" name="id_array[]" value="<?php echo $row['id']; ?>">
                  </font></div></td>
                  <td width="188" nowrap="nowrap" valign="top" bgcolor="#efefef">
<div align="center">
<font color="#FFFFFF" size="2">
<a href="?p=news/test&id=<?php echo $row['id']; ?><?php echo $ll; ?>"  class='ui-widget-header  ui-corner-all' style='padding:1px;'>Add Staff Photo</a>
<a href="?p=news/form&amp;id=<?php echo $row['id']; ?><?=$ll;?>"  class='ui-widget-header  ui-corner-all' style='padding:1px;'>Edit</a></font></div></td>
                
<!--<td align="center" valign="top" bgcolor="#efefef"><font color="#FFFFFF" size="2">
                    <input type="checkbox" name="display_array[]"  <?=($row['display']=='y')?"checked":"";?> value="<?=$row[id];?>"/>
                  </font></td>-->
                  <td align="center" valign="top" bgcolor="#efefef"><input type="text" maxlength="5" style="width:30px" name="sort_array[<?=$row[id]?>]" value="<?php echo $row['sortder']; ?>" />                  </td>
                </tr>
                
                
               <!----------------ถ้ามีรูปพะกงาน-------------> 
                 
                  
              <!---------------จบ------------>     
                  
                  
                              <?php
   $n++;
   
   } 
   
  } 
   
   ?>
                   <!---------------------จบ--------------->   
                  </table>

                  
                  
                  </td>
                </tr>
                  
                  
            
    
   <tr >
                  <td align="center" colspan="5"><p><input name="Update" type="submit" id="Update" value="Save Data" /></p></td>
   </tr>
            </table>
          
          </form>
          </div></td>
      </tr>
    </table>