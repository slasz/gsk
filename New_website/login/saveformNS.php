
<? 

	include_once("../includes/connect.php");

	$Event =@$_POST["Event"];

	function cktype($imgt,$pic){	

	if( filesize($pic) < 100000999 && filesize($pic) > 100 ){

	

		if($imgt=="image/jpg" || $imgt=="image/jpeg" || $imgt=="image/pjpeg") 

			{

				return ".jpg";

			}
		else if($imgt=="image/bmp" || $imgt=="image/bitmap" || $imgt=="image/BMP") 

			{

				return ".bmp";

			} 

		else if($imgt=="image/gif") 

			{

				return ".gif";

			} 

		else if($imgt=="image/png") 

			{

				return ".png";

			} 
				

		

	}	

	return false;

}



function update_pic($fd,$info_code,$piccode,$fileno,$fileorder,$filetype){

	$sql="select id,picture from sales_pic where main_id='".$info_code."' and picture like'%_$fileorder.%'";

	$sql=mysql_query($sql);

	list($id,$pic)=@mysql_fetch_array($sql);

	$url=$fd;

	$sourcefile=$url."".$pic;

	if(@file_exists($sourcefile))@unlink($sourcefile);

	list($picname,$pictype)=explode(".",$pic);

	list($one,$two)=explode("_",$picname);

	$one=(empty($one))? date("Ymdhis") : $one;

	$newimg=$one."_".$fileorder.$filetype;

	$destination=$url."/".$newimg;

	if(copy($fileno,$destination)){

		if(!empty($id)){
	
			$sql="update sales_pic set picture='$newimg' where id='$id' ";

		}else{

			$sql="insert into sales_pic(main_id, picture,folders) values ('$info_code','$newimg','$fd' )";

		}

		mysql_query($sql);

	}

}




function update_pic_cat($fd,$info_code,$piccode,$fileno,$fileorder,$filetype,$typecate){

	switch($fileorder){

						case 0 : $setpic="pic"; 

						break;

						case 1 : $setpic="pic2";

						break;

						case 2 : $setpic="pic3";

						break;
						case 3 : $setpic="pic4";

						break;
						case 4 : $setpic="pic5";

						break;
						case 5 : $setpic="pic6";

						break;
						case 6 : $setpic="pic7";

						break;
						case 7 : $setpic="pic8";

						break;
						case 8 : $setpic="pic9";

						break;
						case 9 : $setpic="pic10";

						break;
			
					}

	if($typecate=="Category"){

		$sql="select catid,".$setpic." from category where catid=".$info_code;

	}else if($typecate=="SubCategory"){

		$sql="select subid,pic from sub_category where subid=".$info_code;

	}

	$sql=mysql_query($sql);

	list($id,$pic)=@mysql_fetch_array($sql);

	$url=$fd;

	$sourcefile=$url."/".$pic;

	if(@file_exists($sourcefile))@unlink($sourcefile);

	list($picname,$pictype)=explode(".",$pic);

	list($one,$two)=explode("_",$picname);

	$one=(empty($one))? date("Ymdhis") : $one;

	$newimg=$one."_".$fileorder.$filetype;

	$destination=$url."/".$newimg;

	if(copy($fileno,$destination)){

		if(!empty($id)){

			if($typecate=="Category"){

				$sql="update category set ".$setpic."='$newimg' where catid=".$id;

			}else if($typecate=="SubCategory"){

				$sql="update sub_category set pic='$newimg' where subid=".$id;

			}

		}

		mysql_query($sql);

	}

}

