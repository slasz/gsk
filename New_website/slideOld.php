<?php 
session_start();
include_once('includes/connect.php');

?>

<meta name="viewport" content="width=1169">    
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //		Styles
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
<link href="diapo/diapo.css" rel="stylesheet" type="text/css" />    
<!--<link rel='stylesheet' id='style-css'  href='diapo.css' type='text/css' media='all'> -->
<script type='text/javascript' src='scripts/jquery.min.js'></script>
<!--[if !IE]><!--><script type='text/javascript' src='scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='scripts/diapo.js'></script> 

<script>
$(function(){
	$('.pix_diapo').diapo();
});

</script>



<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style><div style="overflow:hidden; width:1169px; margin: 0px auto; padding:0 0px;" > 
                <div class="pix_diapo">

 <?
  $sqlB=mysql_query("select * from banner  order by sorter asc , id asc");


if(mysql_num_rows($sqlB)>0){	
	while($r=mysql_fetch_array($sqlB)){
	++$n;
		$BannerSlide="<img src='upload/bannerright/".$r['p0']."'  border='0'";
		$BannerLink=(empty($r['link']))?"":$r['link'];
	

  ?>

					  <div>
                      
                      
                      
                    <div data-thumb="upload/bannerright/<?=$r['p0'];?>">
                        <a href="<?=$BannerLink;?>" target="_blank"><img src="upload/bannerright/<?=$r['p0'];?>" border="0"></a>
                      
                    </div>
                    
                    
                    
                     </div>
		<? } } ?>			
                   
               
               <!-- #pix_diapo -->
                
        </div>
