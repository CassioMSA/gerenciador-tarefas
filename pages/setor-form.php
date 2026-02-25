<?php
require_once __DIR__ . '/../src/classes/Setor.php';
require_once __DIR__ . '/../src/repositories/RepositorioSetor.php';
require_once __DIR__ . '/../config/session.php';

if(!empty($_POST['nome'])){
  $setor = new Setor($_POST['nome']);
  $repositorioSetor = new RepositorioSetor();
  $repositorioSetor->add($setor);
  
  header('Location: setor-form.php');
  exit;  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionário</title>
</head>
<body>
     <?php include_once __DIR__ . "\layout-topo.php"; ?>


  <div class="container">

    <div class="header">
      <div class="title">Cadastro de Setor</div>
    </div>

    <div class="form-box">

      <form method="POST">

        <div class="form-group">
          <label>Nome do Setor</label>
          <input type="text" name="nome">
        </div>

        <div class="actions">
          <button class="btn btn-primary">Salvar</button>
          <a href="setores.php" class="btn">Cancelar</a>
        </div>

      </form>

    </div>

    <div class="table-box">

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $repositorio = new RepositorioSetor();
            foreach($repositorio->getAll() as $value){
          ?>
            <tr>
              <td><?= $value->getId() ?></td>
              <td><?= $value->getNome() ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

  </div>
</body>
</html>