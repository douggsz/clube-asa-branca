$(document).ready(function () {
    const socio_id = $('#idSocio').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $(function () {
        $('#table_presencas').DataTable();
        $('#table_trap').DataTable();
        $('#table_sede').DataTable();
        $('#table_stand').DataTable();
        $('#table_socios').DataTable();
        $('#table_recibos').DataTable();
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
    $('#btn_apaga_socio').click(function () {
        var url = '/api/socios/' + $('#idSocio').val();

        $.confirm({
            title: 'Remover socio',
            content: 'Deseja remover o socio selecionado ?',
            buttons: {
                Confirmar: function () {
                    $.ajax(url, {
                        type: "DELETE",
                        success: function () {
                            console.log("Socio removido");
                            $.alert('Socio removido!');

                            window.location.href = "/controle/socios";
                        },
                        error: function () {
                            console.log(this.error);
                        },
                    })
                },
                Cancelar: function () {
                    $.alert('Operação cancelada');
                },
            }
        });
    });
    $('#btn_registra_pagamento2020').click(function () {
        var url = '/api/anuidade2020/' + $('#idAnuidade2020').val();
        $.ajax(url, {
            type: "PUT",
            data: {
                "valor_pago_2020": $('#valor_pago_2020').val(),
            },
            success: function () {
                console.log('Pagamento de R$' + $('#valor_pago_2020').val() + ' registrado (2020)');
                $.alert('Pagamento de R$' + $('#valor_pago_2020').val() + ' registrado (2020)');
                carregaInfos();
                $('#valor_pago_2020').clear;
            },
            error: function (e) {
                console.log(e)
            }
        })
    });
    $('#btn_registra_pagamento2021').click(function () {
        var url = '/api/anuidade2021/' + $('#idAnuidade2021').val();
        $.ajax(url, {
            type: "PUT",
            data: {
                "valor_pago_2021": $('#valor_pago_2021').val(),
            },
            success: function () {
                console.log('Pagamento de R$' + $('#valor_Pago_2021').val() + ' registrado (2021)');
                $.alert('Pagamento de R$' + $('#valor_pago_2021').val() + ' registrado (2021)');
                carregaInfos();
                $('#valor_pago_2021').clear;
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
        $('#tipo').val('TRAP');
    });
    $('#btn_sede').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo_investimento').fadeOut(1000);
        $('#novoInvestimento').fadeIn(1000);
        $('#tipo').val('SEDE');
    });
    $('#btn_stand').click(function () {
        $('#mainNav').fadeOut(1000);
        $('#corpo_investimento').fadeOut(1000);
        $('#novoInvestimento').fadeIn(1000);
        $('#tipo').val('STAND');
    });
    $('#btn_fecha_investimento').click(function () {
        fechaNovoInvestimento()
    });
    $('#btn_limpa_presenca').click(function () {
        clearForm($('#formPresenca'))
    });
    $('#insumo').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#copa').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#valor_pago_2020').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#valor_pago_2021').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', affixesStay: false});
    $('#valor').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: ',', affixesStay: false});
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
        clearForm($('#table_trap'));
        clearForm($('#table_sede'));
        clearForm($('#table_stand'));
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
                $('#sexo').attr('value', infos.sexo);
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

                if (infos.anuidade2020 != null) {
                    $('#valor2020').text(infos.anuidade2020.valor);
                    $('#pago2020').text(infos.anuidade2020.pago);
                    console.log('Anuidade2021 2020 carregada');
                }
                if (infos.anuidade2021 != null) {
                    $('#valor2021').text(infos.anuidade2021.valor);
                    $('#pago2021').text(infos.anuidade2021.pago);
                    console.log('Anuidade2021 2021 carregada');
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
                }
                $('#rg').mask('0000000000');
                $('#cpf').mask('000.000.000-00');
                $('#nascimento').mask('00/00/0000')
                $('#data_validade').mask("00/00/0000");
                $('#data_expedicao').mask("00/00/0000");
            }
            ;
        });
    }
    function carregaPresencas() {
        var url = '/api/presencas/' + $('#idSocio').val();
        $('#table_usuario_presencas>tbody').empty();
        $('#table_insumos>tbody').empty();
        $('#table_copa>tbody').empty();
        $.getJSON(url, function (presencas) {
            for (var i = 0; i < presencas.length; i++) {
                $('#table_usuario_presencas>tbody').append(montaLinha(presencas[i]));
                $('#table_copa>tbody').append(montaCopa(presencas[i]));
                $('#table_insumos>tbody').append(montaInsumos(presencas[i]));
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
                        montaInsumos();
                    }
                }
            }


            var html = document.createElement('tr');
            var linha = '<td>' + presenca.data + '</td>' +
                '<td>' + presenca.calibre + '</td>' +
                '<td>' + presenca.tiros + '</td> ' +
                '<td> ' +
                '<a id="btn_apaga_presenca" ' +
                'href="/controle/socios/presencas/excluir/' + presenca.socio_id + '/' + presenca.id + '">apagar</a>' +
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
    $('#form_informacoes').submit(function (event) {
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
                $.alert("Informações atualizadas");
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            }
        })
    });
    $('#form_registros').submit(function (event) {
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
                $.alert("CR atualizado");
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            }
        })
    });
    $('#form_endereco').submit(function (event) {
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
                $.alert("Endereço atualizado");
                carregaInfos();
            },
            error: function () {
                console.log(this.error);
            },
        })
    });
    $("#form_investimento").submit(function (event) {
        event.preventDefault();
        var url = '/api/investimentos';
        $.ajax(url, {
            type: "POST",
            data: {
                data: $('#data').val(),
                tipo: $('#tipo').val(),
                descricao: $('#descricao').val(),
                valor: $('#valor').val(),
            },
            success: function () {
                console.log("Investimento cadastrado");
                $.alert("Investimento cadastrado");
                fechaNovoInvestimento();
                document.location.href = '/controle/investimentos';
            },
            error: function (e) {
                console.log(e);
            }
        });
    })
});
