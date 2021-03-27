<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');


$id=$_GET['id'];
//$id=($id=="Greeting")?"Greeting from president":$id;
if($id=="1"){
$Topic="<a href='?id=1'><strong>Font sans-serif</strong></a>";
} else if ($id=="2") {
$Topic="<a href='?id=2'><strong>Font Arial</strong></a>";
} else if ($id=="3") {
$Topic="<a href='?id=3'><strong>Font Tahoma</strong></a>";
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
     <td align="center"><a href='?id=1' class="F1"><strong>Font sans-serif</strong></a> &nbsp;&nbsp; <a href='?id=2'  class="F2"><strong>Font Arial</strong></a> &nbsp;&nbsp; <a href='?id=3'  class="F3"><strong>Font Tahoma</strong></a></td>
   </tr>
   
   <tr>
     <td align="center">
     
     
     <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="F<?=$id?>" style="font-size:18px;"><?=$Topic;?></td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> xxxxxxx
	<? 
	
	call_user_func("Greeting",$id); 

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



function Greeting($id){  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
  <tr>
    <td width="80%" style="padding:0px 20px; text-algn:left;" align="left" class="F<?=$id;?>"><!--<p><strong>Greeting from President</strong></p>-->
<p>当社は2015年に設立20周年を迎えました。ひとえにお客様と仕入れ先様のご支援の賜

物と深く感謝しております。</p>
<p>加えて、お客様、仕入れ先様双方に満足していただけるサービスを提供するという理念

に沿って、多くの従業員がよく努力し続けたことにも感謝しております。</p>
<p>シンガポールで1995年に設立してから、最初の10年間はアジアに海外拠点を設立し、8

カ国11拠点に成長しました。次の10年間は、その販売網と弊社の提供するサービスを

評価いただき、アジアでの存在感を確立し、売上拡大の期間でした。</p>
<p>当社の各拠点長の多くは、日本人の責任者を置くのではなく、未経験の若い世代のロー

カルスタッフを登用し、ローカルスタッフの責任と能力で拠点を運営して参りました。 

これは、成長を続ける当社の販売実績が、肯定的な見方を提供しています。</p>
<p>2016年は創業21年目を迎えます。今までは無理をして売上拡大に奔走したことを否め

ません。メーカーへの保証金、要求される在庫運用で、資金繰り圧迫して来ました。集

中と選択を昨年実施ししましたので、売上高は減少するものの、健全な財務体制を構築

することができました。今後ともサービスの提供に更に一層努力してまいりたいと思い

ます。今後の10年間電子部品の代理店というビジネスモデルはさらに一層厳しい環境

に置かれることは間違いありません。資金を有効に用いることにより、仕入れ先様、お

客様とのさらに一層の良い信頼関係を構築を期待することができます。</p>
<p>企業の社会的貢献という役割も忘れません。また従業員とその家族の福祉も当然の役割

として、働きやすい職場環境を提供できるようにも努力します。バランスのとれた経営

をすることにより、さらに一層、質の高いお客様へのサービスが提供できることを祈願

しております。</p>
</td>
    <td width="20%" align="right"><img src="images/Greeting.jpg" width="328" height="402"></td>
  </tr>
</table>


<? }


?>





