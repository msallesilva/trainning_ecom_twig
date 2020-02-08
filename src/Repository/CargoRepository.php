<?php 
 
namespace Repository{
 
    require __DIR__ . '/../../vendor/autoload.php';    
 
    use \PDO;
    use \Entity\BaseEntity;
    use \Entity\Cargo;
    use \Repository\BaseRepository;
    use \Repository\Contracts\BaseRepositoryInterfaces;    
 
    class CargoRepository extends BaseRepository implements BaseRepositoryInterfaces
    {    
        public function find($id)
        {
            $stmt = $this->connection->prepare('
                SELECT 
                    id, 
                    nome,                                          
                FROM cargo 
                WHERE id = :id
            ');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
                    
            $stmt->setFetchMode(PDO::FETCH_INTO, new Cargo());
            return $stmt->fetch();
        }
 
        public function findAll()
        {
            $stmt = $this->connection->prepare('
                SELECT id, nome FROM cargo
            ');
            $stmt->execute();            
            $cargos = $stmt->fetchAll();
 
            if($cargos) {
                foreach($cargos as $cargo) {
                    $result[$cargo['id']] = new Cargo($cargo['id'], $cargo["nome"]);
                }
            }
            return $result;
            
        }
 
        public function save(BaseEntity $cargo)
        {
            $this->beginTransaction();            
 
            // Se existir Id, é uma alteração
            if (!empty($cargo->id)) {
                return $this->update($cargo);
            }
 
            $stmt = $this->connection->prepare('
                INSERT INTO cargo 
                    (nome) 
                VALUES 
                    (:nome)
            ');        
            $stmt->bindParam(':nome', $cargo->nome);            
            $stmt->execute();
            $id = $this->connection->lastInsertId();
            return $id;
        }
 
        public function update(BaseEntity $cargo)
        {
            if (!isset($cargo->id)) {
                throw new \LogicException(
                    'Cargo não existe.'
                );
            }
            $stmt = $this->connection->prepare('
                UPDATE cargo
                SET nome = :nome                     
                WHERE id = :id
            ');
            
            $stmt->bindParam(':nome', $cargo->nome);            
            $stmt->bindParam(':id', $cargo->id);
            return $stmt->execute();
        }    
    }
}
?>
