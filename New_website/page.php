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
} else if ($id=="Sales") {
$Topic="Sales Turnover";
} else if ($id=="Electronics") {
$Topic="Electronics Division";
} else if ($id=="IPO") {
$Topic="IPO Division";
} else if ($id=="Branch") {
$Topic="Branch Offices";
}

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
	call_user_func("Milestone",$id); 
	} else if($id=="Greeting"){
	call_user_func("Greeting",$id); 
	} else if($id=="Sales"){
	call_user_func("Sales",$id); 
	} else if($id=="Electronics"){
	call_user_func("Electronics",$id); 
	} else if($id=="IPO"){
	call_user_func("IPO",$id); 
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

function Milestone($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/Milestone.jpg" /></td>
  </tr>
</table>

<? }

function Greeting($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
  <tr>
    <td width="80%" style="padding:0px 20px; text-algn:left;" align="left"><p><strong>Greeting from President</strong></p>
<p>2015 marks GSK Electronics' 20th year anniversary. We are proud to have established a successful region-wide presence in South-East Asia, 20th year anniversary. We are proud to have established a successful region-wide presence in South-East Asia, regional network and professional accountability.</p>
<p>To reach out to our growing base of regional customers, GSK overseas branch offices have proliferated at a rapid pace over the years. And in order to provide abundant opportunities to the newer and younger generations, our regional offices are spear-headed by local staffs deployed at their best responsibilities and capabilities. This has achieved positive results, as proven by our growing sales performance.</p>
<p>Throughout this generation and the next, we will be constantly awed by the immense possibilities of technological innovations within the Electronics Industry. Our mission is to stay in the forefront of this technological edge, to re-position ourselves with strategic business plans, in order to accustom to the changing market complexities and customer needs. GSK will be jointly responsible to promote and attain global environmental protection with all our business partners, and continue to work for the benefit of the planet we live on.</p>
<p>On a concluding note, GSK would like to thank our customers, business partners, supporters and devoted employees for their unwavering support which has enabled the company to grow strongly and sustainably. Our objective will always be to maintain a strong market presence, focusing on customer satisfaction as a total solution provider</p>
<p>Sincerely,</p>
<p>S. Komatsu<br>
President</p>
</td>
    <td width="20%" align="right"><img src="images/Greeting.jpg" width="328" height="402"></td>
  </tr>
</table>


<? }

function Sales($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/Sales.jpg" /></td>
  </tr>
</table>

<? }

function Electronics($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:0px 20px; text-algn:left;" align="left"><p><strong>Proud to be appointed as the authorised distributor of global leaders in component manufacturing.</strong></p>
      <p>We are committed to provide total customer satisfaction through our reliable and experienced sales network.Over the years, GSK has established successful long-term 
        business partnerships with both our customers and principal manufacturers.Our expertise in both Inter-Connect Products and Circuit Protection Devices enable our sales specialists 
        to dispense valuable in-depth product knowledge to our customers.</p>
    <p>We are essentially re-positioning ourselves in this cutting edge industry to meet your changing design and diverse application needs.</p></td>
  </tr>
  <tr>
    <td style="background:url(images/Electronics.jpg) right no-repeat;">
    
    <table width="745" border="0" cellspacing="10" cellpadding="0" align="left" class="Ele" style="margin-top:35px;">
  <tr>
    <td width="20%" align="center"><a href="http://www.littelfuse.com/" target="_blank"><img src="images/Ele_01.jpg" width="100%" border="0" ></a></td>
    <td width="20%" align="center"><a href="http://www.schurter.com/" target="_blank"><img src="images/Ele_02.jpg" width="100%" border="0" ></a></td>
    <td width="20%" align="center"><a href="http://www.essentra.com/" target="_blank"><img src="images/Ele_03.jpg" width="100%" border="0" ></a></td>
    <td width="20%" align="center"><a href="http://www.knitter-switch.com/eng" target="_blank"><img src="images/Ele_04.jpg" width="100%" border="0" ></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#e9edee"><a href="http://www.littelfuse.com/" target="_blank" class="Ele">Circuit Protection Devices</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.schurter.com/" target="_blank" class="Ele">Circuit Breakers, EMC Filters</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.essentra.com/" target="_blank" class="Ele">Led Spacer / Insulators</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.knitter-switch.com/eng" target="_blank" class="Ele">Switches</a></td>
  </tr>
  <tr>
    <td align="center"><a href="http://www.t-yuden.com/" target="_blank"><img src="images/Ele_05.jpg" width="100%" border="0" ></a></td>
    <td align="center"><a href="http://www.jst.com/" target="_blank"><img src="images/Ele_06.jpg" width="100%" border="0" ></a></td>
    <td align="center"><a href="http://www.thinking.com.tw/" target="_blank"><img src="images/Ele_07.jpg" width="100%" border="0" ></a></td>
    <td align="center"><a href="http://www.yageo.com/NewPortal/_en/index.jsp" target="_blank"><img src="images/Ele_08.jpg" width="100%" border="0" ></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.t-yuden.com/" target="_blank" class="Ele">Capacitors , Resistors</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.jst.com/" target="_blank" class="Ele">Connector</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.thinking.com.tw/" target="_blank" class="Ele">Varistor, Thermistor</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://www.yageo.com/NewPortal/_en/index.jsp" target="_blank" class="Ele">Chip Resistors / <br />
      Multi Layer Capacitors</a></td>
  </tr>
  <tr>
    <td align="center"><a href="https://honeywell.com/Pages/Home.aspx" target="_blank"><img src="images/Ele_09.jpg" width="100%" border="0" ></a></td>
    <td align="center"><a href="http://jp.fujitsu.com/group/fei/en/" target="_blank"><img src="images/Ele_10.jpg" width="100%" border="0" ></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E9EDEE"><a href="https://honeywell.com/Pages/Home.aspx" target="_blank" class="Ele">Sensor ,<br />
      Micro switches</a></td>
    <td align="center" bgcolor="#E9EDEE"><a href="http://jp.fujitsu.com/group/fei/en/" target="_blank" class="Ele">Relay</a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>

    
    </td>
  </tr>
</table>

<? }

function IPO($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  align="left">
  <tr>
    <td style="padding:0px 20px; text-algn:left;" align="left"><p><strong>IPO DIVISION</strong> is dedicated to provide customers with efficient component outsourcing, through an extensive network of Manufacturers and Suppliers.Our corporate philosophy 
      is to provide total customer satisfaction through the support of wide array of components at cost competitive prices, thereby enhancing their market presence &amp; profitability.<br>
      </p>
        <p>We manage procurement activities &amp; kitting services for our customers, with our value-added buffering system and one-stop procurement solution.
          Our customer portfolio includes leading <br />
Multi-National Companies (MNCs) in the Electronics Manufacturing industry.</p></td>
  </tr>
  <tr>
    <td style="padding:0px 20px; text-algn:left;" align="left"><br />
<br />
<p><strong>PRODUCT LIST</strong><br>
    <span class="TopicBox">DIRECT SUPPORT - MANUFACTURER</span></p>
    </td>
  </tr>
  <tr>
    <td style="padding:0px 20px; text-algn:left;">
    
    <table width="100%" cellpadding="0" cellspacing="0"  class="IPO">
  <col width="226" span="4">
  <tr bgcolor="#ddd9d9">
    <td align="left" width="12%">AMOTECH</td>
    <td align="left" width="12%">CHEMICON</td>
    <td align="left" width="12%">CHIYODA</td>
    <td align="left" width="12%">COILCRAFT</td>
    <td width="12%" align="left">ELNA</td>
    <td width="12%" align="left">ELYTONE</td>
    <td width="12%" align="left">EMUDEN</td>
    <td width="12%" align="left">ESSENTRA</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">EUROPTRONIC</td>
    <td align="left">FARAD</td>
    <td align="left">FERRO    SHIELD </td>
    <td align="left">FUKUSHIMA</td>
    <td align="left">FUTABA</td>
    <td align="left">HAMLIN</td>
    <td align="left">HANDLES</td>
    <td align="left">HARRIS</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">HARTING</td>
    <td align="left">HIROSUGI</td>
    <td align="left">HITACHI-CABLES</td>
    <td align="left">HITACHI-METALS</td>
    <td align="left">HJC</td>
    <td align="left">HO JINN</td>
    <td align="left">HOKURIKU</td>
    <td align="left">HOSIDEN</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">HUA    JUNG</td>
    <td align="left">IRISO</td>
    <td align="left">JST</td>
    <td align="left">JYE TAI</td>
    <td align="left">KANG    YANG</td>
    <td align="left">KENPO</td>
    <td align="left">KINGBRIGHT</td>
    <td align="left">KINGCORE</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">KITAGAWA</td>
    <td align="left">KNITTER    SWITCH</td>
    <td align="left">KOA DENKO</td>
    <td align="left">KORIN</td>
    <td align="left">KR/BANTRY</td>
    <td align="left">KRYSTINEL</td>
    <td align="left">KUNMING</td>
    <td align="left">KYOCERA    ELCO</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">KYOSHIN    KOGYO</td>
    <td align="left">LELON</td>
    <td align="left">LIK WAI</td>
    <td align="left">LITE-ON</td>
    <td align="left">LITTELFUSE</td>
    <td align="left">LODESTONE</td>
    <td align="left">LTI</td>
    <td align="left">MAC8</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">METHODE</td>
    <td align="left">MILL-MAX</td>
    <td align="left">MIZUDEN</td>
    <td align="left">MURATA</td>
    <td align="left">NEUTRIK</td>
    <td align="left">NICERA</td>
    <td align="left">NICHICON</td>
    <td align="left">NIHON    INTER</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">NIPPON    SEISEN</td>
    <td align="left">NITTO</td>
    <td align="left">NJRC</td>
    <td align="left">NOBLE</td>
    <td align="left">OKAYA</td>
    <td align="left">OMRON</td>
    <td align="left">PANJIT</td>
    <td align="left">PHOENIX    CONTACT</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">PHOENIX    MECANO</td>
    <td align="left">PINSHINE</td>
    <td align="left">PPI</td>
    <td align="left">RECTRON</td>
    <td align="left">REO</td>
    <td align="left">ROHM</td>
    <td align="left">ROWLY</td>
    <td align="left">RS</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">RUBYCON</td>
    <td align="left">RYOSAN</td>
    <td align="left">SALECOM</td>
    <td align="left">SAMWHA</td>
    <td align="left">SANREX</td>
    <td align="left">SCHURTER</td>
    <td align="left">SEASON</td>
    <td align="left">SEIKA</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">SEIWA</td>
    <td align="left">SEMITR ON</td>
    <td align="left">SHARP</td>
    <td align="left">SHINDENGEN</td>
    <td align="left">SIBA</td>
    <td align="left">SIGNAL</td>
    <td align="left">SMK</td>
    <td align="left">SOC</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">SOLTEAM </td>
    <td align="left">STANLEY</td>
    <td align="left">SUMITOMO</td>
    <td align="left">TAIYO    YUDEN</td>
    <td align="left">TDK</td>
    <td align="left">TEX    PLASTIC</td>
    <td align="left">THINKING</td>
    <td align="left">TOBUTSU</td>
  </tr>
  <tr bgcolor="#DDD9D9" style="text-algn:left;">
    <td align="left">TOHO    ZINC</td>
    <td align="left">TOSHIBA</td>
    <td align="left">TOSHIN    KOGYO</td>
    <td align="left">TUNG TAI</td>
    <td align="left">TY-OHM</td>
    <td align="left">U.R.D</td>
    <td align="left">UCHIYA</td>
    <td align="left">UPPERMOST</td>
  </tr>
  <tr style="text-algn:left;">
    <td align="left">UTC</td>
    <td align="left">WAGO</td>
    <td align="left">WICKMANN</td>
    <td align="left">YAGEO</td>
    <td align="left">YAMAICHI</td>
    <td align="left">ZEPHYR</td>
    <td align="left">ZYMET</td>
    <td align="left">&nbsp;</td>
  </tr>
</table>









    
    </td>
  </tr>
  
  <tr>
    <td style="padding:20px 20px 0px 20px; text-algn:left;" align="left"><p><span class="TopicBox">SUPPORT-DISTRIBUTOR</span></p>
    </td>
  </tr>
  <tr>
    <td style="padding:0px 20px; text-algn:left;">
    
    <table width="100%" cellpadding="0" cellspacing="0"  class="IPO">
  <tr bgcolor="#cff4ff">
    <td align="left" width="12%">3M</td>
    <td align="left" width="12%">AGILENT</td>
    <td align="left" width="12%">ALPS</td>
    <td align="left" width="12%">AMD</td>
    <td width="12%" align="left">AMP</td>
    <td width="12%" align="left">ANALOG    DEVICE</td>
    <td width="12%" align="left">ARCOTRONICS</td>
    <td width="12%" align="left">ATMEL</td>
  </tr>
  <tr>
    <td align="left">AVER    LOGIC</td>
    <td align="left">AVERY    DENNISION</td>
    <td align="left">AVX-KYOCERA</td>
    <td align="left">BELFUSE</td>
    <td align="left">BIVAR</td>
    <td align="left">BULGIN</td>
    <td align="left">BURR-BROWN</td>
    <td align="left">CET</td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">CITIZEN</td>
    <td align="left">COPAL</td>
    <td align="left">CORNEL</td>
    <td align="left">DAITO</td>
    <td align="left">DALLAS</td>
    <td align="left">DELTA</td>
    <td align="left">DIODE INC</td>
    <td align="left">EDK</td>
  </tr>
  <tr>
    <td align="left">ELTRON</td>
    <td align="left">EPCOS</td>
    <td align="left">EVERLIGHT</td>
    <td align="left">EXAR</td>
    <td align="left">FAIRCHILD</td>
    <td align="left">FAIR-RITE</td>
    <td align="left">FERRAZ    SHAWMUT </td>
    <td align="left">FUJI    ELECTRIC </td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">FUJICON</td>
    <td align="left">FUJITSU</td>
    <td align="left">HAGER</td>
    <td align="left">HALO</td>
    <td align="left">HARWIN</td>
    <td align="left">HEYCO</td>
    <td align="left">HIROSE</td>
    <td align="left">HITACHI</td>
  </tr>
  <tr>
    <td align="left">I.R</td>
    <td align="left">ICS</td>
    <td align="left">INTEL</td>
    <td align="left">IRC    (WELWYN)</td>
    <td align="left">ISHIZUKA</td>
    <td align="left">IWASE</td>
    <td align="left">IXYS</td>
    <td align="left">JAE</td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">JAPAN    SERVO</td>
    <td align="left">KAI SUH    SUH</td>
    <td align="left">KAMAYA</td>
    <td align="left">KEC</td>
    <td align="left">KEMET</td>
    <td align="left">KEYSTONE</td>
    <td align="left">KINSEKI</td>
    <td align="left">KYCON</td>
  </tr>
  <tr>
    <td align="left">LATTICE</td>
    <td align="left">LINEAR</td>
    <td align="left">MAXIM</td>
    <td align="left">MDCOM</td>
    <td align="left">MICREL</td>
    <td align="left">MICROCHIP</td>
    <td align="left">MITSUBISHI</td>
    <td align="left">MITSUMI</td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">MOELLER</td>
    <td align="left">NEC</td>
    <td align="left">NEC TOKIN</td>
    <td align="left">NIKKOHM</td>
    <td align="left">NIPPON    TANSHI</td>
    <td align="left">NS</td>
    <td align="left">OHMITE</td>
    <td align="left">OKI</td>
  </tr>
  <tr>
    <td align="left">ON-SEMI</td>
    <td align="left">OSRAM</td>
    <td align="left">PANASONIC</td>
    <td align="left">PANDUIT</td>
    <td align="left">PHILIPS    (NXP)</td>
    <td align="left">POWER INTEGRATION</td>
    <td align="left">PUDENZ</td>
    <td align="left">RAYCHEM</td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">RENESAS</td>
    <td align="left">RTI</td>
    <td align="left">SAMSUNG</td>
    <td align="left">SAMTEC</td>
    <td align="left">SEIKO-EPSON/NPC</td>
    <td align="left">SEIKO-INSTRUMENT</td>
    <td align="left">SHINAGAWA</td>
    <td align="left">SIPEX</td>
  </tr>
  <tr>
    <td align="left">STEWARD</td>
    <td align="left">SUMIDA</td>
    <td align="left">SUPERTEX</td>
    <td align="left">SUSUMO</td>
    <td align="left">SYSTEM    GENERAL</td>
    <td align="left">TAIWAN    SEMICONDUTOR</td>
    <td align="left">TAK CHEONG</td>
    <td align="left">TEXAS    INSTRUMENT</td>
  </tr>
  <tr bgcolor="#CFF4FF">
    <td align="left">TOKO</td>
    <td align="left">TOMITA</td>
    <td align="left">VISHAY</td>
    <td align="left">WALSIN</td>
    <td align="left">WECO</td>
    <td align="left">WIMA</td>
    <td align="left">XICOR</td>
    <td align="left">YAZAKI</td>
  </tr>
  <tr>
    <td align="left">ZETEX</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
</table>









    
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





