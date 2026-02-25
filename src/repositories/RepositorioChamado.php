<?php
require_once __DIR__ . '/../classes/Chamado.php';


class RepositorioChamado{
  public function add(Chamado $chamado){
    if(!isset($_SESSION['dados']['chamado'])){
      $_SESSION['dados']['chamado']= [];
    }

    if(!isset($_SESSION['contadorChamado'])){
      $_SESSION['contadorChamado'] = 1;
    } 

    $id = $_SESSION['contadorChamado']++;
    $chamado->setId($id);

    $_SESSION['dados']['chamado'][$id] = $chamado;
  }
  
  public function getAll(): array{
    return $_SESSION['dados']['chamado'] ?? [];
  }

  public function getById(int $id): ?Chamado{
    return $_SESSION['dados']['chamado'][$id] ?? null;
  }

  public function update(Chamado $chamado){
    if($this->getById($chamado->getId()) !== null){
      $_SESSION['dados']['chamado'][$chamado->getId()] = $chamado;
      return true;
    }else{
      return false;
    }
  }

  public function delete (int $id){
    if($this->getById($id) !== null){
      unset($_SESSION['dados']['chamado'][$id]);
      return true;
    }else{
      return false;
    }
  }

}
?>