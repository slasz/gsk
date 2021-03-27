<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');


$id=$_GET['id'];
//$id=($id=="Greeting")?"Greeting from president":$id;
if($id=="Greeting"){
$Topic="Greeting from president";
} else if ($id=="Milestone") {
$Topic="Milestone";
$page_id='1';
} else if ($id=="Sales") {
$Topic="Sales Turnover";
$page_id='2';
} else if ($id=="Electronics") {
$Topic="Electronics Division";
$page_id='3';
} else if ($id=="IPO") {
$Topic="IPO Division";
$page_id='4';
} else if ($id=="Branch") {
$Topic="Branch Offices";
}






	$sqlA=mysql_fetch_array(mysql_query(" select * from messageweb where id='$page_id'"));
		
	
	$aboutTh=$sqlA['aboutTh'];
	

	$aboutTh=stripslashes($aboutTh);
	$aboutTh=str_replace("../","",$aboutTh);
	$p0=$sqlA['p0'];
	
	
	$pic=(!empty($p0))?"<img src=\"upload/page/$p0\" width='100%'/>":"";
	
	$picE=(!empty($p0))?"<img src=\"upload/page/$p0\" width='359'/>":"";





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
     <td align="center"><img src="images/banner/<?=$id;?>.jpg" /></td>
   </tr>
   
   <tr>
     <td align="center">
     
     
     <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="Topic"><?=$Topic;?></td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<? 
	if($id=="Milestone"){
	call_user_func("Milestone",$id,$aboutTh,$pic); 
	} else if($id=="Greeting"){
	call_user_func("Greeting",$id); 
	} else if($id=="Sales"){
	call_user_func("Sales",$id,$aboutTh,$pic); 
	} else if($id=="Electronics"){
	call_user_func("Electronics",$id,$aboutTh,$pic,$picE); 
	} else if($id=="IPO"){
	call_user_func("IPO",$id,$aboutTh,$pic); 
	} else if($id=="Branch"){
	call_user_func("Branch",$id); 
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


	
	



function showyear($year){

$sql=mysql_query("select * from promotion where status='n' group by n_year order by n_year desc ");
while ($y=mysql_fetch_array($sql)){
$yy=$y['n_year'];

$display=($year==$yy)?" font-weight:bold;":"";

echo "<li style='border-bottom:1px #ccd4d7 solid; list-style:none; padding:3px 0px;'><a href='?year=$yy' style='color: #535455; text-decoration:none; $display'>$yy</a></li>";
		}}

function Milestone($id,$aboutTh,$pic){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?=$pic;?></td>
  </tr>
</table>

<? }

function Greeting($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
  <tr>
    <td width="70%" style="padding:0px 20px; text-algn:left;" align="left">
<p>GSK celebrated  its 20th Anniversary in 2015. I would like to take  this opportunity to thank all our valued customers, business partners and  supporters for their continuous support, patronage and the confidence in our  products and services. This has inspired us to extend the best of our services  and enables us to focus on customers’ satisfaction as a total solution  provider.</p>
<p>I am also  thankful to our devoted employees for their unwavering support. Their  efficiency and readiness at addressing to the needs of our customers enable us  to grow steadily.</p>
<p>GSK did not  employ Japanese employee to run overseas Branch offices, instead we believe in  entrusting this role to the local, younger generations whom are driven by their  new innovative thinking; this will enable them to run the business more  effectively and efficiently. As a result, this was proven in our achievements by  continuing to grow steadily.  Within the  first ten years from our office set up in Singapore in 1995, we managed to establish  11 branch offices across 8 countries. Since then, our sales continued to grow  progressively for the next ten years. </p>
<p>In the recent years,  understanding the vulnerability of low profit margin product lines and huge  cash outlay, we tweaked to change our business strategies and discontinued such  businesses. As such we are able to achieve very healthy  financial status, even though sales amount will be much lower for the initial  years. </p>
<p>With our current stable financial health and  a pool of experienced and committed staffs, we are confident in establishing stronger  ties with both Suppliers and Customers over the coming 10 years and more. </p>
<p>We plan to achieve a more conducive work  environment as we believe that an employee with work-life balance will be a  motivated and committed contributor who can deliver their best to the company.</p>
<p>As we reached 20th Anniversary, the experience that we gained was immensely valuable.&nbsp;We will continue to strive to  improve our service level and we look forward to your continued patronage. </p>
<p>Lastly, thanks to all our well-wishes who  have contributed to the growth of our organization.</p>
<p><strong>S.  Komatsu </strong><br>
  <strong>President</strong></p>

</td>
    <td width="30%" align="right"><img src="images/Greeting.jpg" width="328" height="402"></td>
  </tr>
</table>


<? }

function Sales($id,$aboutTh,$pic){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?=$pic;?></td>
  </tr>
</table>

<? }

function Electronics($id,$aboutTh,$pic,$picE){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" style="padding:0px 20px; text-algn:left;" align="left">
    
    <?=$aboutTh;?>
    
    
    </td>
  </tr>
  
    <tr>
    <td width="800" style="padding:0px 5px; text-algn:left; border:0px solid #e4e4e4;" align="left">
    
    
   
   
   
   
   
   
   
   
   
   
  


        
        <? 





echo"<table width='100%' cellspacing='0' border='0' align='left' style='margin:5px 0px 5px 0px;'  >
<tr valign='top'>";
$a=0;


			
				   $sql=mysql_query(" select id,picname,custname,sorter from gallery_cust where promotion_id='4' order by sorter asc, id desc");


while(list($gid,$gname,$custname,$sorter)=mysql_fetch_array($sql)){
//for($i=1;$i<=3;$i++)


	  
/*	$p=mysql_query("select * from sales_pic where main_id='$id' and picture like '%_0.%'");
	$nums=mysql_num_rows($p);*/

	if(($a % 5) == 0 && $a != 0) echo "</tr><tr>";
	echo "<td align='left' valign='top' style=' border-bottom:#CCCCCC 0px dashed ; padding:5px 0px;' >";

	
	
if(!empty($gname)) {
		
			$picC="<img src='upload/customer/".$gname."' width='150' height='50'  />";
			} else {
			$picC="";}
	
?>
                
         
                  <table width="150" align="center" border="0" cellpadding="0" cellspacing="0"  class="txt13" >
                    <tr>
                      <td valign="middle" class="txtWhith13" style="padding:00px 0px; height:65px;">
                      
                     <?=$picC;?>
                   
                     
                      
                      </td>
                    </tr>
                     <tr>
                      <td valign="middle" align="center" class="txtWhith13" style="padding:00px 0px; background:#cfcfcf; height:50px;">
                      
                     
                     <strong><?=$custname;?></strong>
                     
                      
                      </td>
                    </tr>
         
                  </table>

                  

                <?
	echo "</td>";
	$a++;
}
echo"</tr></table>";
?>       

   
 </td>
    <td width="369" style="padding:0px 0px; border:0px solid red; text-algn:left;" align="left">
    
    
    <?=$picE;?>
    
    </td>
  </tr>
  
</table>

<? }

function IPO($id,$aboutTh,$pic){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  align="left">
  <tr>
    <td style="padding:0px 20px; text-algn:left;" align="left">
    <?=$aboutTh;?>
    <?=$pic;?>
    </td>
  </tr>

  
</table>

<? }

function Branch($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/Branch.jpg" border="0" usemap="#Map" /></td>
  </tr>
</table>




<map name="Map" id="Map">
  <area shape="poly" coords="535,500" href="#" /><area shape="poly" coords="544,555" href="#" /><area shape="rect" coords="549,495,738,574" href="branch.php?mid=1" />
<area shape="rect" coords="876,153,1069,209" href="branch.php?mid=2" />
<area shape="rect" coords="409,280,669,331" href="branch.php?mid=3" />
<area shape="rect" coords="339,466,495,541" href="branch.php?mid=4" />
<area shape="rect" coords="192,372,441,408" href="branch.php?mid=5" />
<area shape="rect" coords="472,213,666,249" href="branch.php?mid=6" />
<area shape="rect" coords="659,612,890,673" href="branch.php?mid=7" />
<area shape="rect" coords="518,385,700,458" href="branch.php?mid=8" />
</map>

<? }
?>





