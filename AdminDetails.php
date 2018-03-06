<?php
class AdminDetails extends PersonDetails{
	
	// property declaration
	private $designation;
	private $jobLevel;
	private $officeBuilding;
	private $officeNumber;
	private $officeHours;
	
	// method declaration
	public function getDesignation(){
		return $this->designation;
	}
	
	public function setDesignation($designation){
		$this->designation = $designation;
	}
	
	public function getJobLevel(){
		return $this->jobLevel;
	}
	
	public function setJobLevel($jobLevel){
		$this->jobLevel = $jobLevel;
	}
	
	public function getOfficeBuilding(){
		return $this->officeBuilding;
	}
	
	public function setOfficeBuilding($officeBuilding){
		$this->officeBuilding = $officeBuilding;
	}
	
	public function getOfficeNumber(){
		return $this->officeNumber;
	}
	
	public function setOfficeNumber($officeNumber){
		$this->officeNumber = $officeNumber;
	}
	
	public function getOfficeHours(){
		return $this->officeHours;
	}
	
	public function setOfficeHours($officeHours){
		$this->officeHours = $officeHours;
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