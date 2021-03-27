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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    <td class="Topic">Youtube</td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
      
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
$limit = '100'; // แสดงผลหน้าละกี่หัวข้อ
$Qtotal = mysql_query("select id,clips from clipvdo where id>0  "); //คิวรี่ คำสั่ง
$total = mysql_num_rows($Qtotal); // หาจำนวน record	



echo"<table  cellspacing='0' border='0' align='left' style='margin:5px 5px 5px 5px;'  >
<tr valign='top'>";
$a=0;


			
				   $sql=mysql_query(" select id,clips,nameclip from clipvdo where id>0 order by sorter asc, id desc limit $start,$limit   ");


while($r=mysql_fetch_array($sql))
//for($i=1;$i<=3;$i++)
{
	$id=$r['id'];


	$clipname=$r['clips'];
	$cname=substr($clipname,33,11);
	$nameclip=$r['nameclip'];

	  
/*	$p=mysql_query("select * from sales_pic where main_id='$id' and picture like '%_0.%'");
	$nums=mysql_num_rows($p);*/

	if(($a % 3) == 0 && $a != 0) echo "</tr><tr>";
	echo "<td align='left' valign='top' style=' border-bottom:#CCCCCC 1px dashed ; padding:10px 0px;' >";

	
	
if(!empty($p0)) {
		
			$pic="<img src='upload/promotions/".$p0."' width='300'  />";
			} else {
			$pic="";}
	
?>
                  <link rel="stylesheet" href="colorbox/colorbox.css" />
	
		<script src="colorbox/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:800, innerHeight:600});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script> 
         
                  <table width="380" align="left" border="0" cellpadding="0" cellspacing="0"  class="txt13" style=" padding:7px; margin:2px 0px; border:#CCCCCC 0px solid ; border-radius:5px;">
                    <tr>
                      <td valign="middle" class="txtWhith13" style="padding:00px 0px;">
                      
                      <p><a href="http://www.youtube.com/embed/<?=$cname;?>?rel=1" class="youtube">
             <img src="https://img.youtube.com/vi/<?=$cname;?>/0.jpg" style="width:100%;">
             
             </a></p>
             <p><?=$nameclip;?></p>
                      
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


