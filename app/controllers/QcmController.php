<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Qcm;
use models\Question;
use models\Typeq;
use models\User;
use services\UIService;

/**
 * Controller QcmController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class QcmController extends ControllerBase {
	private $uiService;
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	public function index() {
		$frm = $this->uiService->questionForm ();
		$frm->fieldAsSubmit ( 'submit', 'green', 'QcmController/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );

		$this->jquery->renderView ( "QcmController/index.html" );
	}
	public function submit() {
		$question = new Question ();
		URequest::setValuesToObject ( $question );
		DAO::insert ( $question );
		$qcm = new Qcm ();
		URequest::setValuesToObject ( $qcm );
		DAO::insert ( $qcm );
		// var_dump ( $_POST );
		$user = DAO::getById ( User::class, 1 );
		$question->setUser ( $user );
		$idType = $_POST ["idType"];
		$typeq = DAO::getById ( Typeq::class, $idType );
		$question->setTypeq ( $typeq );
		DAO::save ( $question );
	}
	public function qcm() {
		$frm = $this->uiService->qcmForm ();
		$frm->fieldAsSubmit ( 'submit', 'green', 'QcmController/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );
		$this->jquery->renderView ( "QcmController/qcm.html" );
	}
}

