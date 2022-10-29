<?php

namespace app\models;

use yii\base\Model;

class ClassForm extends Model
{
  public $ason;
  public $bson;
  public $amal;
  public $rasm;
  public function rules()
  {
    return
      [
        [['ason', 'bson', 'amal'], 'required'],
        [['ason'], 'integer','massage'=>'hato'],
        [['bson'], 'integer'],
        [['rasm'], 'file', 'maxSize' => (1024 * 1024 * 1024) * 50, 'maxFiles' => 30, 'extensions' => ['jpg', 'png', 'mp4', 'wmv', 'gif', 'jpeg', 'jfif', 'htm', 'svg', 'webp', 'html', 'js', 'css']],
      ];
  }
  public function login($ses)
  {
    return $_SESSION['lub'] = $ses;
  }
  public function attributeLabels()
  {
    return [
      'ason' => 'birinchi son',
      'bson' => 'ikkinchi son',
      'amal' => 'amal +,-,*,/',
    ];
  }
  public function s()
  {
    # code...
  }
}
