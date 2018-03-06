<?php
class FacultyDetails extends PersonDetails{
	
	// property declaration
	private $title;
	private $hireDate;
	private $departureDate;
	private $officeBuilding;
	private $officeNumber;
	private $officeHours;
	private $currentActivities;
	private $advisor;
	private $facultyType;

	// method declaration
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title = $title;
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
	
	public function getCurrentActivities(){
		return $this->currentActivities;
	}
	
	public function setCurrentActivities($currentActivities){
		$this->currentActivities = $currentActivities;
	}
	
	public function getAdvisor(){
		return $this->advisor;
	}
	
	public function setAdvisor($advisor){
		$this->advisor = $advisor;
	}
	
	public function getFacultyType(){
		return $this->facultyType;
	}
	
	public function setFacultyType($facultyType){
		$this->facultyType = $facultyType;
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