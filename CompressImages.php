<?php

set_time_limit(0);

require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify/Exception.php");
require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify/ResultMeta.php");
require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify/Result.php");
require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify/Source.php");
require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify/Client.php");
require_once("/www/dmecompany_192/public/tinify/tinify/lib/Tinify.php");

try {
	\Tinify\setKey("API");
    \Tinify\validate();
} catch(\Tinify\Exception $e) {
    echo "Validation of API key failed.";
}

$year = date("Y");
$Count = 0;
while($Count != 12)
{
	echo "<p>Count: ".$Count."</p><br>";
	echo "<p>Directory: ".$directory."</p><br>";
	echo "<p>Directory2: ".$directory2."</p><br>";
	echo "<p>Directory3: ".$directory3."</p><br>";
	
	$directory = "/www/dmecompany_192/public/wp-content/uploads/".$year."/".$Count."";
	$imagesjpg = glob($directory . "/*.jpg");

	foreach($imagesjpg as $imagejpg)
	{
	  echo "<p>".$imagejpg."</p>";
	  echo "<br>";
	  $source = \Tinify\fromFile($imagejpg);
	  $source->toFile($imagejpg);
	}

	$directory2 = "/www/dmecompany_192/public/wp-content/uploads/".$year."/".$Count."";
	$imagespng = glob($directory . "/*.png");

	foreach($imagespng as $imagepng)
	{
	  echo "<p>".$imagepng."</p>";
	  echo "<br>";
	  $source = \Tinify\fromFile($imagepng);
	  $source->toFile($imagepng);
	}
	
	$directory3 = "/www/dmecompany_192/public/wp-content/uploads/".$year."/".$Count."";
	$imageswebp = glob($directory . "/*.webp");

	foreach($imageswebp as $imagewebp)
	{
	  echo "<p>".$imagewebp."</p>";
	  echo "<br>";
	  $source = \Tinify\fromFile($imagewebp);
	  $source->toFile($imagewebp);
	}

	$Count++;
}

$compressionsThisMonth = \tinify\compressionCount();
echo $compressionsThisMonth;

?>