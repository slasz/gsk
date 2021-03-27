<? 
$urls=isset($_GET['urlclip'])? $_GET['urlclip'] : "";
 if(!empty($urls)) { ?>
        <iframe width="560" height="312" src="<?=$urls;?>" frameborder="0" allowfullscreen="allowfullscreen" ></iframe>
<? }?>
