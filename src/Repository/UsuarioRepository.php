<?php 
 
namespace Repository{
 
    require __DIR__ . '/../../vendor/autoload.php';    
 
    use \PDO;
    use \Entity\BaseEntity;
    use \Entity\Usuario;
    use \Repository\BaseRepository;
    use \Repository\Contracts\BaseRepositoryInterfaces;    
 
    class UsuarioRepository extends BaseRepository implements BaseRepositoryInterfaces
    {    
        public function find($id)
        {
            $stmt = $this->connection->prepare('
            SELECT id,
                     nome,
                     sobrenome,
                     email,
                     senha, 
                     nascimento, 
                     ativo, 
                     id_perfil

            FROM usuarios
            where id = :id
            ');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
                    
            $stmt->setFetchMode(PDO::FETCH_INTO, new Usuario());
            return $stmt->fetch();
        }
 
        public function findAll()
        {
            $stmt = $this->connection->prepare('
            SELECT id, nome, sobrenome, email, senha, nascimento, ativo, id_perfil
            FROM usuarios
            ');
            $stmt->execute();            
            $usuarios = $stmt->fetchAll();
 
            if($usuarios) {
                foreach($usuarios as $usuario) {
                    $result[$usuario['id']] = new Usuario($usuario['id'], $usuario["nome"]);
                }
            }
            return $result;
            
        }
 
        public function save(BaseEntity $usuario)
        {
            $this->beginTransaction();            
 
            // Se existir Id, é uma alteração
            if (!empty($usuario->id)) {
                return $this->update($usuario);
            }
 
            $stmt = $this->connection->prepare('
                INSERT INTO usuario 
                    (nome) 
                VALUES 
                    (:nome)
            ');        
            $stmt->bindParam(':nome', $usuario->nome);            
            $stmt->execute();
            $id = $this->connection->lastInsertId();
            return $id;
        }
 
        public function update(BaseEntity $usuario)
        {
            if (!isset($usuario->id)) {
                throw new \LogicException(
                    'Cargo não existe.'
                );
            }
            $stmt = $this->connection->prepare('
                UPDATE usuario
                SET nome = :nome                     
                WHERE id = :id
            ');
            
            $stmt->bindParam(':nome', $usuario->nome);            
            $stmt->bindParam(':id', $usuario->id);
            return $stmt->execute();
        }    
    }
}
?>
