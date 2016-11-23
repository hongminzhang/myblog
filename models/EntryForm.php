<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        //对数据进行过滤，包括必须的和email验证以及intval进行过滤
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}