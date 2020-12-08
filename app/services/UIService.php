<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\Question;
use models\User;

class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function qcmForm() {
		$q = new Question ();
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Question () );
		$frm->setFields ( [ 
				'caption',
				'typeq',
				'submit'
		] );

		$frm->setCaptions ( [ 
				'question',
				'type de question'
		] );

		$frm->fieldAsInput ( 'caption', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsInput ( 'typeq', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}
	public function userForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new User () );
		$frm->setFields ( [ 
				'Firstname',
				'lastname',
				'login',
				'email',
				'password',
				'submit'
		] );

		$frm->setCaptions ( [ 
				'name',
				'Firstname',
				'pseudo',
				'email',
				'password'
		] );

		$frm->fieldAsInput ( 'Firstname', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'lastname', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsInput ( 'login', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsInput ( 'email', [ 
				'inputType' => 'email',
				'rules' => [ 
						[ 
								'empty',
								'email'
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