<?php

/*
*	@author Ashish Lal
*	Copyright (C) 2015 Ashish Lal
*	GNU GENERAL PUBLIC LICENSE
*	Version 2, June 1991 
*/

function resize($input,$output)
{

	//To call resize("Image/Location/Before/Resize", "Image/Location/AFTER/Resize");

	$svl=390;//Maximum width of Image Required

	$ext_of_file = pathinfo(basename($input),PATHINFO_EXTENSION);
	if(strcasecmp($ext_of_file,"jpg")==0)
	{
		$image = $input;
		$exif = exif_read_data($image);
		$src = imagecreatefromjpeg($image);
		list($oldwidth,$oldheight)=getimagesize($image);
		$scl = 1;
		$newwidth=1;//$width;
		$newheight=1;//$height;
		if($oldwidth>$oldheight)
		{
			$scl = $svl/$oldwidth;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}else
		{
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}
		if($exif['Orientation']==6)
		{
			$tmpp = $oldwidth;
			$oldwidth=$oldheight;
			$oldheight=$tmpp;
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}

		if($exif['Orientation']==6)
		{
			$tmp=imagecreatetruecolor($newheight,$newwidth);
			imagecopyresampled($tmp,$src,0,0,0,0,$newheight,$newwidth,$oldheight,$oldwidth);
			$tmp = imagerotate($tmp,-90,0);
			$filename = $output;
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp);
			return 1;
		}
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$oldwidth,$oldheight);
		$filename = $output;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp);
		return 1;

	}
	if(strcasecmp($ext_of_file,"png")==0)
	{
		$image = $input;
		$exif = exif_read_data($image);
		$src = imagecreatefrompng($image);
		list($oldwidth,$oldheight)=getimagesize($image);
		$scl = 1;
		$newwidth=1;//$width;
		$newheight=1;//$height;
		if($oldwidth>$oldheight)
		{
			$scl = $svl/$oldwidth;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}else
		{
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}
		if($exif['Orientation']==6)
		{
			$tmpp = $oldwidth;
			$oldwidth=$oldheight;
			$oldheight=$tmpp;
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}

		if($exif['Orientation']==6)
		{
			$tmp=imagecreatetruecolor($newheight,$newwidth);
			imagecopyresampled($tmp,$src,0,0,0,0,$newheight,$newwidth,$oldheight,$oldwidth);
			$tmp = imagerotate($tmp,-90,0);
			$filename = $output;
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp);
			return 1;
		}
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$oldwidth,$oldheight);
		$filename = $output;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp);
		return 1;

	}
	if(strcasecmp($ext_of_file,"gif")==0)
	{
		$image = $input;
		$exif = exif_read_data($image);
		$src = imagecreatefromgif($image);
		list($oldwidth,$oldheight)=getimagesize($image);
		$scl = 1;
		$newwidth=1;//$width;
		$newheight=1;//$height;
		if($oldwidth>$oldheight)
		{
			$scl = $svl/$oldwidth;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}else
		{
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}
		if($exif['Orientation']==6)
		{
			$tmpp = $oldwidth;
			$oldwidth=$oldheight;
			$oldheight=$tmpp;
			$scl = $svl/$oldheight;
			$newwidth = $scl*$oldwidth;
			$newheight = $scl*$oldheight;
		}

		if($exif['Orientation']==6)
		{
			$tmp=imagecreatetruecolor($newheight,$newwidth);
			imagecopyresampled($tmp,$src,0,0,0,0,$newheight,$newwidth,$oldheight,$oldwidth);
			$tmp = imagerotate($tmp,-90,0);
			$filename = $output;
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp);
			return 1;
		}
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$oldwidth,$oldheight);
		$filename = $output;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp);
		return 1;

	}
}
?>
