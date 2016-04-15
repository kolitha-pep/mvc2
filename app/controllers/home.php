<?php

use app\core\Controller as Controller;

class home extends Controller
{

    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function index($param = NULL)
    {
        $user = $this->user->find(1);

        $this->view('admin/dashboard', ['user' => $user]);

        /*$this->user->insert([
            'name'  =>  'qqq',
            'email' =>  'fdfdfdf'
        ]);*/
        //$this->user->create(['name' => 'dfdf', 'email' => 'dfdfdfdfdf']);


    }
    
    public function submit()
    {

        echo $this->input['name'];
    }
}