function updateDB($s,$val,$whr){	

mysql_query("update products set ".$s."='".$val."'  $whr ");

}	



	if($Event=='Password'){

		//$cksql=mysql_query("select username,password from admin where username='".$username."' and password='".$oldpwd."'");

		//if(mysql_num_rows($cksql)>0){

		$username=@$_POST['username'];

		$newpwd=@$_POST['newpwd'];

			mysql_query("update admin set username='".$username."', password='".$newpwd."' ");

		//}

	

	

	}
	
	
	else if($Event=='Category'){
		$refer="administrator.php?p=category/index";//$_SERVER['HTTP_REFERER'];	
		$thcat=@$_POST['thcat'];
		$encat=@$_POST['encat'];
		$jpcat=@$_POST['jpcat'];
		$deth=@$_POST['deth'];
		$deen=@$_POST['deen'];
		$dejp=@$_POST['dejp'];
		$catid=(!empty($_POST['catid']))? $_POST['catid']:0;
		$eventsub=@$_POST['eventsub'];
		$subid=(!empty($_POST['subid']))? $_POST['subid']:0;
		$online=@$_POST['online'];
		$pic=$_FILES['pic'];
		
		
		if($eventsub=="no"){		
		//echo "1";
			if(empty($catid) || $catid==0  ){
				$qry1=mysql_query("insert into category(th_name,en_name , detailTh, detailEn,jp_name,detailJp) values('$thcat','$encat','$deth','$deen','$jpcat','$dejp')");
			}else{
				$qry1=mysql_query("update category set th_name='".$thcat."' , en_name='".$encat."' , online='".$online."'  , detailTh='".$deth."' , detailEn='".$deen."' , jp_name='".$jpcat."' , detailJp='".$dejp."' where catid=".$catid);
			}
			$str=mysql_query("select catid from category order by  catid desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($catid)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$catid;
			}	
	}else{
		//echo "2";
			if(empty($subid) || $subid==0  ){
				$qry1=mysql_query("insert into sub_category(catid,th_name,en_name,sorter , detailTh, detailEn,jp_name,detailJp) values($catid,'$thcat','$encat','9999','$deth','$deen','$jpcat','$dejp')")or die(mysql_error());
			}else{			
				$qry1=mysql_query("update sub_category set  catid=".$catid.", th_name='".$thcat."', en_name='".$encat."'  , detailTh='".$deth."' , detailEn='".$deen."'  , jp_name='".$jpcat."' , detailJp='".$dejp."'where subid=".$subid);	
			}
			$str=mysql_query("select subid from sub_category order by  subid desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($subid)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$subid;
			}	

		}
	
	
	
	
$coderand=date("Ymdhis");
	if($qry1){
			####Save picture########
				for($i=0;$i<=0;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					//echo $fileno;
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						
						$nam=cktype($type,$fileno);
						 
						$imgname.=$nam;
						$picalbum="../upload/category/".$imgname;
					$piccode=$codeid."_".$i;
					
	if($eventsub=="no"){						
					
					if(!empty($catid)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/category',$codeid,$piccode,$fileno,$i,$nam,"Category");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update category set pic='".$imgname."' where catid=".$codeid);
					}		
	}else{
	
	
					if(!empty($subid)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/category',$codeid,$piccode,$fileno,$i,$nam,"SubCategory");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update sub_category set pic='".$imgname."' where subid=".$codeid);
					}		
	}						
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/category/".$delpic;
						if($eventsub=="no"){
							if(unlink($unlink_file)) mysql_query("update category set pic='' where catid=".$codeid);
						}else{
							if(unlink($unlink_file)) mysql_query("update sub_category set pic='' where subid=".$codeid);
						}
					}
				}	
		mysql_query("COMMIT");	
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";
			exit();
	
	}
	
	}
	
		
	else if($Event=='UpdateCatPage'){
		$catid=$_POST['catid'];
		$del=$_POST['del'];
		$online=$_POST['online'];
		$subid=$_POST['subid'];
		$delsub=$_POST['delsub'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		$sortss=(isset($_POST['sortss']))?$_POST['sortss']:"9999";
		 
		
		 
		
		if(!empty($catid) ){
		
		foreach($catid as $ind=>$val){

				$data_num=(empty($sorts[$ind]))? 9999 : $sorts[$ind];

				//echo $data_num;	
				mysql_query("update category set sorter=".$data_num." where catid=".$val);
				}
		
		
			foreach($catid as $ind=>$val){
				$data=($online[$ind]=="true")? "y":"n";
					mysql_query("update category set online='".$data."' where catid='".$val."' ");
				
			}
			
			foreach($catid as $ind=>$val){
				if($del[$ind]=="true"){
					$picsql=mysql_query("select pic from category where catid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("category/images/".$picname);
					}
					mysql_query("delete from category where catid='".$val."' ");
					
					$picsql=mysql_query("select pic from sub_category where catid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						while(list($picname)=mysql_fetch_array($picsql)){
							if(!empty($picname)) @unlink("category/images/".$picname);
						}
					}
					mysql_query("delete from sub_category where catid='".$val."' ");
					
				}

			}
			
		}
		
		if(!empty($subid) ){
		
		foreach($subid as $ind=>$val){

				$data_num=(empty($sortss[$ind]))? 9999 : $sortss[$ind];

				//echo $data_num;	
				mysql_query("update sub_category set sorter=".$data_num." where subid=".$val);
				}

		
			
			foreach($subid as $ind=>$val){
			//echo "ind=$ind <> val=$val <br/>";
				if($delsub[$ind]=="true"){
					$picsql=mysql_query("select pic from sub_category where subid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("category/images/".$picname);
					}
					
					mysql_query("delete from sub_category where subid='".$val."' ");
				}
				
			}
			
		}
		
		echo "<meta http-equiv='refresh' content='3;url=category/index.php'>";
	
	
	}
	
	else if($Event=='Color'){
		$catid=$_POST['catid'];
		$del=$_POST['del'];
		$name=$_POST['colorname'];
		$code=$_POST['colorcode'];
		$command=$_POST['command'];
		if(!empty($catid)){
				if($command=='update'){
					mysql_query("update color set Code='".$code."', Name='".$name."' where color_id='".$catid."' ");
				}
				if($command=='delete'){
					foreach($catid as $ind=>$val){
						if($del[$ind]=="true"){
							mysql_query("delete from color where color_id='".$val."' ");
						}
					}
				}
		}else{
			mysql_query("insert into color(Code,Name) values('".$code."','".$name."')");
		}
		
		
		echo "<meta http-equiv='refresh' content='3;url=category/index.php'>";
	
	}
	
	else if($Event=='Size'){
		$sizeid=$_POST['sizeid'];
		$del=$_POST['del'];
		$code=$_POST['code'];
		$dimension=$_POST['dimension'];
		$command=$_POST['command'];
		if(!empty($sizeid)){
			if($command=='update'){
					mysql_query("update size set Code='".$code."', Dimension='".$dimension."' where size_id='".$sizeid."' ");
				}
				if($command=='delete'){
					foreach($sizeid as $ind=>$val){
						if($del[$ind]=="true"){
							mysql_query("delete from size where size_id='".$val."' ");
						}
					}
				}
		}else{
			mysql_query("insert into size(Code,Dimension) values('".$code."','".$dimension."')");
		}
		
	
	
	
	
	}
	
	/*else if($Event=='Product'){
		$del=$_POST['del'];
		$online='y';
		$hit=$_POST['hit'];
		$newrelease=$_POST['newrelease'];
		$productrate=isset($_POST['productrate'])? $_POST['productrate']:0;
		$command=$_POST['command'];
		$id=$_POST['pid'];
		//$itemcode=$_POST['itemcode'];
		$itemcode="AT".$id;
		$category=isset($_POST['category'])? $_POST['category']:0 ;
		$brand=isset($_POST['brand'])? $_POST['brand']:0 ;
		$type=isset($_POST['type'])? $_POST['type']:0 ;
		$subcate=isset($_POST['subcat'])? $_POST['subcat']:0 ;
		$color=$_POST['color'];
		$titleTh=$_POST['titleTh'];
		$titleEn=$_POST['titleEn'];
		$titleJp=$_POST['titleJp'];
		$topicTh=$_POST['topicTh'];
		$topicEn=$_POST['topicEn'];
		$topicJp=$_POST['topicJp'];
		$detailTh=$_POST['detailTh'];
		$detailEn=$_POST['detailEn'];
		$detailJp=$_POST['detailJp'];
		$size=$_POST['size'];
		$price=$_POST['price'];
		$disc=$_POST['discount'];
		$pic=$_FILES['pic'];
		$pdf=$_FILES['pdf'];
		$doctxt=$_FILES['doctxt'];
		$delfile=$_POST['delfile'];
		$line=$_POST['line'];
		$docname = $_POST['doc1']; 
		$olddoc=$_POST['olddoc'];
		$youtube=$_POST['youtube'];
		$youtube=str_replace('"',"'",$youtube);
		$del_d=$_POST['del_d'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		$link=$_POST['link'];
		$link=str_replace('"',"'",$link);
		$itemprice=$_POST['itemprice'];
		
		$file_name = $_FILES['fileN0']['name']; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		$file_name1 = $_FILES['fileN1']['name']; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$file = strtolower($_FILES["fileN0"]["name"]);
		$sizefile = $_FILES["fileN0"]["size"]; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$file2 = strtolower($_FILES["fileN1"]["name"]);
		$sizefile = $_FILES["fileN1"]["size"]; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$refer="administrator.php?p=product/index";//$_SERVER['HTTP_REFERER'];	

	mysql_query("BEGIN");
	$coderand=date("Ymdhis");
	
	

	
	
	
if($file != ""){

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file;

				$ext = explode(".", $file);

				$re =$dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];
				
					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}
						
						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else if($del_d=="y"){
		$sql="select *  from  products where id=$id  "; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$d=$row['file_pdf'];
@unlink ("../upload/files/$d");
	$fileRename0="";
	}
	
	
				
				
				else{

						$fileRename0=$oldpic;

				}
				
if($file2 != ""){

//echo $file2."++";  exit(); 

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file2;

				$ext = explode(".", $file2);

				$re =$dir_name.date("Ymdhis");

				$fileRename1 = $re.".".$ext[1];
				
					

						if(!empty($oldpic1)) {@unlink($uploads."/".$oldpic1);}
						
						$copy=copy($_FILES['fileN1']['tmp_name'],$uploads.'/'.$fileRename1); 

				

				}else{

						$fileRename1=$oldpic1;

				}
				
				
			
if($command=='delete'){
			if(sizeof($id)>0){
			
			foreach($id as $ind=>$val){

				$data_num=(empty($sorts[$ind]))?9999:$sorts[$ind];

				echo $data_num;	
				$qry7=mysql_query("update products set sorter=".$data_num." where id=".$val);
				}
			
					foreach($id as $ind=>$val){
					//Loop Delete picture
						if($hit[$ind]=="true"){
							$qry5=mysql_query("update products set hit='y' where id='".$val."'");
						}else{
							$qry5=mysql_query("update products set hit='n' where id='".$val."'");
						}

						if($newrelease[$ind]=="true"){
							$qry6=mysql_query("update products set newrelease='y' where id='".$val."'");
						}else{
							$qry6=mysql_query("update products set newrelease='n' where id='".$val."'");
						}
					
							//$qry5=mysql_query("update products set rate=".$productrate[$ind]." where id='".$val."'");
					
						if($del[$ind]=="true"){
							$txt=mysql_query("select picture,folders from sales_pic where main_id='".$val."' ");
							if(mysql_num_rows($txt)>0){
								while(list($pic,$fold)=mysql_fetch_array($txt)){
									$url=$fold."/".$pic;
									if(file_exists($url)){
										if(unlink($url)){
											$qry1=mysql_query("delete from sales_pic where main_id='".$val."' and picture='".$pic."' ")or die(mysql_error());
										}
									}
								}
							}
//							echo $ind."->".$val."<br/>";
//							Delete Product item
							$qry2=mysql_query("delete from products where id='".$val."' ")or die(mysql_error());
//							Delete Size and Price
							$qry3=mysql_query("delete from product_sizeprice where itemcode='".$val."' ")or die(mysql_error());
						}
					}
			}		
					
			if($qry1 && $qry2 && $qry3){//&&$qry5
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}elseif($qry5 && $qry6){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
					
			}elseif($qry7){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}else{
					mysql_query("ROLLBACK");
					echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();

			}	
}else{

		$hit=($_POST['hit']!='y')? 'n' : 'y';
		$newrelease=($_POST['newrelease']!='y')? 'n' : 'y';

if(empty($id)){
	$str1="insert into products(itemcode,category_id,subcate_id,color_id,titleTh,titleEn,titleJp,topicTh,topicEn,topicJp,detailTh,detailEn,detailJp,lastupdate,online,hit,newrelease,rate,line,file_pdf,file_doc,youtube,link,brand_id,type_id,sorter,itemprice) values('".$itemcode."',".$category.",".$subcate.",'".$color."','".$titleTh."','".$titleEn."','".$titleJp."','".$topicTh."','".$topicEn."','".$topicJp."','".$detailTh."','".$detailEn."','".$detailJp."',sysdate(),'".$online."','".$hit."','".$newrelease."',".$productrate.",'".$line."','".$fileRename0."','".$fileRename1."','".$youtube."','".$link."','".$brand."','".$type."','9999','".$itemprice."')";
	
	$strM="insert into menu(catid,type_id) values('".$category."','".$type."')";
	

}else{
	$str1="update products set itemcode='".$itemcode."', category_id=".$category.", subcate_id=".$subcate.", color_id='".$color."', titleTh='".$titleTh."', titleEn='".$titleEn."', titleJp='".$titleJp."',topicTh='".$topicTh."',topicEn='".$topicEn."',topicJp='".$topicJp."', detailTh='".$detailTh."', detailEn='".$detailEn."', detailJp='".$detailJp."', lastupdate=sysdate(), online='".$online."', hit='".$hit."', newrelease='".$newrelease."', rate=".$productrate." ,line='".$line."',file_pdf='".$fileRename0."',file_doc='".$fileRename1."', youtube='".$youtube."', link='".$link."'  , brand_id='".$brand."', type_id='".$type."' , itemprice='".$itemprice."' where id=".$id;
	
	
	
	mysql_query("delete from product_sizeprice where itemcode=".$id);
	

}	
	//echo $str1;
	
	$qry1=mysql_query($str1) or die(mysql_error());

	
	$str=mysql_query("select id, file_pdf, file_doc from products order by  id desc limit 0,1");
	if(mysql_num_rows($str)>0){
		list($codeid, $old_pdf, $old_doc)=mysql_fetch_array($str);
	}
	if(empty($id)){
		$codeid=(empty($codeid))? 1:$codeid++;
	}else{
		$codeid=$id;
	}

	if(!empty($size)){
 		$txt=mysql_query("select  size_id from size");
		$iba=mysql_num_rows($txt);
 		for($i=0;$i<$iba;$i++){
		
			if(!empty($size[$i])){
				$isad.=($f==0)? "":" , ";
				$isad.="('$codeid','".$size[$i]."',".$price[$i].",".$disc[$i].")";
				$f++;
			}	
		}
		
	}
	$str2="insert into product_sizeprice(itemcode, size, price, discount) values ".$isad;
	//echo $str2."<hr>";
	$qry2=mysql_query($str2);// or die("Error : ".mysql_error());

	
	
	
		if($qry1 && $qry2){
			####Save picture########
				for($i=0;$i<=9;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						$nam=cktype($type,$fileno);
						$imgname.=$nam;
						$picalbum="../upload/product/".$imgname;
					$piccode=$codeid."_".$i;
					if(!empty($itemcode) && !empty($id)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic",'../upload/product/',$codeid,$piccode,$fileno,$i,$nam);
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("insert into sales_pic(main_id, picture,folders) values ('$codeid','$imgname','../upload/product/') ");
					}		
							
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/product//".$delpic;
						if(unlink($unlink_file)) mysql_query("delete from sales_pic where folders='../upload/product/' and picture='$delpic' ");
						
					}
				}


$randoms=str_pad((rand() * rand()),10,rand(0,9),"left" );

			####Save DOC&PDF########
if(!empty($delfile)){

			foreach($delfile as $ind=>$val){
				$sqlpic=mysql_query("select $val from products where id=".$codeid);
		
				if(mysql_num_rows($sqlpic)>0){
					list($filegoo)=mysql_fetch_array($sqlpic);
				
					
					$urlfilegoo="upload/files/".$filegoo;
					
					if(!empty($filegoo)){
						
						unlink($urlfilegoo);
						mysql_query("update products set ".$val."='' where id=".$codeid);
					}
				}
			}
			
	
}else{
					
			for($i=0;$i<=1;$i++){
		if(!empty($_FILES['fileN']['name'][$i])){
			$coderand=$randoms."_$i";
			$imgname=$coderand;
			$fileno=$_FILES['fileN']['tmp_name'][$i];
			if(!empty($fileno)){
				$type = $_FILES['fileN']['name'][$i];
				list($n,$nam)=explode(".",$type);
				
				$imgname.=".".$nam;
				$picalbum="upload/files/".$imgname;
				if(copy($fileno , $picalbum)){
						switch($i){
							case 0: $s="file_pdf"; 
							$old_files=$old_pdf;
							break;
							case 1: $s="file_doc"; 
							$old_files=$old_doc;
							break;
						}
					###### Delete files exists ######
					$file_exists="upload/files/".$old_files;
					if(!empty($old_files) && file_exists($file_exists)){
						unlink($file_exists);
						mysql_query("update products set $s='' where id=".$codeid);
					}
					###### And Update or Insert new
					$whr=" where id=".$codeid;
					call_user_func("updateDB",$s,$imgname,$whr);
				}	
			}
		}
	}
	
	}

	
		mysql_query("COMMIT");	
			echo "<center style='margin:0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000);</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000);</script>";
			exit();
	
	}
		

}			
		
	
	
	}*/
	
	else if($Event=='Product'){
		$del=$_POST['del'];
		$online='y';
		$hit=$_POST['hit'];
		$newrelease=$_POST['newrelease'];
		$productrate=isset($_POST['productrate'])? $_POST['productrate']:0;
		$command=$_POST['command'];
		$id=$_POST['pid'];
		$itemcode=$_POST['itemcode'];
		//$itemcode=$id;
		$category=isset($_POST['category'])? $_POST['category']:0 ;
		$subcate=isset($_POST['subcat'])? $_POST['subcat']:0 ;
		$heading=isset($_POST['head'])? $_POST['head']:0 ;
		$color=$_POST['color'];
		$titleTh=$_POST['titleTh'];
		$titleEn=$_POST['titleEn'];
		$topicTh=$_POST['topicTh'];
		$topicEn=$_POST['topicEn'];
		$detailTh=$_POST['detailTh'];
		$detailEn=$_POST['detailEn'];
		$size=$_POST['size'];
		$price=$_POST['price'];
		$disc=$_POST['discount'];
		$pic=$_FILES['pic'];
		$pdf=$_FILES['pdf'];
		$doctxt=$_FILES['doctxt'];
		$delfile=$_POST['delfile'];
		$line=$_POST['line'];
		$docname = $_POST['doc1']; 
		$olddoc=$_POST['olddoc'];
		
		$file_name = $_FILES['fileN0']['name']; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		$file_name1 = $_FILES['fileN1']['name']; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$file = strtolower($_FILES["fileN0"]["name"]);
		$sizefile = $_FILES["fileN0"]["size"]; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$file2 = strtolower($_FILES["fileN1"]["name"]);
		$sizefile = $_FILES["fileN1"]["size"]; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$refer="administrator.php?p=product/index";//$_SERVER['HTTP_REFERER'];	

	mysql_query("BEGIN");
	$coderand=date("Ymdhis");
	
if($file != ""){

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file;

				$ext = explode(".", $file);

				$re =$dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];
				
					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}
						
						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}
				
