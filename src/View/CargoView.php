<?php
 
namespace Views{    
 
    require __DIR__ . '/../../vendor/autoload.php';
    
    class CargoView extends BaseView{        
        public function index($cargos){            
            return $this->twig->render('cargos.html.twig', ["cargos" => $cargos]);
        }
    }
}
 
?>