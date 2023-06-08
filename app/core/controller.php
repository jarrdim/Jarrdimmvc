<?php
defined("ROOTPATH") OR exit('Access denied');

class Controller
{
    public function view($view, $data=[])
    {
        extract($data);

        $filename = "../app/views/".$view.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }
        else
        {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }    
}