if($file2 != ""){

//echo $file2."++";  exit(); 

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file2;

				$ext = explode(".", $file2);

				$re =$dir_name.date("Ymdhis");

				$fileRename1 = $re.".".$ext[1];
				
					

						if(!empty($oldpic1)) {@unlink($uploads."/".$oldpic1);}
						
						$copy=copy($_FILES['fileN1']['tmp_name'],$uploads.'/'.$fileRename1); 

				

				}else{

						$fileRename1=$oldpic1;

				}
if($command=='delete'){
			if(sizeof($id)>0){
					foreach($id as $ind=>$val){
					//Loop Delete picture
						if($hit[$ind]=="true"){
							$qry5=mysql_query("update products set hit='y' where id='".$val."'");
						}else{
							$qry5=mysql_query("update products set hit='n' where id='".$val."'");
						}

						if($newrelease[$ind]=="true"){
							$qry6=mysql_query("update products set newrelease='y' where id='".$val."'");
						}else{
							$qry6=mysql_query("update products set newrelease='n' where id='".$val."'");
						}
					
							//$qry5=mysql_query("update products set rate=".$productrate[$ind]." where id='".$val."'");
					
						if($del[$ind]=="true"){
							$txt=mysql_query("select picture,folders from sales_pic where main_id='".$val."' ");
							if(mysql_num_rows($txt)>0){
								while(list($pic,$fold)=mysql_fetch_array($txt)){
									$url=$fold."/".$pic;
									if(file_exists($url)){
										if(unlink($url)){
											$qry1=mysql_query("delete from sales_pic where main_id='".$val."' and picture='".$pic."' ")or die(mysql_error());
										}
									}
								}
							}
//							echo $ind."->".$val."<br/>";
//							Delete Product item
							$qry2=mysql_query("delete from products where id='".$val."' ")or die(mysql_error());
//							Delete Size and Price
							$qry3=mysql_query("delete from product_sizeprice where itemcode='".$val."' ")or die(mysql_error());
						}
					}
			}		
					
			if($qry1 && $qry2 && $qry3){//&&$qry5
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>บันทึกข้อมูล เรียบร้อยค่ะ</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}elseif($qry5 && $qry6){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>บันทึกข้อมูล เรียบร้อยค่ะ</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}else{
					mysql_query("ROLLBACK");
					echo "<center style='margin:0'><h3>ไม่สามารถรบันทึกข้อมูลได้<br/>กรุณาลองอีกครั้งหรือ ติดต่อผู้ให้บริการค่ะ</h3>".mysql_error()."</center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();

			}	
}else{

		$hit=($_POST['hit']!='y')? 'n' : 'y';
		$newrelease=($_POST['newrelease']!='y')? 'n' : 'y';

if(empty($id)){
	$str1="insert into products(itemcode,category_id,subcate_id,color_id,titleTh,titleEn,topicTh,topicEn,detailTh,detailEn,lastupdate,online,hit,newrelease,rate,line,file_pdf,file_doc) values('".$itemcode."',,".$category.",".$subcate.",'".$color."','".$titleTh."','".$titleEn."','".$topicTh."','".$topicEn."','".$detailTh."','".$detailEn."',sysdate(),'".$online."','".$hit."','".$newrelease."',".$productrate.",'".$line."','".$fileRename0."','".$fileRename1."')";
	

}else{
	$str1="update products set itemcode='".$itemcode."', category_id=".$category.", subcate_id=".$subcate.", color_id='".$color."', titleTh='".$titleTh."', titleEn='".$titleEn."',topicTh='".$topicTh."',topicEn='".$topicEn."', detailTh='".$detailTh."', detailEn='".$detailEn."', lastupdate=sysdate(), online='".$online."', hit='".$hit."', newrelease='".$newrelease."', rate=".$productrate." ,line='".$line."',file_pdf='".$fileRename0."',file_doc='".$fileRename1."' where id=".$id;
	mysql_query("delete from product_sizeprice where itemcode=".$id);
	
}	
	//echo $str1;
	
	$qry1=mysql_query($str1) or die(mysql_error());
	
	$str=mysql_query("select id, file_pdf, file_doc from products order by  id desc limit 0,1");
	if(mysql_num_rows($str)>0){
		list($codeid, $old_pdf, $old_doc)=mysql_fetch_array($str);
	}
	if(empty($id)){
		$codeid=(empty($codeid))? 1:$codeid++;
	}else{
		$codeid=$id;
	}

	if(!empty($size)){
 		$txt=mysql_query("select  size_id from size");
		$iba=mysql_num_rows($txt);
 		for($i=0;$i<$iba;$i++){
		
			if(!empty($size[$i])){
				$isad.=($f==0)? "":" , ";
				$isad.="('$codeid','".$size[$i]."',".$price[$i].",".$disc[$i].")";
				$f++;
			}	
		}
		
	}
	$str2="insert into product_sizeprice(itemcode, size, price, discount) values ".$isad;
	//echo $str2."<hr>";
	$qry2=mysql_query($str2);// or die("Error : ".mysql_error());

	
	
	
		if($qry1 && $qry2){
			####Save picture########
				for($i=0;$i<=9;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						$nam=cktype($type,$fileno);
						$imgname.=$nam;
						$picalbum="../upload/product/".$imgname;
					$piccode=$codeid."_".$i;
					if(!empty($itemcode) && !empty($id)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic",'../upload/product/',$codeid,$piccode,$fileno,$i,$nam);
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("insert into sales_pic(main_id, picture,folders) values ('$codeid','$imgname','../upload/product/') ");
					}		
							
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/product//".$delpic;
						if(unlink($unlink_file)) mysql_query("delete from sales_pic where folders='../upload/product/' and picture='$delpic' ");
						
					}
				}


$randoms=str_pad((rand() * rand()),10,rand(0,9),"left" );

			####Save DOC&PDF########
if(!empty($delfile)){

			foreach($delfile as $ind=>$val){
				$sqlpic=mysql_query("select $val from products where id=".$codeid);
		
				if(mysql_num_rows($sqlpic)>0){
					list($filegoo)=mysql_fetch_array($sqlpic);
				
					
					$urlfilegoo="upload/files/".$filegoo;
					
					if(!empty($filegoo)){
						
						unlink($urlfilegoo);
						mysql_query("update products set ".$val."='' where id=".$codeid);
					}
				}
			}
			
	
}else{
					
			for($i=0;$i<=1;$i++){
		if(!empty($_FILES['fileN']['name'][$i])){
			$coderand=$randoms."_$i";
			$imgname=$coderand;
			$fileno=$_FILES['fileN']['tmp_name'][$i];
			if(!empty($fileno)){
				$type = $_FILES['fileN']['name'][$i];
				list($n,$nam)=explode(".",$type);
				
				$imgname.=".".$nam;
				$picalbum="upload/files/".$imgname;
				if(copy($fileno , $picalbum)){
						switch($i){
							case 0: $s="file_pdf"; 
							$old_files=$old_pdf;
							break;
							case 1: $s="file_doc"; 
							$old_files=$old_doc;
							break;
						}
					###### Delete files exists ######
					$file_exists="upload/files/".$old_files;
					if(!empty($old_files) && file_exists($file_exists)){
						unlink($file_exists);
						mysql_query("update products set $s='' where id=".$codeid);
					}
					###### And Update or Insert new
					$whr=" where id=".$codeid;
					call_user_func("updateDB",$s,$imgname,$whr);
				}	
			}
		}
	}
	
	}

	
		mysql_query("COMMIT");	
			echo "<center style='margin:0'><h3>บันทึกข้อมูล เรียบร้อยค่ะ</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000);</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:0'><h3>ไม่สามารถรบันทึกข้อมูลได้<br/>กรุณาลองอีกครั้งหรือ ติดต่อผู้ให้บริการค่ะ</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000);</script>";
			exit();
	
	}
		

}			
		
	
	
	}
	
	else if($Event=='OrderHistory'){
		$poids=$_POST['poids'];
		$orderstatus=$_POST['orderstatus'];
		
			foreach($poids as $ind=>$val){
				$data=$orderstatus[$ind];
					//echo "<br/>po:".$val."<=>".$data;
					mysql_query("update shopping_cusorder set Status='".$data."' where poids='".$val."' ");
				
			}
			
			
			
			
	
	}
	
	else if($Event=='SizeChart'){
		$getSizeTh=$_POST['sizeTh'];
			$getSizeEn=$_POST['sizeEn'];
		if(mysql_query("UPDATE size_chart set sizeTh='".$getSizeTh."', sizeEn='".$sizeEn."' where id=1 ")){
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='administrator.php?p=size/chart';\",2000)</script>";
			exit();

		}
	}
	
	else if($Event=='Promotion'){

		$del=$_POST['del'];

		$numS=$_POST['numS'];

		$file_name = $_FILES['fileN0']['name']; 
			
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";

		$command=$_POST['command'];

		$id=$_POST['pid'];
			
		$titleTh=$_POST['titleTh'];
		
		$topicTh=$_POST['topicTh'];

		$detailTh=$_POST['detailTh'];
		
		$titleEn=$_POST['titleEn'];
		
		$topicEn=$_POST['topicEn'];

		$detailEn=$_POST['detailEn'];
		
		$titleJp=$_POST['titleJp'];
		
		$topicJp=$_POST['topicJp'];

		$detailJp=$_POST['detailJp'];
		
		$status=$_POST['status'];
		
		$hot=$_POST['hot'];
		
		$showindex=$_POST['showindex'];

		
if($status=="l"){
		$refer="administrator.php?p=link/index&status=$status";//$_SERVER['HTTP_REFERER'];	
} else {
	$refer="administrator.php?p=promotion/index&status=$status";//$_SERVER['HTTP_REFERER'];	
	}
		$refer2="administrator.php?p=promotion/index";//$_SERVER['HTTP_REFERER'];	
		

if($command=="delete"){
					
		if(!empty($id) ){
			foreach($id as $ind=>$val){

				$data_num=(empty($numS[$ind]))? 9999 : $numS[$ind];

				//echo $data_num;	
				$qry1=mysql_query("update promotion set numS=".$data_num." where proid=".$val);
				}

			

				foreach($id as $ind=>$val){
//echo $val;
				if($del[$ind]=="true"){
$picsql=mysql_query("select p0 from promotion where proid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("../upload/promotions/".$picname);
					}
			
					$qry1=mysql_query("delete from promotion where proid=".$val);
					}
				}
		}
					
					

			if($qry1){

					mysql_query("COMMIT");	

					echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

					echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";

					exit();

			}else{

					mysql_query("ROLLBACK");

					echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

					echo "<script>setTimeout(\"self.location='$refer';\",10000)</script>";

					exit();



			}	

}else{

if($file_name != ""){

		

				$uploads = '../upload/promotions'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

					

				

	if(empty($id) ){


	$str1="insert into promotion(titleTh,topicTh,detailTh,titleEn,topicEn,detailEn,titleJp,topicJp,detailJp,p0,status,hot,showindex) values('".$titleTh."','".$topicTh."','".$detailTh."','".$titleEn."','".$topicEn."','".$detailEn."','".$titleJp."','".$topicJp."','".$detailJp."','".$fileRename0."','".$status."','".$hot."','".$showindex."')";

} else{

	$str1="update promotion set titleTh='".$titleTh."',topicTh='".$topicTh."', detailTh='".$detailTh."',titleEn='".$titleEn."',topicEn='".$topicEn."', detailEn='".$detailEn."',titleJp='".$titleJp."',topicJp='".$topicJp."', detailJp='".$detailJp."', p0='".$fileRename0."',status='".$status."',hot='".$hot."', showindex='".$showindex."' where proid=".$id;

	mysql_query("delete from promotion where proid=".$del);

	
}	


	$qry1=mysql_query($str1) or die(mysql_error());

	

	if($qry1){

	


		mysql_query("COMMIT");	

			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";

			exit();

			

	

	}else{

		mysql_query("ROLLBACK");

			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";

			exit();

	

	}

		



					

		
}
	

	

	

	}
	
	else if($Event=='Banner'){

		$refer="administrator.php?p=branner/index";

	////////////////////// รูป เล็ก  ///////////////

			$file_name = $_FILES['fileN0']['name']; 

			$name=(isset($_POST['name']))? $_POST['name']: "";
			
			$id=$_POST['id'];

			$link=(isset($_POST['link']))? $_POST['link']: "";
			
			$position=(isset($_POST['position']))? $_POST['position']: "";
			
			$position="1";

			$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
			

			if($file_name != ""){

		

				$uploads = '../upload/bannerright'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

					

				

	if(empty($id) ){

	

		

	

	

	$sql = "INSERT INTO banner (name,p0,link,position) VALUES ('$name','$fileRename0','$link','$position')";

		

	}else if(!empty($id)){

		$sql = "update banner set name='".$name."', p0='".$fileRename0."', link='".$link."',position='".$position."' where id=".$id;

		

	}

	

	 $result = mysql_query($sql);

	 		 if($result)

			  	{

			echo "<center style='margin:300px 0'><h3>การทำงาน เสร็จเรียบร้อย</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

				}else if(!$result){

			echo "<center style='margin:300px 0'><h3>บันทึกไม่ได้.<br/>กรุณาลองอีกครั้ง หรือติดต่อผู้พัฒนาระบบ.</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",3000)</script>";

			exit();

				}	



	

	

	}
	
	else if($Event=='Customer'){

		$refer="administrator.php?p=customer/index";//$_SERVER['HTTP_REFERER'];	

		$th_name=@$_POST['th_name'];
		$en_name=@$_POST['en_name'];

		$topicTh=@$_POST['topicTh'];
		$topicEn=@$_POST['topicEn'];

		$custid=(!empty($_POST['custid']))? $_POST['custid']:0;

		$sorter=(!empty($_POST['sorter']))? $_POST['sorter']:9999;
		
		$file_name = $_FILES['fileN0']['name']; 
		
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		$status=@$_POST['status'];

		$del=$_POST['del'];
		
		
		
		
		if($file_name != ""){

		

				$uploads = '../upload/customer'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

		

		

			if(empty($custid) || $custid==0  ){

				$qry1=mysql_query("insert into customer(th_name,en_name,topicTh,topicEn,sorter,p0,status) values('$th_name','$en_name','$topicTh','$topicEn','$sorter','$fileRename0','status')");

			}
			else{

				$qry1=mysql_query("update customer set th_name='".$th_name."' , en_name='".$en_name."' , topicTh='".$topicTh."', topicEn='".$topicEn."', sorter='".$sorter."', p0='".$fileRename0."' , status='".$status."' where custid=".$custid);

			}

			$str=mysql_query("select custid from customer order by  custid desc limit 0,1");

			if(mysql_num_rows($str)>0){

			list($custid)=mysql_fetch_array($str);

			}

			if(empty($custid)){

				$custid=(empty($custid))? 1:$custid++;

			}
			else{

				$custid=$custid;

			}	

	
$coderand=date("Ymdhis");

	if($qry1){
mysql_query("COMMIT");	

			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

			

	}
	else{

		mysql_query("ROLLBACK");

			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

	

	}}
	
	else if($Event=='UpdateCustomerPage'){

		$custid=$_POST['custid'];

		$del=$_POST['del'];

		

	

		$sorts=$_POST['sorts'];

		 

		if(!empty($custid) ){

		

			foreach($custid as $ind=>$val){

				$data_sort=(empty($sorts))? 9999 : $sorts[$ind];

					mysql_query("update customer set sorter=".$data_sort." where custid='".$val."' ");

				

			}

			

				foreach($custid as $ind=>$val){
//echo $val;
				if($del[$ind]=="true"){

					$picsql=mysql_query("delete from customer where custid='".$val."' ");
					}
					}


		

		echo "<meta http-equiv='refresh' content='3;url=customer/index.php'>";

	

	}

	

	}
	
	else if($Event=='Customer_sub'){

	

	////////////////////// รูป เล็ก  ///////////////

			$file_name = $_FILES['fileN0']['name']; 
			
			$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";

			$name=(isset($_POST['name']))? $_POST['name']: "";
			
			$p_name=(isset($_POST['p_name']))? $_POST['p_name']: "";
			
			$id=(isset($_POST['id']))? $_POST['id']: "";
			
			$line=(isset($_POST['line']))? $_POST['line']: "";

			$sorter=(isset($_POST['sorter']))? $_POST['sorter']: "";
			
			$customer=(!empty($_POST['customer']))? $_POST['customer']:"";

			$refer="administrator.php?p=customer_sub/index&custid=$customer";

			if($file_name != ""){

		

				$uploads = '../upload/customer'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

					

				

	if(empty($id) ){

	

		

	

	

	$sql = "INSERT INTO customer_sub (p0,p_name,cust_id,sorter,line) VALUES ('$fileRename0','$p_name','$customer','$sorter','$line')";

		

	}else if(!empty($id)){

		$sql = "update customer_sub set p0='".$fileRename0."',p_name='".$p_name."', cust_id='".$customer."',sorter='".$sorter."',line='".$line."' where id=".$id;

		

	}

	

	 $result = mysql_query($sql);

	 		 if($result)

			  	{

			echo "<center style='margin:300px 0'><h3>การทำงาน เสร็จเรียบร้อย</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

				}else if(!$result){

			echo "<center style='margin:300px 0'><h3>บันทึกไม่ได้.<br/>กรุณาลองอีกครั้ง หรือติดต่อผู้พัฒนาระบบ.</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

				}	



	

	

	}
	
	else if($Event=='Brand'){
		$refer="administrator.php?p=brand/index";//$_SERVER['HTTP_REFERER'];	
		$thcat=@$_POST['thcat'];
		$encat=@$_POST['encat'];
		$jpcat=@$_POST['jpcat'];
		$brand_id=(!empty($_POST['brand_id']))? $_POST['brand_id']:0;
		$eventsub=@$_POST['eventsub'];
		$subid=(!empty($_POST['subid']))? $_POST['subid']:0;
		$online=@$_POST['online'];
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		$file_name = $_FILES['fileN0']['name']; 
		
		
		$file_name = $_FILES['fileN0']['name']; 

			$name=(isset($_POST['name']))? $_POST['name']: "";
			
			$id=$_POST['id'];

			$link=(isset($_POST['link']))? $_POST['link']: "";
			
			$position=(isset($_POST['position']))? $_POST['position']: "";
			
			$position="1";

			$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
			

			if($file_name != ""){

		

				$uploads = '../upload/brand'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

		
	
			if(empty($brand_id) || $brand_id==0  ){
				$qry1=mysql_query("insert into brand(brandTh,brandEn,brandJp,pic) values('$thcat','$encat','$jpcat','$fileRename0')");
			}else{
				$qry1=mysql_query("update brand set brandTh='".$thcat."' , brandEn='".$encat."' , brandJp='".$jpcat."' , pic='".$fileRename0."'  where brand_id=".$brand_id);
			}
			$str=mysql_query("select brand_id from brand order by  brand_id desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($brand_id)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$brand_id;
			}	
	
	
	
	
$coderand=date("Ymdhis");
	if($qry1){
			####Save picture########
				for($i=0;$i<=0;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					//echo $fileno;
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						
						$nam=cktype($type,$fileno);
						 
						$imgname.=$nam;
						$picalbum="../upload/brand/".$imgname;
					$piccode=$codeid."_".$i;
					
				
					
					if(!empty($brand_id)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/brand',$codeid,$piccode,$fileno,$i,$nam,"Brand");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update brand set pic='".$imgname."' where brand_id=".$codeid);
					}		
						
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/brand/".$delpic;
						
							if(unlink($unlink_file)) mysql_query("update brand set pic='' where brand_id=".$codeid);
						
					}
				}	
		mysql_query("COMMIT");	
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";
			exit();
	
	}
	
	}
	
	else if($Event=='UpdateBrand'){
		$brand_id=$_POST['brand_id'];
		$del=$_POST['del'];
		$online=$_POST['online'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		 
		
		 
		
		if(!empty($brand_id) ){
		
		foreach($brand_id as $ind=>$val){

				$data_num=(empty($sorts[$ind]))? 9999 : $sorts[$ind];

				//echo $data_num;	
				mysql_query("update brand set sorter=".$data_num." where brand_id=".$val);
				}
		
		
		
			
			foreach($brand_id as $ind=>$val){
				if($del[$ind]=="true"){
					$picsql=mysql_query("select pic from brand where brand_id='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("../upload/brand/".$picname);
					}
					mysql_query("delete from brand where brand_id='".$val."' ");
					
			
					
				}

			}
			
		}
		
		
		
		echo "<meta http-equiv='refresh' content='3;url=brand/index.php'>";
	
	
	}
	
	else if($Event=='Type'){
		$refer="administrator.php?p=type/index";//$_SERVER['HTTP_REFERER'];	
		$thcat=@$_POST['thcat'];
		$encat=@$_POST['encat'];
		$jpcat=@$_POST['jpcat'];
		$deth=@$_POST['deth'];
		$deen=@$_POST['deen'];
		$dejp=@$_POST['dejp'];
		$type_id=(!empty($_POST['type_id']))? $_POST['type_id']:0;
		$eventsub=@$_POST['eventsub'];
		$subid=(!empty($_POST['subid']))? $_POST['subid']:0;
		$online=@$_POST['online'];
		
		
	
			if(empty($type_id)){
				$qry1=mysql_query("insert into type(typeTh,typeEn,pic,detailTh,detailEn,typeJp,detailJp) values('$thcat','$encat','$fileRename0','$deth','$deen','$jpcat','$dejp')");
			}else{
				$qry1=mysql_query("update type set typeTh='".$thcat."' , typeEn='".$encat."' , detailTh='".$deth."' , detailEn='".$deen."' , typeJp='".$jpcat."' , detailJp='".$dejp."' where type_id=".$type_id);
			}
			$str=mysql_query("select type_id from type order by  type_id desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($type_id)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$type_id;
			}	
	
	
	
	
$coderand=date("Ymdhis");
	if($qry1){
			####Save picture########
				for($i=0;$i<=0;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					//echo $fileno;
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						
						$nam=cktype($type,$fileno);
						 
						$imgname.=$nam;
						$picalbum="../upload/brand/".$imgname;
					$piccode=$codeid."_".$i;
					
				
					
					if(!empty($type_id)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/type',$codeid,$piccode,$fileno,$i,$nam,"Type");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update type set pic='".$imgname."' where type_id=".$codeid);
					}		
						
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/type/".$delpic;
						
							if(unlink($unlink_file)) mysql_query("update type set pic='' where type_id=".$codeid);
						
					}
				}	
		mysql_query("COMMIT");	
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";
			exit();
	
	}
	
	}
	
	else if($Event=='UpdateType'){
		$type_id=$_POST['type_id'];
		$del=$_POST['del'];
		$online=$_POST['online'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		 
		
		 
		
		if(!empty($type_id) ){
		
		foreach($type_id as $ind=>$val){

				$data_num=(empty($sorts[$ind]))? 9999 : $sorts[$ind];

				//echo $data_num;	
				mysql_query("update type set sorter=".$data_num." where type_id=".$val);
				}
		
		
		
			
			foreach($type_id as $ind=>$val){
				if($del[$ind]=="true"){
					$picsql=mysql_query("select pic from type where type_id='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("../upload/type/".$picname);
					}
					mysql_query("delete from type where type_id='".$val."' ");
					
			
					
				}

			}
			
		}
		
		
		
		echo "<meta http-equiv='refresh' content='3;url=type/index.php'>";
	
	
	}

 ?>

