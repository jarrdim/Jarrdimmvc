
<?php

defined("ROOTPATH") OR exit('Access denied');

class Home extends Controller
{
    public function index()
    {
 

        
        $data['title'] = 'home page';

       $this->view('home',$data);
    }

}
