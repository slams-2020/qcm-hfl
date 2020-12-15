<?php
namespace controllers;
 use Ubiquity\controllers\Router;
use Ubiquity\utils\http\USession;

 /**
  * Controller AccueilController
  * @property \Ajax\php\ubiquity\JsUtils $jquery
  */
class AccueilController extends ControllerBase{

	public function index(){
	    if(USession::get('activeUser')==null){
	        $user='';
	    }
	    else{
	        $user=USession::get('activeUser')['pseudo'];
	    }
	    $this->jquery->postFormOnClick('#loginButton',Router::path('loginPost'),'loginForm');
	    $this->jquery->exec('$(".dropdown").dropdown();',true);
		$this->jquery->renderView("AccueilController/index.html",['nom'=>$user]);
	}
}



?>