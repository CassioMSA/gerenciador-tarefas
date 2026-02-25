<?php

class Setor{
  private int $id;
  private string $nome;

  public function __construct(string $nome){
    $this->validarNome($nome);
    $this->nome = $nome;
  }

  public function getId(): int{
    return $this->id;
  }

  public function setId(int $id){
    $this->id = $id;
  }

  public function getNome(): string{
    return $this->nome;
  }

  public function validarNome(string $nome): void{
    if(empty($nome)){
       throw new Exception("O nome do setor não pode ser vazio.");
    }
  }
}

?>