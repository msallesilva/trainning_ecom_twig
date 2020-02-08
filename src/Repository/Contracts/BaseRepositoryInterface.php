<?php
 
namespace Repository\Contracts{
 
    require __DIR__ . '/../../../vendor/autoload.php';    
 
    use \Entity\BaseEntity;
 
    Interface BaseRepositoryInterfaces{
 
        public function find($id);
 
        public function findAll();
        
        public function save(BaseEntity $entity);
 
        public function update(BaseEntity $entity);
    }
}
?>
