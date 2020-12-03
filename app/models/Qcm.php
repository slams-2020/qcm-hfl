<?php
namespace models;
/**
 * @table('qcm')
*/
class Qcm{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	*/
	private $id;

	/**
	 * @column("name"=>"name","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("length","constraints"=>array("max"=>42))
	*/
	private $name;

	/**
	 * @column("name"=>"description","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("length","constraints"=>array("max"=>42))
	*/
	private $description;

	/**
	 * @column("name"=>"cdate","nullable"=>true,"dbType"=>"datetime")
	 * @validator("type","dateTime")
	 * @transformer("name"=>"datetime")
	*/
	private $cdate;

	/**
	 * @column("name"=>"status","nullable"=>true,"dbType"=>"varchar(10)")
	 * @validator("length","constraints"=>array("max"=>10))
	*/
	private $status;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Exam","name"=>"idExam","nullable"=>false)
	*/
	private $exam;

	/**
	 * @oneToMany("mappedBy"=>"qcm","className"=>"models\\Useranswer")
	*/
	private $useranswers;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\User","name"=>"idUser","nullable"=>false)
	*/
	private $user;

	/**
	 * @manyToMany("targetEntity"=>"models\\Question","inversedBy"=>"qcms")
	 * @joinTable("name"=>"qcmquestion")
	*/
	private $questions;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getName(){
		return $this->name;
	}

	 public function setName($name){
		$this->name=$name;
	}

	 public function getDescription(){
		return $this->description;
	}

	 public function setDescription($description){
		$this->description=$description;
	}

	 public function getCdate(){
		return $this->cdate;
	}

	 public function setCdate($cdate){
		$this->cdate=$cdate;
	}

	 public function getStatus(){
		return $this->status;
	}

	 public function setStatus($status){
		$this->status=$status;
	}

	 public function getExam(){
		return $this->exam;
	}

	 public function setExam($exam){
		$this->exam=$exam;
	}

	 public function getUseranswers(){
		return $this->useranswers;
	}

	 public function setUseranswers($useranswers){
		$this->useranswers=$useranswers;
	}

	 public function addUseranswer($useranswer){
		$this->useranswers[]=$useranswer;
	}

	 public function getUser(){
		return $this->user;
	}

	 public function setUser($user){
		$this->user=$user;
	}

	 public function getQuestions(){
		return $this->questions;
	}

	 public function setQuestions($questions){
		$this->questions=$questions;
	}

	 public function addQuestion($question){
		$this->questions[]=$question;
	}

	 public function __toString(){
		return $this->id.'';
	}

}