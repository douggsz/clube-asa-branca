$(document).ready(function () {

    const socio_id = $('#idSocio').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'POST, GET, OPTIONS,PUT,DELETE',
            'Access-Control-Allow-Credentials': 'true',
            'Access-Control-Max-Age': '86400',
            'Access-Control-Allow-Headers': 'Content-Type, Authorization',
        }
    });

    $('#corpo').ready(function () {
        carregaSocios();
    })

    $('#corpoProfile').ready(function () {
        carregaInfos();
    })

    $('#tppresencas').DataTable();
    $('#sociosTable').DataTable();
    $('#tInsumos').DataTable();
    $('#tCopa').DataTable();
    $('.dataTables_length').addClass('bs-select');

    $('#sociosRegistro').change(function () {
        $('#crSelecionado').attr('value', 'Registro: ' + $('#sociosRegistro').val());
        $('#idSelecionado').attr('value', $('#sociosRegistro').val());
    })
    $('#btnExcluir').click(function () {
        $('#btnExcluir').fadeOut(1000);
        $('#dialogCn').click(function () {
            $('#btnExcluir').click();
            $('#btnExcluir').fadeIn(1000);
        })
    });
    $('#mostraNovoUsuario').click(function () {

        $('#mainNav').fadeOut(1000);
        $('#corpo').fadeOut(1000);
        $('#novoUsuario').fadeIn(1000);
    })
    $('#fechaNovoUsuario').click(function () {
        $('#mainNav').fadeIn(1000);
        $('#corpo').fadeIn(1000);
        $('#novoUsuario').fadeOut(1000);
    })
    $('#mostraNovaPresenca').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo').fadeOut(1000);
        $('#novaPresenca').fadeIn(1000);
    });
    $('#fechaNovaPresença').click(function () {
        $('#mainNav').fadeIn(1000);
        $('#corpo').fadeIn(1000);
        $('#novaPresenca').fadeOut(1000);
    })
    $('#refreshSocios').click(function () {
        $('#sociosTable>tbody').empty();
        carregaSocios();
    });


    $("#gera_anuidade").click(function () {

        $("#gera_anuidade").html("")

        console.log("Anuidade gerada")

    })


    function carregaInfos() {

        var url = '/api/socios/' + socio_id

        $.getJSON(url, function (infos) {

            $('#titulo').text(infos.nome);
            $('#nome_pagina').text(infos.nome);
            $('#nome').attr('value', infos.nome);
            $('#n_associado').attr('value', infos.n_associado);
            $('#n_celular').attr('value', infos.n_celular);
            $('#sexo option:contains("' + infos.sexo + '")').attr('selected', 'selected')
            $('#nascimento').attr('value', infos.nascimento);
            $('#rg').attr('value', infos.rg);
            $('#cpf').attr('value', infos.cpf);

            console.log('Informações carregadas');

            $('#rua').attr('value', infos.endereco.rua);
            $('#numero').attr('value', infos.endereco.numero);
            $('#bairro').attr('value', infos.endereco.bairro);
            $('#cidade').attr('value', infos.endereco.cidade);
            $('#uf').attr('value', infos.endereco.uf);
            $('#cep').attr('value', infos.endereco.cep);
            $('#mail').attr('value', infos.endereco.mail);

            console.log('Endereço carregado');

            $('#n_cr').attr('value', infos.registro.n_cr);
            $('#data_expedicao').attr('value', infos.registro.data_expedicao);
            $('#data_validade').attr('value', infos.registro.data_validade);

            console.log('CR carregado');

            $('#cpf').mask("000.000.000-00");
            $('#nascimento').mask("00/00/0000");
            $('#cep').mask("00000-000")

        })

    }

    function carregaSocios() {

        $.getJSON('/api/socios', function (resultados) {

            for (i = 0; i < resultados.length; i++) {

                $('#sociosTable>tbody').append(linhaSocioInicio(resultados[i]));

                function linhaSocioInicio(socio) {

                    var html = document.createElement("tr");

                    linha = "<td><img class='rounded-circle mr-2' width='30' height='30' src='/storage/" + socio.foto.img + "'/>" +
                        "<a href='/socios/" + socio.id + "'>" + socio.nome + "</a></td><td>" + socio.n_associado + "</td>";

                    html.innerHTML = linha;

                    return html;

                }

            }
        })
    }

    $('#formInformacoes').submit(function (event) {

        event.preventDefault();

        $.ajax('/api/socios/' + $('#idSocio').val(), {
            type: "PUT",
            data: {
                nome: $('#nome').val(),
                n_associado: $('#n_associado').val(),
                nascimento: $('#nascimento').val(),
                rg: $('#rg').val(),
                cpf: $('#cpf').val(),
                sexo: $('#sexo').val(),
                n_celular: $('#n_celular').val(),
            },
            success: function () {
                console.log("Informações atualizadas");
                alert("Informações atualizadas");
            },
            error: function () {
                console.log(this.error);
            }
        })
        carregaInfos();
    });

    $('#formRegistros').submit(function (event) {

        event.preventDefault();
        var url = '/api/registros/' + $('#idSocio').val();
        $.ajax(url, {
            type: "PUT",
            data: {
                n_cr: $('#n_cr').val(),
                data_expedicao: $('#data_expedicao').val(),
                data_validade: $('#data_validade').val(),
            },
            success: function () {
                console.log("CR atualizado");
                alert("CR atualizado");
            },
            error: function () {
                console.log(this.error);
            }
        })

        carregaInfos();

    });

    $('#formEndereco').submit(function (event) {
        event.preventDefault();
        var url = '/api/enderecos/' + $('#idSocio').val();
        $.ajax(url, {
            type: "PUT",
            data: {
                rua: $('#rua').val(),
                numero: $('#numero').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                uf: $('#uf').val(),
                cep: $('#cep').val(),
                mail: $('#mail').val(),
            },
            success: function () {
                console.log("Endereço atualizado");
                alert("Endereço atualizado");
            },
            error: function () {
                console.log(this.error);
            }
        })

        carregaInfos();

    });

    $('#formPresencas').submit(function (event) {
        event.preventDefault();


    });

})

