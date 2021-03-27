<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');


$year=(isset($_GET['year']))? $_GET['year']: date('Y');
$gid=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $keywords;?>">
<meta name="DESCRIPTION" content="<?php echo $description ;?>">
<title><?php echo $title ;?></title>
<link href="css/text.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php include_once("headmenu.php"); ?></td>
  </tr>

  
   <tr>
     <td align="center"><img src="images/banner/news.jpg" /></td>
   </tr>
   
   <tr>
     <td align="center">
     
     
     <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="Topic">News</td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1050" align="left" bgcolor="#96D8ED" class="TopicBoxNews"><img src="images/icon/list2.png" width="7" height="7" /> <?=$year;?></td>
        <td width="5">&nbsp;</td>
        <td width="114" align="center" valign="middle" bgcolor="#96d8ed" class="TopicBoxNews">Year</td>
      </tr>
      <tr>
        <td>
        
        <?
        if (!empty($gid)){
		call_user_func("showSub",$year,$gid); 
		} else {
		call_user_func("showNews",$year); 
		}
		?>
        
        </td>
        <td>&nbsp;</td>
        <td align="center" valign="top">
		<?
        
		call_user_func("showyear",$year); 
		
		?></td>
      </tr>
    </table>
    
    
    
    </td>
  </tr>
</table>

     
     
     </td>
   </tr>

   <tr>
     <td align="center"><?php include_once("footer.php"); ?></td>
  </tr>
</table>

</body>







<?

function showyear($year){

$sql=mysql_query("select * from promotion where status='n' group by n_year order by n_year desc ");
while ($y=mysql_fetch_array($sql)){
$yy=$y['n_year'];

$display=($year==$yy)?" font-weight:bold;":"";

echo "<li style='border-bottom:1px #ccd4d7 solid; list-style:none; padding:3px 0px;'><a href='?year=$yy' style='color: #535455; text-decoration:none; $display'>$yy</a></li>";
		}
}

function showNews($year){  ?>

<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
    <div>


        
        <? 


$page=$_GET['page'];
			$start=$_GET['start'];
			if(!isset($start)){
$start = 0;
}
$limit = '5'; // แสดงผลหน้าละกี่หัวข้อ
$Qtotal = mysql_query("select *   from promotion where status='n' and n_year='$year' "); //คิวรี่ คำสั่ง
$total = mysql_num_rows($Qtotal); // หาจำนวน record	



echo"<table width='100%' cellspacing='0' border='0' align='center' style='margin:5px 5px 5px 5px;'  >
<tr valign='top'>";
$a=0;


			
				   $sql=mysql_query(" select *   from promotion where status='n'  and n_year='$year' limit $start,$limit   ");


while($r=mysql_fetch_array($sql))
//for($i=1;$i<=3;$i++)
{
	$id=$r['proid'];


	$topicTh=$r['topicTh'];
	$detailTh=strip_tags($r['detailTh']);
	
	$date=$r['n_date']."-".$r['n_month']."-".$r['n_year'];
	$y=$r['n_year'];
$p0=$r['p0'];

	  
/*	$p=mysql_query("select * from sales_pic where main_id='$id' and picture like '%_0.%'");
	$nums=mysql_num_rows($p);*/

	if(($a % 1) == 0 && $a != 0) echo "</tr><tr>";
	echo "<td align='center' valign='top' style=' border-bottom:#CCCCCC 1px dashed ; padding:10px 0px;' >";

	
	
if(!empty($p0)) {
		
			$pic="<img src='upload/promotions/".$p0."' width='300'  />";
			} else {
			$pic="";}
	
?>
                  
         
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="txt13" style="margin:2px 0px; border:#CCCCCC 0px solid ; border-radius:5px;">
                    <tr>
                      <td width="100" align="left" valign="middle" class="txtWhith13" style="padding:00px 0px;"><strong><?=$date;?></strong></td>
                      <td width="300" align="left" valign="middle" class="txtWhith13" style="padding:00px 20px;"><a href="?year=<?=$y;?>&id=<?=$id?>" style="color:#FFFFFF; text-decoration:none;"><?=$pic;?></a></td>
                      <td align="left" valign="middle" class="txtWhith13" style="padding:10px 0px;"><strong><?=strip_tags($topicTh);?></strong>                      <p><?=mb_substr($detailTh,0,250,'UTF-8');?>...<a href="?year=<?=$y;?>&id=<?=$id?>" style="text-decoration:none;">(..Read more..)</a></p>
                      </td>
                    </tr>
         
                  </table>

                  

                <?
	echo "</td>";
	$a++;
}
echo"</tr></table>";
?>       
</div>    </td>
  </tr>
</table>


<? }

function showSub($year,$gid){  ?>

<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
    <div>


        
        <? 


$page=$_GET['page'];
			$start=$_GET['start'];
			if(!isset($start)){
$start = 0;
}
$limit = '1'; // แสดงผลหน้าละกี่หัวข้อ
$Qtotal = mysql_query("select *   from promotion where status='n' and n_year='$year' and proid='$gid' "); //คิวรี่ คำสั่ง
$total = mysql_num_rows($Qtotal); // หาจำนวน record	



echo"<table width='100%' cellspacing='0' border='0' align='center' style='margin:5px 5px 5px 5px;'  >
<tr valign='top'>";
$a=0;


			
				   $sql=mysql_query(" select *   from promotion where status='n'  and n_year='$year' and proid='$gid' limit $start,$limit   ");


while($r=mysql_fetch_array($sql))
//for($i=1;$i<=3;$i++)
{
	$id=$r['proid'];


	$topicTh=$r['topicTh'];
	$detailTh=$r['detailTh'];
	$date=$r['n_date']."-".$r['n_month']."-".$r['n_year'];
	$y=$r['n_year'];
$p0=$r['p2'];

	  
/*	$p=mysql_query("select * from sales_pic where main_id='$id' and picture like '%_0.%'");
	$nums=mysql_num_rows($p);*/

	if(($a % 1) == 0 && $a != 0) echo "</tr><tr>";
	echo "<td align='center' valign='top' style=' border-bottom:#CCCCCC 1px dashed ; padding:10px 0px;' >";

	
	
if(!empty($p0)) {
		
			$pic="<img src='upload/promotions/".$p0."' width='100%'/>";
			} else {
			$pic="";}
	
?>
                  
         
               <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="txt13" style="margin:2px 0px; border:#CCCCCC 0px solid ; border-radius:5px;">
                    <tr>
                      <td align="left" valign="middle" style="padding:00px 20px;">
                     <strong>
                        <?=$topicTh;?>
                      </strong>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" style="padding:00px 20px;">
                     <p> <?=$pic;?></p></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" style="padding:00px 20px;"><?=$detailTh;?></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" style="padding:00px 20px;"><span style="padding:10px 0px;"><span style="padding:00px 0px;"><strong>
                        <br>
<?=$date;?>
                      </strong></span></span></td>
                    </tr>
         
                  </table>



                  

                <?
	echo "</td>";
	$a++;
}
echo"</tr></table>";
?>       
</div>    </td>
  </tr>
</table>


<? }




?>


