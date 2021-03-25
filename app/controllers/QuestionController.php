<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Question;
use models\Typeq;
use models\User;
use services\UIService;

/**
 * Controller QuestionController
 */
class QuestionController extends ControllerBase {
	private $uiService;
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	public function index() {
		$frm = $this->uiService->questionForm ();
		$frm->fieldAsSubmit ( 'submit', 'green', 'QuestionController/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );
		$frm->fieldAsSubmit ( 'submit', 'green', 'QuestionController/submit', '#import', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );

		$this->jquery->renderView ( "QcmController/index.html" );

		$question = DAO::getAll ( Question::class );
		$this->loadView ( "QuestionController/index.html", [ 
				"question" => $question
		] );
	}
	public function submit() {
		$question = new Question ();
		URequest::setValuesToObject ( $question );
		DAO::insert ( $question );
		$user = DAO::getById ( User::class, 1 );
		$question->setUser ( $user );
		$idType = $_POST ["idType"];
		$typeq = DAO::getById ( Typeq::class, $idType );
		$question->setTypeq ( $typeq );
		DAO::save ( $question );
	}
}
