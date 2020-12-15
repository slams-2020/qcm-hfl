<?php
namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Group;
use services\UIService;

 /**
  * Controller GroupController
  */

class GroupController extends ControllerBase{
    
    private $uiService;
    public function initialize() {
        parent::initialize ();
        $this->uiService = new UIService ( $this->jquery );
    }

    public function index() {
        $frm = $this->uiService->GroupForm();
        $frm->fieldAsSubmit ( 'submit', 'green', 'GroupController/submit', '#response', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ] );
        
        $this->jquery->renderView ( "GroupController/index.html" );
    }
    
    public function submit() {
        $group = new Group();
        URequest::setValuesToObject ( $group );
        DAO::insert ( $group );
        $this->jquery->renderView ( "FormsController/index.html" );
        
    }
}
