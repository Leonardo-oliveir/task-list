$(document).on("click", ".excludeTask", function () {

    // var tarefa = $('tr').data('id');

    var id = $(this).val();
    var titulo = $(this).data('title');
    var tarefa = $(this).data('tarefa')
    
    Swal.fire({
        title: 'Você tem certeza que deseja excluir a tarefa ' + titulo + '?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: `Não, cancelar`,
    }).then((result) => {
        console.log(this)
        if (result.isConfirmed) {

            
            $.ajax({
                url: 'ajax-task-delete',
                type: 'POST',
                data: {'id': id,
                'titulo': titulo,
                'tarefa': tarefa},
                success: function(result){
                    $('#'+id).remove();
             
                  // Retorno se tudo ocorreu normalmente
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  // Retorno caso algum erro ocorra
                }
            });

        }
    })
});

