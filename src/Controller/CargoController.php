<?php
// src/Controller/LuckyController.php
namespace App\Controller;
 
require __DIR__ . '/../../vendor/autoload.php';
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
class CargoController
{
    /**
      * @Route("/cargos")
    */
    public function list()
    {
        $cargoView = new \Views\CargoView();
 
        $cargoModel = new \Entity\Cargo();
        $cargos = $cargoModel->findAll();    
 
        $resultado = $cargoView->index($cargos);
 
        return new Response(
            $resultado
        );
    }
}
 
?>
