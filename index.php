<?php
require_once __DIR__ . '/src/repositories/RepositorioChamado.php';
require_once __DIR__ . '/src/repositories/RepositorioFuncionario.php';
require_once __DIR__ . '/src/repositories/RepositorioSetor.php';
require_once __DIR__ . '/config/session.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  if(isset($_POST['deletar'])){
    $deletar = new RepositorioChamado();
    $deletar->delete($_POST['id']);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once __DIR__ . "\pages\layout-topo.php"; ?>
</head>
<body>

<div class="container">
  <div class="header">
    <div class="title">Chamados</div>
    <a href="pages/chamado-form.php" class="btn btn-primary">Novo</a>
  </div>


  <div class="table-box">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Descrição</th>
          <th>Funcionario</th>
          <th>Setor</th>
          <th>Ações</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
      <?php
        $repoChamado = new RepositorioChamado();
        $repoFuncionarios = new RepositorioFuncionario();
        $repoSetor = new RepositorioSetor();
        foreach($repoChamado->getAll() as $value){
          $funcionario = $repoFuncionarios->getById($value->getFuncionarioId());
          $setor = $repoSetor->getById($value->getSetorId());
      ?>
        <tr>
          <td><?= $value->getId() ?></td>
          <td><?= $value->getTitulo()?></td>
          <td><?= $value->getDescricao()?> </td>
          <td><?= $funcionario->getNome() ?></td>
          <td><?= $setor->getNome() ?></td>

          <td>
            <a href="pages/chamado-form.php?id=<?= $value->getId() ?>" class="btn btn-edit">Editar</a>
          </td>
          <td>
            <button onClick="modalDeletar(<?= $value->getId() ?>)" class="btn btn-delete">Excluir</button>
          </td>
        </tr>
      <?php }?>

      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/components/modal/modalExcluir.php'; ?>

<script src ="assets/js/modal.js"></script>
</body>
</html>