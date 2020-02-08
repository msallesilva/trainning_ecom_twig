<?php
 
namespace Views{    
 
    require __DIR__ . '/../../vendor/autoload.php';
 
    class BaseView{
    
        protected $loader;
        protected $twig;
 
        public function __construct()
        {
            $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
            $this->twig   = new \Twig\Environment($this->loader);
        }
    }
}
?>
