<?php
class validator{
	private $validatorMap;
	private $formFields;
	private $errorMessages;
	private $elementGroups;
	function __construct($inForm){
		$this->formFields=$inForm;
		}
	
	public function setElementGroups($eg){
		$this->elementGroups = $eg;
	}	
	public function getErrorMessages(){
		return $this->errorMessages;
	}

	public function validateForm(){

		$errorMessages = array();
		$validForm=true;
		foreach($this->formFields as $x => $val) {
			switch ($x) {
			case "name":
				if( empty($val) ){
					$errorMessages[$x] = "Value for $x is required";
					$validForm =  false;
				} elseif (htmlspecialchars($val) != $val ){
					$errorMessages[$x] = "Special characters not allowed in $x";
					$validForm =  false;
				}
				break;
			case "phonenumber":
				$min=1000000000;
				$max=9999999999;
				if( empty($val) ){
					$errorMessages[$x] = "Value for $x is required";
					$validForm =  false;
				} elseif (htmlspecialchars($val) != $val ){
					$errorMessages[$x] = "Special characters not allowed in $x";
					$validForm =  false;
				}elseif (filter_var($val, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)))===false ){
					$errorMessages[$x] = "Only ten integers allowed in $x";
					$validForm =  false;
				}
				break;
			case "email":
				if( empty($val) ){
					$errorMessages[$x] = "Value for $x is required";
					$validForm =  false;
				} elseif (htmlspecialchars($val) != $val ){
					$errorMessages[$x] = "Special characters not allowed in $x";
					$validForm =  false;
				} elseif (! filter_var($val, FILTER_VALIDATE_EMAIL) ){
					$errorMessages[$x] = "$x must be valid email address";
					$validForm =  false;
				}
				break;
			case "specialrequests":
				if(htmlspecialchars($val) != $val ){
					$errorMessages[$x] = "Special characters not allowed in $x";
					$validForm =  false;
				} elseif (strlen($val) > 200 ){
					$errorMessages[$x] = "$x must be less than 200 characters";
					$validForm =  false;
				}
				break;
			default:
				//code to be executed if n is different from all labels;
			} 
			
			
		}
		///look at groups
		foreach($this->elementGroups as $x => $val) {
			$oneIsSelected = false;
			foreach($val as $item){
				if( isset($this->formFields[$item])){$oneIsSelected = true;}
				}
			if ( !$oneIsSelected ){$errorMessages[$x] ="$x item selection is required";}
			echo "\n";
		}
		$this->errorMessages=$errorMessages;
		return (count($errorMessages)>0)?false:true;
	}
}

/*
name
phonenumber
email
registrationtype
clip
fridaydinner
saturdaylunch
sundayawardbrunch
specialrequests

Name:  Cannot be blank. Must not contain special characters.

Phone Number:  Must be numeric, no hyphens or ( ).  Must be the right size. Use a PHP Filter/Regular Expression for this validation.

Email Address: Must be valid.  Use a PHP Filter/Regular Expression for this validation.

Registration: One must be selected. 

Badge Holder: One must be selected.

Provided Meals: Optional

Special Request: Limited to 200 characters. Must not contain special characters. Use PHP Filter/Regular Expression




*/

?>