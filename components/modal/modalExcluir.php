
<div class="modal-overlay" id="modalExcluir">

  <div class="modal">
    <h2>Excluir Chamado</h2>

    <p>
      Tem certeza que deseja excluir este chamado?
      Essa ação não poderá ser desfeita.
    </p>

    <div class="modal-actions">
      <button class="btn btn-secondary" onclick="fecharModal()">
        Cancelar
      </button>

      <form method="POST" action="">
        <input type="hidden" data-chamado name="id" id="chamadoId">
        <button type="submit" name="deletar" class="btn btn-deletar">
          Excluir
        </button>
      </form>
    </div>

  </div>

</div>