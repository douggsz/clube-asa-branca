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
    $(function () {
        $('#tppresencas').DataTable();
        $('#tTrap').DataTable();
        $('#tSede').DataTable();
        $('#tStand').DataTable();
        $('#sociosTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        carregaInfos();
        carregaPresencas();
    });
    $('#carregarPresenca').click(function () {
        carregaPresencas();
    });
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
        clearForm($('#formNovoSocio'))
    });
    $('#fechaNovoUsuario').click(function () {
        $('#mainNav').fadeIn(1000);
        $('#corpo').fadeIn(1000);
        $('#novoUsuario').fadeOut(1000);
    });
    $('#mostraNovaPresenca').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpoProfile').fadeOut(1000);
        $('#novaPresenca').fadeIn(1000);
        clearForm($('#formPresenca'))
    });
    $('#fechaNovaPresença').click(function () {
        fechaNovaPresenca();
    });
    $("#gera_anuidade").click(function () {
        $("#gera_anuidade").fadeOut(1000);
        $.ajax('/api/anuidades/', {
            type: "POST",
            data: {
                socio_id: $('#idSocio').val(),
            },
            success: function () {
                console.log("Anuidade gerada");
                window.location.href = "/socios/" + $('#idSocio').val();
            }
        });
    });
    $('#btn_apaga_socio').click(function () {

        var url = '/api/socios/' + $('#idSocio').val();

        $.ajax(url, {
            type: "DELETE",
            success: function () {
                console.log("Socio removido");
                alert("Socio removido");
                window.location.href = "/socios";
            },
            error: function () {
                console.log(this.error);
            },
        })

    });
    $('#btn_registra_pagamento').click(function () {
        var url = '/api/anuidades/' + $('#idAnuidade').val();
        $.ajax(url, {
            type: "PUT",
            data: {
                "valorPago": $('#valorPago').val(),
            },
            success: function () {
                console.log('Pagamento de R$' + $('#valorPago').val() + ' registrado');
                alert('Pagamento de R$' + $('#valorPago').val() + ' registrado');
                carregaInfos();
            },
            error: function (e) {
                console.log(e)
            }
        })
    });
    $('#btn_trap').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo_investimento').fadeOut(1000);
        $('#novoInvestimento').fadeIn(1000);
        $('#descricao_investmento').val('TRAP');
    });
    $('#btn_sede').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo_investimento').fadeOut(1000);
        $('#novoInvestimento').fadeIn(1000);
        $('#descricao_investmento').val('SEDE');
    });
    $('#btn_stand').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo_investimento').fadeOut(1000);
        $('#novoInvestimento').fadeIn(1000);
        $('#descricao_investmento').val('STAND');
    });
    $('#btn_fecha_investimento').click(function () {
        fechaNovoInvestimento()
    });
    $('#btn_limpa_presenca').click(function () {
        clearForm($('#formPresenca'))
    });
    $('#insumo').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#copa').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#valorPago').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#valor').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    function fechaNovaPresenca() {
        $('#mainNav').fadeIn(1000);
        $('#corpoProfile').fadeIn(1000);
        $('#novaPresenca').fadeOut(1000);
        clearForm($('#formPresenca'))
    }
    function fechaNovoInvestimento() {
        $('#mainNav').fadeIn(1000);
        $('#corpo_investimento').fadeIn(1000);
        $('#novoInvestimento').fadeOut(1000);
        clearForm($('#tTrap'));
        clearForm($('#tSede'));
        clearForm($('#tStand'));
    }
    function carregaInfos() {
        var url = '/api/socios/' + socio_id
        $.getJSON(url, function (infos) {
            if (infos != null) {
                $('#titulo').text(infos.nome);
                $('#titulo_profile').text(infos.nome);
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

                if (infos.anuidade != null) {
                    $('#valor').text(infos.anuidade.valor);
                    $('#pago').text(infos.anuidade.pago);
                    $('#restante').text(infos.anuidade.valor - infos.anuidade.pago);
                    console.log('Anuidade carregada');
                }

                if (infos.registro.n_cr === null) {
                    $('#crSelecionado').hide();
                    $('#tiros_div').hide();
                    $('#calibre_div').hide();
                    $('#insumo_div').hide();
                } else {
                    $('#crSelecionado').show().attr('value', infos.registro.n_cr);
                    $('#tiros_div').show();
                    $('#calibre_div').show();
                    $('#insumo_div').show();
                    $('#data_validade').mask("00/00/0000");
                    $('#data_expedicao').mask("00/00/0000");
                }
            }
            ;
        });
    }
    function carregaPresencas() {
        var url = '/api/presencas/' + $('#idSocio').val();
        $('#table_presencas>tbody').empty();
        $('#tInsumos>tbody').empty();
        $('#tCopa>tbody').empty();
        $.getJSON(url, function (presencas) {
            for (var i = 0; i < presencas.length; i++) {
                $('#table_presencas>tbody').append(montaLinha(presencas[i]));
                $('#tCopa>tbody').append(montaCopa(presencas[i]));
                $('#tInsumos>tbody').append(montaInsumos(presencas[i]));
            }
            console.log('Presenças carregadas');
        });
        function montaLinha(presenca) {
            if (presenca != null) {
                if (presenca.tiros === null) {
                    presenca.tiros = "";
                    if (presenca.insumo === null) {
                        presenca.calibre = "Somente assinatura";
                    } else {
                        montaInsumo();
                    }
                } else {
                    $('#table_presencas>tbody').append('<tr><h3>Não há presenças</h3></tr>')
                }
            }
            var html = document.createElement('tr');
            var linha = '<td>' + presenca.data + '</td>' +
                '<td>' + presenca.calibre + '</td>' +
                '<td>' + presenca.tiros + '</td> ' +
                '<td> ' +
                '<a type="button" class="btn btn-primary btn-sm" ' +
                'id="btn_apaga_presenca" ' +
                'href="/socios/presencas/excluir/' + presenca.socio_id + '/' + presenca.id + '">APAGAR</a>' +
                 '</td>';
            html.innerHTML = linha;
            return html;
        }
        function montaCopa(presenca) {
            if (presenca.copa !== null) {
                if (presenca.copa.pagamento) {
                    presenca.copa.pagamento = "SIM";
                } else {
                    presenca.copa.pagamento = "NÃO";
                }
                if (presenca.copa.descricao === null) {
                    presenca.copa.descricao = "Sem descrição";
                }
                var html = document.createElement('tr');
                var linha = '<td>' + presenca.data + '</td>' +
                    '<td>' + presenca.copa.valor + '</td>' +
                    '<td>' + presenca.copa.descricao + '</td> ' +
                    '<td>' + presenca.copa.pagamento + '</td>';
                html.innerHTML = linha;
                return html;
            }
        }
        function montaInsumos(presenca) {
            if (presenca.insumo !== null) {
                if (presenca.insumo.pagamento) {
                    presenca.insumo.pagamento = "SIM";
                } else {
                    presenca.insumo.pagamento = "NÃO";
                }
                if (presenca.insumo.descricao === null) {
                    if (presenca.insumo.valor === null) {
                        presenca.insumo.valor = "Somente assinatura";
                    }
                    presenca.insumo.descricao = "Sem Descrição";
                }

                var html = document.createElement('tr');
                var linha = '<td>' + presenca.data + '</td>' +
                    '<td>' + presenca.insumo.valor + '</td>' +
                    '<td>' + presenca.insumo.descricao + '</td> ' +
                    '<td>' + presenca.insumo.pagamento + '</td> ';
                html.innerHTML = linha;
                return html;
            }
        }
    }

    function clearForm($form) {
        $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
        $form.find(':checkbox, :radio').prop('checked', false);
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
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            }
        })
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
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            }
        })
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
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            },
        })
    });
    $('#formPresenca').submit(function (event) {
        event.preventDefault();
        var url = '/api/presencas/';
        $.ajax(url, {
            type: "POST",
            data: {
                idsocio: $('#idSocio').val(),
                calibre: $('#calibre').val(),
                tiros: $('#tiros').val(),
                data: $('#data').val(),
                copa: $('#copa').val(),
                insumo: $('#insumo').val(),
                descricaoCopa: $('#descricaoCopa').val(),
                descricaoInsumos: $('#descricaoInsumos').val(),
                pagamentoInsumo: $('#pagamentoInsumo').val(),
                pagamentoCopa: $('#pagamentoCopa').val(),
            },
            success: function () {
                console.log("Presença salva");
                alert("Presença salva");
                fechaNovaPresenca();
                carregaPresencas();
                clearForm($('#formPresenca'))
            },
            error: function () {
                console.log(this.error);
            },
        });
    });
    $("#formInvestimento").submit(function (event) {
        event.preventDefault();
        var url = '/api/investimentos';
        $.ajax(url, {
            type: "POST",
            data: {
                data: $('#data').val(),
                descricao: $('#descricao_investmento').val(),
                valor: $('#valor').val(),
            },
            success: function () {
                console.log("Investimento cadastrado");
                alert("Investimento cadastrado");
                fechaNovoInvestimento();
                document.location.href = '/investimento';
            },
            error: function (e) {
                console.log(e);
            }
        });
    })
});

