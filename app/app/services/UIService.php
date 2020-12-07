<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\User;

class UIService {
    protected $jquery;
    protected $semantic;
    public function __construct(JsUtils $jq) {
        $this->jquery = $jq;
        $this->semantic = $jq->semantic ();
    }
    public function userForm() {
        $frm = $this->jquery->semantic ()->dataForm ( 'form', new User () );
        $frm->setFields ( [
            'id',
            'lastname',
            'email',
            'firstname',
            'submit'
        ] );
        $frm->fieldAsInput ( 'lastname', [
            'rules' => [
                'empty',
                'length[10]'
            ]
        ] );
        $frm->fieldAsInput ( 'email', [
            'inputType' => 'email',
            'rules' => [
                [
                    'email',
                    'Valeur {value} invalide !'
                ]
            ]
        ] );
        $frm->setValidationParams ( [
            "on" => "blur",
            "inline" => true
        ] );
        return $frm;
    }
}
