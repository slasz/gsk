<style>

div.product{font-family:Arial, Helvetica, sans-serif;font-size:15px;letter-spacing:0.05em;}

ul.product{	list-style	:none;}

.product li{margin:1px;}

.input_product{ width:400px;padding:0;font-size:13px;}

.red{color:#ff0000;}

.title{float:left;width:120px;}

.btninsert{width:80px;font-weight:bold;}

</style><?

	$cpid=(isset($_GET['cpid']))? $_GET['cpid']:"";

	

	$cpname=(isset($_GET['cpname']))? $_GET['cpname']:"";

	$cpshow=(isset($_GET['cpshow']))? $_GET['cpshow']:"";
	
	$nameclip=(isset($_GET['nameclip']))? $_GET['nameclip']:"";
	
	$chk=($cpshow=='y')?"checked":"";
	



?>

<form action="" method="post" >

<input type="hidden" name="clipid" value="<?=$cpid?>" />

<div class='product' style="background:#ffffff;padding:2px 8px;width:630px" align="left">

<h3>Clip VDO Code No. <?=$cpid;?></h3>



<ul class="product">

	

    <li> <label class="title">Clip URL:</label>
    <input name="showindex" type="hidden" id="showindex"  value="<?=$cpshow;?>"  />
    <input type="text" id="clips" name="clips" class="input_product" maxlength="200" value="<?=$cpname;?>" /></li>
    
    
     <li> <label class="title">Clip Name:</label>
    
    <input type="text" id="nameclip" name="nameclip" class="input_product" maxlength="200" value="<?=$nameclip;?>" /></li>
<!--    <li style="margin-left:10px;">
      <label class="title">แสดงหน้าแรก:</label>
      <input name="showindex" type="checkbox" id="showindex" class="input_product" value="y" <?=$chk;?> />
    </li>-->
    <li><p><label class="title">&nbsp;</label><input type="submit" class="btninsert" value="<?=(!empty($cpid))?"Edit":"Save";?>" name="btn1" /></p></li>
</ul>

   

</div>



</form>