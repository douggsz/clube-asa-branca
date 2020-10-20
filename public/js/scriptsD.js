$(document).ready(function () {

    $('#tppresencas').DataTable();
    $('#sociosTable').DataTable();
    $('.dataTables_length').addClass('bs-select');


    $('#mostraNovaPresenca').click(function () {
        $('#barraLateral').hide();
        $('#corpo').hide();
        $('#novaPresenca').show();
    });

    $('#fechaNovaPresença').click(function () {
        $('#barraLateral').show();
        $('#corpo').show()
        $('#novaPresenca').hide()
    })

    $('#sociosRegistro').change(function () {
        $('#crSelecionado').attr('value', 'Registro: ' + $('#sociosRegistro').val());
        $('#idSelecionado').attr('value', $('#sociosRegistro').val());
    })

    $('#btnExcluir').click(function () {
        $('#btnExcluir').hide();
        $('#dialogCn').click(function () {
            $('#btnExcluir').click();
            $('#btnExcluir').show();
        })
    });

    $('#mostraNovoUsuario').click(function () {

        $('#barraLateral').hide();
        $('#corpo').hide();
        $('#novoUsuario').show();
    })

    $('#fechaNovoUsuario').click(function () {
        $('#barraLateral').show();
        $('#corpo').show();
        $('#novoUsuario').hide();
    })
})
