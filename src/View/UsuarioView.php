<?php
 
namespace Views{    
 
    require __DIR__ . '/../../vendor/autoload.php';
    
    class UsuarioView extends BaseView{        
        public function index($usuarios){            
            return $this->twig->render('usuario.html.twig', ["usuarios" => $usuarios]);
        }
    }
}
 
?>