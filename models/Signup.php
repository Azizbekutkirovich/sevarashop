<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
	public $name;
	public $phone;
	public $password;

	public function rules()
    {
        return [
            [['name', 'phone', 'password'], 'required'],
            [['name', 'phone', 'password'], 'string', 'max' => 255],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'password' => 'Password',
        ];
    }

    protected function save() {
    	$user = new Users();
    	$user->name = $this->name;
    	$user->phone = $this->phone;
    	$user->password = $this->password;
    	if ($user->save()) {
    		return true;
    	}
    }

    public function create() {
    	return $this->save();
    }
}