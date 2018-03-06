<?php
class StaffDetails extends PersonDetails{
	
	//property declaration
	private $jobTitle;
	private $division;
	private $hireDate;
	private $departureDate;
	
	//method declaration
	public function getJobTitle(){
		return $this->jobTitle;
	}
	
	public function setJobTitle($jobTitle){
		$this->jobTitle = $jobTitle;
	}
	
	public function getDivision(){
		return $this->division;
	}
	
	public function setDivision($division){
		$this->division = $division;
	}
	
	public function getHireDate(){
		return $this->hireDate;
	}
	
	public function setHireDate($hireDate){
		$this->hireDate = $hireDate;
	}
	
	public function getDepartureDate(){
		return $this->departureDate;
	}
	
	public function setDepartureDate($departureDate){
		$this->departureDate = $departureDate;
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