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


$Count = 0;
while($Count != 12)
{
	echo "<p>Count: ".$Count."</p><br>";
	echo "<p>Directory: ".$directory."</p><br>";
	echo "<p>Directory2: ".$directory2."</p><br>";
	
	$directory = "/www/dmecompany_192/public/wp-content/uploads/2019/".$Count."";
	$imagesjpg = glob($directory . "/*.jpg");

	foreach($imagesjpg as $imagejpg)
	{
	  echo "<p>".$imagejpg."</p>";
	  echo "<br>";
	  $source = \Tinify\fromFile($imagejpg);
	  $source->toFile($imagejpg);
	}

	$directory2 = "/www/dmecompany_192/public/wp-content/uploads/2019/".$Count."";
	$imagespng = glob($directory . "/*.png");

	foreach($imagespng as $imagepng)
	{
	  echo "<p>".$imagepng."</p>";
	  echo "<br>";
	  $source = \Tinify\fromFile($imagejpg);
	  $source->toFile($imagejpg);
	}

	$Count++;
}

$compressionsThisMonth = \tinify\compressionCount();
echo $compressionsThisMonth;

?>