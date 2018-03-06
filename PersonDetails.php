<?php
class PersonDetails
{
	// property declaration
	private $personId;
	private $departmentId;
	private $universityIdNum;
	private $FName;
	private $MName;
	private $LName;
	private $contactNumber;
	private $emailAddress;
	private $personalPhoto;
	private $address;
	private $city;
	private $state;
	private $postalCode;
	private $postalZipPlusFour;
	private $country;
	private $region;
	private $personType;
	
	// method declaration
	public function getPersonId(){
		return $this->personId;
	}

	public function setPersonId($personId){
		$this->personId = $personId;
	}

	public function getDepartmentId(){
		return $this->departmentId;
	}

	public function setDepartmentId($departmentId){
		$this->departmentId = $departmentId;
	}

	public function getUniversityIdNum(){
		return $this->universityIdNum;
	}

	public function setUniversityIdNum($universityIdNum){
		$this->universityIdNum = $universityIdNum;
	}

	public function getFName(){
		return $this->FName;
	}

	public function setFName($FName){
		$this->FName = $FName;
	}

	public function getMName(){
		return $this->MName;
	}

	public function setMName($MName){
		$this->MName = $MName;
	}

	public function getLName(){
		return $this->LName;
	}

	public function setLName($LName){
		$this->LName = $LName;
	}

	public function getContactNumber(){
		return $this->contactNumber;
	}

	public function setContactNumber($contactNumber){
		$this->contactNumber = $contactNumber;
	}

	public function getEmailAddress(){
		return $this->emailAddress;
	}

	public function setEmailAddress($emailAddress){
		$this->emailAddress = $emailAddress;
	}

	public function getPersonalPhoto(){
		return $this->personalPhoto;
	}

	public function setPersonalPhoto($personalPhoto){
		$this->personalPhoto = $personalPhoto;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCity($city){
		$this->city = $city;
	}

	public function getState(){
		return $this->state;
	}

	public function setState($state){
		$this->state = $state;
	}

	public function getPostalCode(){
		return $this->postalCode;
	}

	public function setPostalCode($postalCode){
		$this->postalCode = $postalCode;
	}

	public function getPostalZipPlusFour(){
		return $this->postalZipPlusFour;
	}

	public function setPostalZipPlusFour($postalZipPlusFour){
		$this->postalZipPlusFour = $postalZipPlusFour;
	}

	public function getCountry(){
		return $this->country;
	}

	public function setCountry($country){
		$this->country = $country;
	}

	public function getRegion(){
		return $this->region;
	}

	public function setRegion($region){
		$this->region = $region;
	}

	public function getPersonType(){
		return $this->personType;
	}

	public function setPersonType($personType){
		$this->personType = $personType;
	}
	
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
	
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	}
}
?>