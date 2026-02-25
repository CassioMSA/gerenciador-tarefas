 <?php
require_once __DIR__ . '/Funcionario.php';

class Chamado{
  private ?int $id = null;
  private string $titulo;
  private string $descricao;
  private int $funcionarioId;
  private int $setorId;

  public function __construct(string $titulo, string $descricao,int $funcionarioId, int $setorId){
    $this->validarTitulo($titulo);
    $this->validarFuncionarioId($funcionarioId);
    $this->validarDescricao($descricao);
    $this->validarSetorId($setorId);

    $this->titulo = $titulo;
    $this->funcionarioId = $funcionarioId;
    $this->descricao = $descricao;
    $this->setorId = $setorId;
  }

  public function getId(): int{
    return $this->id;
  }

  public function setId(int $id): void{
    $this->id = $id;
  }

  public function getTitulo(): string{
    return $this->titulo;
  }

  public function setTitulo(string $titulo){
    $this->titulo = $titulo;
  }

  public function getDescricao(): string{
    return $this->descricao;
  }

  public function setDescricao(string $descricao){
    return $this->descricao = $descricao;
  }

  public function getFuncionarioId(): int{
    return $this->funcionarioId;
  }

  public function setFuncionarioId(int $funcionarioId){
    $this->funcionarioId = $funcionarioId;
  }

  public function getSetorId(): int{
    return $this->setorId;
  }

  public function setSetorId(int $id){
    $this->setorId = $id;
  }

  public function validarTitulo(string $titulo): void{
    if(empty($titulo)){
       throw new Exception("O titulo do chamdo não pode ser vazio.");
    }
  }

  public function validarDescricao(string $descricao): void{
    if(empty($descricao)){
       throw new Exception("A descrição do chamdo não pode ser vazio.");
    }
  }

  public function validarFuncionarioId(int $funcionarioId): void{
    if($funcionarioId < 0){
       throw new Exception("O funcionário não pode ser vazio.");
    }
  }

  public function validarSetorId(int $setorId): void{
    if($setorId < 0){
       throw new Exception("O setor não pode ser vazio.");
    }
  }
}

?>