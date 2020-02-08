<?php
// src/Controller/LuckyController.php
namespace App\Controller;
 
require __DIR__ . '/../../vendor/autoload.php';
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
class UsuarioController
{
    /**
      * @Route("/usuarios")
    */
    public function list()
    {
        $usuarioView = new \Views\UsuarioView();
 
        $usuarioModel = new \Entity\Usuario();
        $usuarios = $usuarioModel->findAll();    
 
        $resultado = $usuarioView->index($usuarios);
 
        return new Response(
            $resultado
        );
    }
}
 
?>
