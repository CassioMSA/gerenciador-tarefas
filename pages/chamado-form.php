<?php
require_once __DIR__ . '/../src/classes/Chamado.php';
require_once __DIR__ . '/../src/repositories/RepositorioFuncionario.php';
require_once __DIR__ . '/../src/repositories/RepositorioSetor.php';
require_once __DIR__ . '/../src/repositories/RepositorioChamado.php';
require_once __DIR__ . '/../config/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repositorio = new RepositorioChamado();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      // UPDATE
        $id = (int)$_GET['id'];
        $chamado = $repositorio->getById($id);
        $chamado->setTitulo($_POST['titulo']);
        $chamado->setDescricao($_POST['descricao']);
        $chamado->setFuncionarioId($_POST['funcionario']);
        $chamado->setSetorId($_POST['setor']);
        $repositorio->update($chamado);

    } else {
       // ADD
        $chamado = new Chamado(
          $_POST['titulo'],
          $_POST['descricao'],
          $_POST['funcionario'],
          $_POST['setor']
        );
        $repositorio->add($chamado);
    }

  header('Location: chamado-form.php');
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

  <?php include "layout-topo.php"; ?>

  <div class="container">
      <div class="header">
        <?php if(isset($_GET['id']) && !empty($_GET['id'])){?>
          <div class ="title">Editar Chamado</div>
        <?php }else { ?>
          <div class="title">Cadastro de Chamado</div>
        <?php }?>
      </div>

      <div class="form-box">
        <form method="POST">
          <div class="form-group">
            <?php
            $repoChamado = new RepositorioChamado(); 
            $chamado = null;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = (int) $_GET['id'];
                $chamado = $repoChamado->getById($id);
            }
            ?>
            
            <label>Título</label>
            <input type="text" name="titulo" value="<?= isset($_GET['id']) ? $chamado->getTitulo()  : ''  ?>">
          </div>

          <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao"><?= isset($_GET['id']) ?  $chamado->getDescricao() : null ?></textarea>
          </div>

          <div class="form-group">
            <label>Funcionário</label>
              <select name="funcionario">
                <option value="">--Selecione--</option>
                <?php
                  $funcionarioSelecionado = isset($_GET['id']) ? $chamado->getFuncionarioId() : null;
                  $repoFuncionario = new RepositorioFuncionario();
                  foreach($repoFuncionario->getAll() as $value){
                ?>
                  <option value="<?= $value->getId() ?>"
                  <?= $funcionarioSelecionado == $value->getId() ? 'selected' :'' ?>
                  >
                    <?= $value->getNome() ?>
                  </option>
                <?php }?>
              </select>
          </div>

          <div class="form-group">
            <label>Setor</label>
            <select name="setor">
                <option value="">--Selecione--</option>
                <?php 
                $setorSelecionado = isset($_GET['id']) ?  $chamado->getSetorId() : null;
                $setor = new RepositorioSetor();
                foreach($setor->getAll() as $value){
                ?>
                <option value="<?= $value->getId(); ?>"
                  <?= $setorSelecionado == $value->getId() ? 'selected' : '' ?>
                > 
                  <?= $value->getNome(); ?>
                </option>
                <?php } ?>
              </select>
            </div>

          <div class="actions">
            <button class="btn btn-primary">Salvar</button>
            <a href="/gerenciador-tarefas/index.php" class="btn">Cancelar</a>
          </div>
        </form>
      </div>
  </div>
  
</body>
</html>