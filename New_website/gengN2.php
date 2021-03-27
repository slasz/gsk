<?php
header("Content-type : image/png");
header("Content-type : image/jpeg");
header("Content-type : image/gif");
$filedir= $_GET['filedir'];// รับค่าพาธไฟล์เพื่อ Resize

  list($wsrc,$hsrc,$filetype) = getimagesize($filedir);
		//  1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF
			switch($filetype){
				case '1' :   $img_orig = @imageCreateFromGif($filedir);
				  break;
				case '2' :   $img_orig = @imageCreateFromJpeg($filedir);
				  break;
				case '3' :   $img_orig = @imageCreateFromPng($filedir);
				  break;
				default : @imageCreateFromJpeg($filedir);
				  break;
			}

//$img_orig=ImageCreateFromJPEG($filedir);
$width_orig = ImagesX($img_orig);
$height_orig = ImagesY($img_orig); 
$height_thm = 260;
$width_thm=200;
//$width_thm=131;
//$width_thm=round($height_thm*$width_orig/$height_orig);
$img_thm = imagecreateTrueColor($width_thm,$height_thm) ;
imageCopyResampled($img_thm,$img_orig,0,0,0,0,$width_thm+1 ,$height_thm+1,$width_orig ,$height_orig);

//imagejpeg($img_thm,NULL,75);
imagejpeg($img_thm, null, 100);
//imagejpeg($img_thm);
imagedestroy($img_thm);
imagedestroy($img_orig);

?>
