<?php
class StudentDetails extends PersonDetails{
	// property declaration
	private $advisorId;
	private $degreeProgram;
	private $graduated;
	private $dateEntry;
	private $generalMailingList;
	
	//method declaration
	public function getAdvisorId(){
		return $this->advisorId;
	}
	
	public function setAdvisorId($advisorId){
		$this->advisorId = $advisorId;
	}
	
	public function getDegreeProgram(){
		return $this->degreeProgram;
	}
	
	public function setDegreeProgram($degreeProgram){
		$this->degreeProgram = $degreeProgram;
	}
	
	public function getGraduated(){
		return $this->graduated;
	}
	
	public function setGraduated($graduated){
		$this->graduated = $graduated;
	}
	
	public function getDateEntry(){
		return $this->dateEntry;
	}
	
	public function setDateEntry($dateEntry){
		$this->dateEntry = $dateEntry;
	}
	
	public function getGeneralMailingList(){
		return $this->generalMailingList;
	}
	
	public function setGeneralMailingList($generalMailingList){
		$this->generalMailingList = $generalMailingList;
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