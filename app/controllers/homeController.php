<?php
namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\User;
use services\UIService;

/**
 * Controller homeController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class FormsController extends ControllerBase {
    private $uiService;
    public function initialize() {
        parent::initialize ();
        $this->uiService = new UIService ( $this->jquery );
    }
    public function index() {
        $frm = $this->uiService->userForm ();
        $frm->fieldAsSubmit ( 'submit', 'green', 'homeController/submit', '#response', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ] );
        
        $this->jquery->renderView ( "homeController/index.html" );
    }
    public function submit() {
        $user = new User ();
        URequest::setValuesToObject ( $user );
        DAO::insert ( $user );
    }
}


?>