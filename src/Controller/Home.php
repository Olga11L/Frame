<?php
 
namespace App\Controller;
 
use Frame\AbstractController;
 
class Home extends AbstractController
{
    public function print() 
    {
        return $this->render('home');
    }
}

