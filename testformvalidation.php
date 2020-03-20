

<!DOCTYPE html>

<html lang="en">

	<head>
		<!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>WDV341 Intro to PHP Unit 8</title>
		<style>
			body{background-color:linen}
		</style>
	</head>

	<body>
	
<h1>Assignment: Form Validation Class</h1>
<pre>
<?php
require 'formvalidation.php';

echo "Input \n";
$testArray = array ( "name"=>" Bryan C. Litscher", "phonenumber"=>" 5152235675", "email"=>"blitscher@mchsi.com", "registrationtype"=>" presenter", "badgeholder"=>" clip ", "fridaydinner"=>" on " , "saturdaylunch"=>" on ", "sundayawardbrunch"=>" on ", "specialrequests"=>"fndn ", "submit"=>" Submit" );

print_r($testArray);

//trim whitespace from sides of values in tests array
foreach($testArray as $x=>$y){
	$testArray[$x] =trim($y);
	}
	
	
//set groups that are validated together
$elementGroups = array(
	"badgeholder"=> array("badgeholder"),
	"Provided Meals" => array("fridaydinner","saturdaylunch","sundayawardbrunch")
	);
	

//create object
$a = new validator($testArray);
$a->setElementGroups($elementGroups);
if ( $a->validateForm() ){ 
	echo "validation passed\n";
}else{
	echo "validation failed\n";
	print_r( $a->getErrorMessages() );
}

echo "======================================== \n";
echo " \n";

echo "Input \n";
$testArray = array ( "name"=>" Bryan C. Litscher>", "phonenumber"=>" (515)223-5675", "email"=>"blitscher@mchsicom",  "fridaydinner"=>" on " , "saturdaylunch"=>" on ", "sundayawardbrunch"=>" on ", "specialrequests"=>str_repeat("Wow",80), "submit"=>" Submit" );

print_r($testArray);

//trim whitespace from sides of values in tests array
foreach($testArray as $x=>$y){
	$testArray[$x] =trim($y);
	}
	
	
//set groups that are validated together
$elementGroups = array(
	"badgeholder"=> array("badgeholder"),
	"Provided Meals" => array("fridaydinner","saturdaylunch","sundayawardbrunch")
	);
	

//create object
$a = new validator($testArray);
$a->setElementGroups($elementGroups);
if ( $a->validateForm() ){ 
	echo "validation passed\n";
}else{
	echo "validation failed\n";
	print_r( $a->getErrorMessages() );
}

echo "======================================== \n";
echo " \n";




?>

</pre>

	</body>
	
	


</html>
