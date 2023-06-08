<?php

defined("ROOTPATH") OR exit('Access denied');

class Reset extends Model
{
    public $errors= [];
    protected $table = 'reset';
    protected $allowedColumns = [
        'email',
        'code',
        'expire',
    ];
/*
    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['expire'])) && is_numeric($data['expire']))
        {
            $this->errors['expire']='Invalid code';
        }
        if(empty(trim($data['email'])))
        {
            $this->errors['email']='Please enter your email';
        }
        elseif(!filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL) )
        {
              $this->errors['email'] = "Please, enter valid email!";
        }
        if(empty(trim($data['code'])) && is_numeric($data['code']))
        {
            $this->errors['code'] = "Code is not valid";
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }
    */
}