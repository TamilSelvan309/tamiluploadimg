<?php
function compress_img($source_url,$designation_url,$quality){
    $info = getimagesize($source_url);

    if($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    elseif($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);


    imagejpeg($image,$designation_url,$quality);

    return $designation_url;

}  
 
$imname = $_FILES["image"]["tmp_name"];
$source_photo = $imname;
$namecreate = "compressed_jpeg".time();
$namecreatenumber = rand(1000 , 10000);
$picname = $namecreate.$namecreatenumber;
$finalname = $picname.".jpeg";
$dest_photo = 'upload/'.$finalname;
$compressimage = compress_img($source_photo,$dest_photo,1);
?>