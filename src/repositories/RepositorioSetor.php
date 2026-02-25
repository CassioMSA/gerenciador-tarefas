<?php

require_once __DIR__ . '/../classes/Setor.php';

class RepositorioSetor{

  public function add(Setor $setor): void{
    if(!isset($_SESSION['dados']['setor'])){    
      $_SESSION['dados']['setor'] = [];
    }
    if(!isset($_SESSION['contadorSetor'])){   
        $_SESSION['contadorSetor'] = 1;
    } 
    
    $id = $_SESSION['contadorSetor']++;

    $setor->setId($id);
  
    $_SESSION['dados']['setor'][$id] = $setor;
  }

  public function getAll(): array{
    return $_SESSION['dados']['setor'] ?? [];
  }

  public function getById(int $id): ?Setor{
    return $_SESSION['dados']['setor'][$id] ?? null;
  }

  public function updade(Setor $setor): bool{
    if($this->getById($setor->getId()) !== null){
      $_SESSION['dados']['setor'][$setor->getId()] = $setor;
      return true;
    }else{
      return false;
    }
  }

  public function delete(int $id): bool{
    if($this->getById($id) !== null) {
      unset($_SESSION['dados']['setor'][$id]);
      return true;
    }else{
      return false;
    }
  }

  
}

?>
