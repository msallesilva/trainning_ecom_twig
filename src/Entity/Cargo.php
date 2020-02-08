<?php
 
namespace Entity{
 
    require __DIR__ . '/../../vendor/autoload.php';    
    
    class Cargo extends BaseEntity implements \Entity\Contracts\CrudInterface{
        
        private $nome;
 
        public function __construct($id = 0, $nome = '')
        {
            $this->id = $id;
            $this->nome = $nome;
        }
 
        public function getNome()
        {
            return $this->nome;
        }
 
        public function find($id){
 
            $repository = new \Repository\CargoRepository();
            $cargo = $repository->find($id);
            return $cargo;
 
        }
        public function findAll(){
            $repository = new \Repository\CargoRepository;
            $cargos = $repository->findAll();
            return $cargos;
        }
        public function save(){}
        public function delete($id){}
    }
}
 
?>