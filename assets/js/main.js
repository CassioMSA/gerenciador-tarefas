const modal = document.querySelector('.modal-overlay');

function modalDeletar(id){
  const btnDeletar = document.querySelectorAll('.btn-delete');
  const modal = document.querySelector('.modal-overlay');
  modal.classList.add('ativo');
  modal.querySelector('[data-chamado]').value = id;
}

function fecharModal(){
  modal.classList.remove('ativo');
}

function clicarFora(event){
  if(event.target === event.currentTarget){
    modal.classList.remove('ativo');
  }
}
modal.addEventListener('click',clicarFora);