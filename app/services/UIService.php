<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\Qcm;
use models\Question;
use models\User;

class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function questionForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Question () );
		$frm->setFields ( [ 
				'caption',
				'typeq',
				'points',
				'idType',
				'submit'
		] );

		$frm->setCaptions ( [ 
				'question',
				'Nombre de points',
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

		$frm->fieldAsInput ( 'points', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsDataList ( 'idType', [ 
				'multiple',
				'ouverte'
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
				'password',
				'bouton'
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
	public function qcmForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Qcm () );
		$frm->setFields ( [ 
				'name',
				'description',
				'cdate'
		] );

		$frm->setCaptions ( [ 
				'Name QCM',
				'Desciption QCM',
				'Date'
		] );

		$frm->fieldAsInput ( 'name', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsInput ( 'descrption', [ 
				'rules' => [ 
						'empty'
				]
		] );

		$frm->fieldAsInput ( 'cdate', [ 
				'inputType' => 'date',
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
}