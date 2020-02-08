<?php
namespace Entity{
    
    require __DIR__ . '/../../vendor/autoload.php';    
 
    abstract class BaseEntity {
 
        protected $id;
        protected $dataCriacao;
        protected $usuarioCriacao;
        protected $dataAlteracao;
        protected $usuarioAlteracao;
 
        public function __set($atrib, $value){
            $this->$atrib = $value;
        }
 
        public function __get($atrib){
            return $this->$atrib;
        }
 
        public function getId(){
            return $this->id;
        }
    }
}
?>
