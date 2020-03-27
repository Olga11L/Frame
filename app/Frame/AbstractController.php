<?php
 
namespace Frame;
use Frame\FlashBag;
use Twig\Environlent;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    private $templateEngine;
    private $flashbag;
 
    public function __construct() 
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)) . '/templates');
        $this->templateEngine = new \Twig\Environment($loader);
         $this->flashbag =new FlashBag();
    }

    protected function flash(){
        return $this->flashbag;
    }

    protected function render($view, $vars = [])
    {
        return $this->templateEngine->render($view.'.html.twig', $vars);
    }

    protected function redirectToRoute($url)
    {
        header('location:'.$url);
        exit();
    }
}
