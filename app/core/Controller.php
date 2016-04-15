<?php

namespace app\core;

class Controller
{
    public $input;

    public function __construct()
    {
        $this->input = $_POST;
    }

    public function model($model)
    {
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }

    public function view($file, $data = null)
    {
        require_once '../app/views/'.$file.'.php';
    }
}