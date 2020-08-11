$(document).ready(function () {

    $('#tpresencas').DataTable();
    $('.dataTables_length').addClass('bs-select');

    $('#mostraNovaPresenca').click(function () {
        $('#barraLateral').hide();
        $('#corpo').hide();
        $('#novoUsuario').show();
    })

    $('#fechaNovaPresença').click(function () {
        $('#barraLateral').show();
        $('#corpo').show()
        $('#novoUsuario').hide()
    })

    $('#sociosRegistro').change(function () {
        $('#crSelecionado').attr('value', 'Registro: ' + $('#sociosRegistro').val());
        $('#idSelecionado').attr('value', $('#sociosRegistro').val());
    })
    $('#tPassadas').DataTable();
    $('.dataTables_length').addClass('bs-select');

    $('#mostraNovaPassada').click(function () {
        $('#barraLateral').hide();
        $('#corpo').hide();
        $('#novaPassada').show();
    });

    $('#fechaNovaPassada').click(function () {
        $('#barraLateral').show();
        $('#corpo').show();
        $('#novaPassada').hide();
    })

    $('#sociosTable').DataTable();
    $('.dataTables_length').addClass('bs-select');

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
