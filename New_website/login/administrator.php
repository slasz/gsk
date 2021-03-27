<?  session_start();
	header("Content-Type:text/html; charset=utf-8");
	if($_GET['logout']=='yes'){
		session_start();
		unset($_SESSION["AdminName"],$_SESSION["AdminPassword"]);
		
		echo Message1(45,"red","เข้าสู่ระบบอีกครั้งที่ Link ด้านล่าง","","<a href='index.php'>Login again</a>");
		exit();
	}
	include_once("../includes/connect.php");
	list($admin_user,$admin_pwd)=mysql_fetch_array(mysql_query("select username,password from admin "));
	@$config[adminuser] = $admin_user;//"test"; 
	@$config[adminpwd] =$admin_pwd;//"test";  

	@$user_wb=(isset($_POST["user_wb"]))?$_POST["user_wb"]:$_SESSION["AdminName"];
	@$passwd_wb=(isset($_POST["passwd_wb"])) ?$_POST["passwd_wb"]:$_SESSION["AdminPassword"];


	//if(!isset($prod_code)){ $getprod='Y';}
	if(($user_wb!=@$config[adminuser]) || ($passwd_wb!=@$config[adminpwd])){
		echo Message1(45,"red","เฉพาะผู้ดูแลเว็บไซต์เท่านั้น","","<a href='index.php'>Login again</a>");
		session_start();
		unset($_SESSION["AdminName"],$_SESSION["AdminPassword"]);
		exit();
	}

	@$_SESSION["AdminName"] = $user_wb;
	@$_SESSION["AdminPassword"] = $passwd_wb;
	
	//====================================================================
	function Message1($Size,$Color,$Message,$Comment,$Link){
		$temp = "<br><center>\n";
		$temp .= "<table width=$Size% border=0 cellspacing=0 cellpadding=0 bgcolor=#000000>\n";
		$temp .= "<tr><td><table width=100% border=0 cellpadding=2 cellspacing=1>\n";
    	$temp .= "<tr bgcolor=#FFFF99>\n"; 
    	$temp .= "<td align=center><br>\n";
		$temp .= "<font color=$Color class=size3><b>$Message</b></font>\n";
		$temp .= "<br><br>$Comment<br><br>\n";
	    $temp .= "</td></tr></table></td></tr></table><br>\n";
		if(strlen($Link)>0) $temp .= "[ $Link ]\n";
		$temp .= "</center>\n";
		return ( $temp ) ;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Control Panel</title>
<? include_once("plugin.php");?>
<!--<script type="text/javascript">

var isIE = (navigator.appName.indexOf("Microsoft")!=-1)? true:false;
function GetDocument(frameName)
{
    if( isIE )
    {
        return document.frames[frameName].document;
    }
    else
    {
        return document.getElementById(frameName).contentDocument;
    }
};
var tm_AutoHeightFrame = null;

function AutoHeightFrame(frameName)
{
    AutoHeightFrame1(frameName);
    if( tm_AutoHeightFrame == null )
    {
        tm_AutoHeightFrame = setInterval(function(){AutoHeightFrame1(frameName);}, 200);
    }           
};
function AutoHeightFrame1(frameName)
{
    var frm = document.getElementById(frameName);     
    if( frm == null ) return;
    var frameBody = GetDocument(frameName).body;
    if( frameBody == null ) return;
    var _height = frameBody.scrollHeight+0; // you can change value,
    if( _height < 360 ) {_height=360;} //you can change 410 to your own value, this is min height for iframe.
    frm.height = _height;
}     
function IframeOnload(frameName)
{
    AutoHeightFrame(frameName);
};

</script>-->




</head>

<body >
   <? include_once("menu_top.php"); ?>
   
   
<div style="min-height:450px;background:#fefefe;margin:10px" id="main"> 
                          <? 
				//$iroot ="webboard";
				//$ifile="index.php";
				// $boardpath="$iroot/$ifile";
			//	$boardpath =(file_exists("$boardpath"))? $boardpath : "../".$boardpath ; 
			//	$boardpath =(file_exists("$boardpath"))? $boardpath : "../../".$boardpath ; 
			
			 if(!empty($_GET[p])&& isset($_GET[p])){
			 	
				$url[]=(strstr($_GET[p],"&"))? explode("&",$_GET[p]) : $_GET[p];
				foreach($url as $i=>$data){
					$boardpath.=($i==0)? $data.".php" : "&".$data;
				}
				
			 include_once($boardpath);
			 }else{
			
 ?>
   <h2 style="padding:50px;color:#333">เลือกเมนูที่ต้องการด้านบน</h2>   
   <? }?>
 
   
<!--<iframe src="<?//=$boardpath;?>" style="border:solid 0px red;" width="100%" height="100%" allowtransparency="true" frameborder="0" id="frameContent" name="frameContent" onload="return IframeOnload('frameContent');" ></iframe>-->
			</div>
		
        
        
        </div>
   </div>   
</body>
</html>
