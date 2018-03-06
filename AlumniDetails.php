<?php
class AlumniDetails extends StudentDetails{
	
	// property declaration
	private $graduationYear;
	private $degreeEarned;
	private $major;
	private $onAlumniMailingList;
	private $amountDonated;
	
	//method declaration
	public function getGraduationYear(){
		return $this->graduationYear;
	}
	
	public function setGraduationYear($graduationYear){
		$this->graduationYear = $graduationYear;
	}
	
	public function getDegreeEarned(){
		return $this->degreeEarned;
	}
	
	public function setDegreeEarned($degreeEarned){
		$this->degreeEarned = $degreeEarned;
	}
	
	public function getMajor(){
		return $this->major;
	}
	
	public function setMajor($major){
		$this->major = $major;
	}
	
	public function getOnAlumniMailingList(){
		return $this->onAlumniMailingList;
	}
	
	public function setOnAlumniMailingList($onAlumniMailingList){
		$this->onAlumniMailingList = $onAlumniMailingList;
	}
	
	public function getAmountDonated(){
		return $this->amountDonated;
	}
	
	public function setAmountDonated($amountDonated){
		$this->amountDonated = $amountDonated;
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