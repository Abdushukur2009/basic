<?php

namespace app\models;

use yii\base\Model;

class indexm extends Model{
    public $ism;
    public $username;
    public $password;
    public $password_c;
    public $jins;
    public function rules()
    {
        return [
            [['ism','username','password'],'required'],
            [['ism','username','password'],'string'],
            ['password_c','compare','compareAttribute'=>'passwod']
        ];
    }
}