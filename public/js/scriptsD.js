$(document).ready(function () {

    const socio_id_profile = $('#idSocio').val();

    $('#corpo').ready(function () {
        carregaSocios();
    })

    $('#corpoProfile').ready(function () {
        carregaInfos();
        carregaEndr();
        carregaCr();
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
    })

    $("#gera_anuidade").click(function () {

        $("#gera_anuidade_profile").html("")

        console.log("Anuidade gerada")

    })

    function carregaInfos() {

        var url = '/api/socios/' + socio_id_profile

        $.getJSON(url, function (infos) {

            $('#titulo_profile').append(infos.nome);
            $('#nome_pagina_profile').append(infos.nome);
            $('#nome_profile').val(infos.nome);
            $('#n_associado_profile').val(infos.n_associado);
            $('#n_celular_profile').val(infos.n_celular);
            $('#sexo_profile').append(infos.sexo);
            $('#nascimento_profile').val(infos.nascimento);
            $('#rg_profile').val(infos.rg);
            $('cpf_profile').val(infos.cpf);

            console.log('Informações carregadas');

        })

    }

    function carregaEndr() {

        var url = '/api/socios/' + socio_id_profile

        $.getJSON(url, function (endr) {

            $('#rua_profile').val(endr.rua);
            $('#numero_profile').val(endr.numero);
            $('#bairro_profile').val(endr.bairro);
            $('#cidade_profile').val(endr.cidade);
            $('#uf_profile').val(endr.uf);
            $('#cep_profile').val(endr.cep);
            $('#mail_profile').val(endr.mail);

            console.log('Endereço carregado');

        })
    }

    function carregaCr() {

        var url = '/api/registros/' + socio_id_profile

        $.getJSON(url, function (cr) {

            $('#n_cr_profle').val(cr.n_cr);
            $('#data_expedicao_profile').val(cr.data_expedicao);
            $('#data_validade_profile').val(cr.data_validade);

            console.log('CR carregado')

        })

    }

    function carregaSocios() {

        $.getJSON('/api/socios', function (resultados) {

            for (i = 0; i < resultados.length; i++) {

                $('#sociosTable>tbody').append(linhaSocioInicio(resultados[i]));

            }
        })
    }

    function linhaSocioInicio(socio) {

        var html = document.createElement("tr");

        linha = "<td><img class='rounded-circle mr-2' width='30' height='30' src='/storage/" + socio.foto.img + "'/>" +
            "<a href='/socios/" + socio.id + "'>" + socio.nome + "</a></td><td>" + socio.n_associado + "</td>";

        html.innerHTML = linha;

        return html;

    }

})

