<?php
 
namespace Entity{
 
    require __DIR__ . '/../../vendor/autoload.php';    
    
    class Usuario extends BaseEntity implements \Entity\Contracts\CrudInterface{
        
        private $nome,$sobrenome,$email,$nascimento,$ativo;

 
        public function __construct($id = 0, $nome = '',$sobrenome = '',$email = '',$nascimento = '',$ativo = '')
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->email = $email;
            $this->nascimento = $nascimento;
            $this->ativo = $ativo;
        }
 
        public function getNome()
        {
            return $this->nome;
        }

        public function getSobreNome()
        {
            return $this->sobrenome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getNascimento()
        {
            return $this->nascimento;
        }

        public function getAtivo()
        {
            return $this->ativo;
        }
 
        public function find($id){
 
            $repository = new \Repository\UsuarioRepository();
            $usuario = $repository->find($id);
            return $usuario;
 
        }
        public function findAll(){
            $repository = new \Repository\UsuarioRepository;
            $usuarios = $repository->findAll();
            return $usuarios;
        }
        public function save(){}
        public function delete($id){}
    }
}
 
?>