<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\User;
use services\UIService;
/**
 * Controller FormsController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class LoginController extends ControllerBase {
    private $uiService;
    public function initialize() {
        parent::initialize ();
        $this->uiService = new UIService ( $this->jquery );
    }
    public function index() {
        $frm = $this->uiService->userForm ();
        $frm->fieldAsSubmit ( 'submit', 'green', 'LoginController/submit', '#response', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ] );
        
        $this->jquery->renderView ( "LoginController/index.html" );
    }
    public function submit() {
        $user = new User ();
        URequest::setValuesToObject ( $user );
        DAO::insert ( $user );
    }
}



