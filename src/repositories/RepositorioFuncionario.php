<?php
require_once __DIR__ . '/../classes/Funcionario.php';

class RepositorioFuncionario{

  public function add(Funcionario $funcionario): void{
    if(!isset($_SESSION['dados']['funcionario'])){
      $_SESSION['dados']['funcionario'] = [];
    }

    if(!isset($_SESSION['contadorFunc'])){
      $_SESSION['contadorFunc'] = 1;
    }

    $id = $_SESSION['contadorFunc']++;
    $funcionario->setId($id);

    $_SESSION['dados']['funcionario'][$id] = $funcionario;

  }

  public function getAll():array{
    return $_SESSION['dados']['funcionario'] ??[];
  }

  public function getById(int $id): ?Funcionario{
    return $_SESSION['dados']['funcionario'][$id] ?? null;
  }

  public function update(Funcionario $funcionario): bool{
    if($this->getById($funcionario->getId()) !== null){
      $_SESSION['dados']['funcionario'][$funcionario->getId()] = $funcionario;
      return true;
    }else{
      return false;
    }
  }

  public function delete(int $id){
    if($this->getById($id) !== null){
      unset($_SESSION['dados']['funcionario'][$id]);
      return true;
    }else 
    return false;
  }


}



?>