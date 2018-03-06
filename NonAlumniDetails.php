<?php
class NonAlumniDetails extends StudentDetails{
	
	//property declaration
	private $major;
	private $departureDate;
	private $currentStudent;
	
	//method declaration
	public function getMajor(){
		return $this->major;
	}
	
	public function setMajor($major){
		$this->major = $major;
	}
	
	public function getDepartureDate(){
		return $this->departureDate;
	}
	
	public function setDepartureDate($departureDate){
		$this->departureDate = $departureDate;
	}
	
	public function getCurrentStudent(){
		return $this->currentStudent;
	}
	
	public function setCurrentStudent($currentStudent){
		$this->currentStudent = $currentStudent;
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