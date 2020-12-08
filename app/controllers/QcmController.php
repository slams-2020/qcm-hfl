<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Question;
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
		$frm = $this->uiService->qcmForm ();
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
	}
}
