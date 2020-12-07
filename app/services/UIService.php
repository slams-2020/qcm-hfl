<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ajax\service\JArray;
use Ubiquity\orm\DAO;
use models\Question;
use models\Typeq;
use models\User;



class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function questionForm() {
		$q = new Question ();
		$frm = $this->jquery->semantic ()->dataForm ( 'form', $q );
		$frm->setFields ( [ 
				'caption',
				'typeq'
		] );
	//	$types = DAO::getAll ( Typeq::class );
		$q->setTypeq ( current ( $types ) );
		$frm->fieldAsDropDown ( 'typeq', JArray::modelArray ( $types, 'getId' ) );
		return $frm;
	}
	public function userForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new User () );
		$frm->setFields ( [ 
				'Firstname',
				'lastname',
				'email',
		        'password',
				'submit'
		] );
		
		$frm->fieldAsInput('Firstname', [
		       'rules' => [
		           'empty'
		       ]
		       
		]
		    );
		$frm->fieldAsInput ( 'lastname', [ 
				'rules' => [ 
						'empty'
				]
		] );
		
		$frm->fieldAsInput ( 'email', [ 
				'inputType' => 'email',
				'rules' => [ 
						[ 
								'email',
						        'empty',
								'Valeur {value} invalide !'
						]
				]
		] );
		
		$frm->fieldAsInput ( 'password', [    
		    'inputType' => 'password',
		    'rules' => [

		                  'empty',
		                  'length[8]'
		    ]
		] );
		
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}
}