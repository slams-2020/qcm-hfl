<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\User;
use models\Qcm;
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
        $frm = $this->uiService->userForm ();
        $frm->fieldAsSubmit ( 'submit', 'green', 'QcmController/submit', '#response', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ] );
        
        $this->jquery->renderView ( "QcmController/index.html" );
    }
    public function submit() {
        $qcm = new Qcm ();
        URequest::setValuesToObject ( $qcm );
        DAO::insert ( $qcm );
    }
}
