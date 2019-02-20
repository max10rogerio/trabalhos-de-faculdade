$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('id');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Item #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})


$(document).ready(function () { 
  var cpf = $("#CPF");
  cpf.mask('000.000.000-00', {reverse: true});
});