<?php
require_once __DIR__ . '/../src/classes/Funcionario.php';
require_once __DIR__ . '/../src/repositories/RepositorioFuncionario.php';
require_once __DIR__ . '/../src/repositories/RepositorioSetor.php';
require_once __DIR__ . '/../config/session.php';


if(!empty($_POST['nome'])){
  $funcionario = new Funcionario($_POST['nome']);
  $repositorioFuncionario = new RepositorioFuncionario();
  $repositorioFuncionario->add($funcionario);
  $setor = new RepositorioSetor();

  header('Location: funcionario-form.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <?php include_once __DIR__ . "\layout-topo.php"; ?>

<div class="container">

  <div class="header">
    <div class="title">Cadastro de Funcionário</div>
  </div>

  <div class="form-box">
    <form method="POST">

      <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome">
      </div>

      <div class="actions">
        <button class="btn btn-primary">Salvar</button>
        <a href="funcionarios.php" class="btn">Cancelar</a>
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
        $repoSetor = new RepositorioSetor();
        $repoFuncionario = new RepositorioFuncionario();

        foreach($repoFuncionario->getAll() as $value){
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