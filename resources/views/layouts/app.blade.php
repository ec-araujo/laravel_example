<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Relator 1.0</title>
    <!-- add icon link -->
    <link rel="icon" type="image/x-icon" href="{{ asset('light-bootstrap/img/cbmba_15x15.png') }}">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('light-bootstrap/css/light-bootstrap-dashboard.css?v=2.0.0') }} " />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('light-bootstrap/css/demo.css') }}" />

    <!-- Links para a criação do relatório -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">




</head>

<body>

    <div class="wrapper @if (
        !auth()->check() ||
            request()->route()->getName() == '') wrapper-full-page @endif">

        @if (auth()->check() &&
                request()->route()->getName() != '')
            @include('layouts.navbars.sidebar')
            <!-- include('pages/sidebarstyle') -->
        @endif

        <div class="@if (auth()->check() &&
                request()->route()->getName() != '') main-panel @endif">

            @include('layouts.navbars.navbar')


            @yield('content')
            <!-- include('layouts.footer.nav') Retirado o footer-->
        </div>

    </div>

</body>

<!--   Core JS Files   -->
<script src="{{ asset('light-bootstrap/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/plugins/jquery.sharrre.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('light-bootstrap/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('light-bootstrap/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('light-bootstrap/js/demo.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script>
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var states = ['Abaíra', 'Abaré', 'Acajutiba', 'Adustina', 'Água Fria', 'Aiquara', 'Alagoinhas', 'Alcobaça',
        'Almadina', 'Amargosa', 'Amélia Rodrigues', 'América Dourada', 'Anagé', 'Andaraí', 'Andorinha', 'Angical',
        'Anguera', 'Antas', 'Antônio Cardoso', 'Antônio Gonçalves', 'Aporá', 'Apuarema', 'Aracatu', 'Araçás',
        'Araci', 'Aramari', 'Arataca', 'Aratuípe', 'Aurelino Leal', 'Baianópolis', 'Baixa Grande', 'Banzaê',
        'Barra', 'Barra da Estiva', 'Barra do Choça', 'Barra do Mendes', 'Barra do Rocha', 'Barreiras',
        'Barro Alto', 'Barrocas', 'Barro Preto', 'Belmonte', 'Belo Campo', 'Biritinga', 'Boa Nova',
        'Boa Vista do Tupim', 'Bom Jesus da Lapa', 'Bom Jesus da Serra', 'Boninal', 'Bonito', 'Boquira', 'Botuporã',
        'Brejões', 'Brejolândia', 'Brotas de Macaúbas', 'Brumado', 'Buerarema', 'Buritirama', 'Caatiba',
        'Cabaceiras do Paraguaçu', 'Cachoeira', 'Caculé', 'Caém', 'Caetanos', 'Caetité', 'Cafarnaum', 'Cairu',
        'Caldeirão Grande', 'Camacan', 'Camaçari', 'Camamu', 'Campo Alegre de Lourdes', 'Campo Formoso',
        'Canápolis', 'Canarana', 'Canavieiras', 'Candeal', 'Candeias', 'Candiba', 'Cândido Sales', 'Cansanção',
        'Canudos', 'Capela do Alto Alegre', 'Capim Grosso', 'Caraíbas', 'Caravelas', 'Cardeal da Silva',
        'Carinhanha', 'Casa Nova', 'Castro Alves', 'Catôlandia', 'Catu', 'Caturama', 'Central', 'Chorrochó',
        'Cícero Dantas', 'Cipó', 'Coaraci', 'Cocos', 'Conceição da Feira', 'Conceição do Almeida',
        'Conceição do Coité', 'Conceição do Jacuípe', 'Conde', 'Condeúba', 'Contendas do Sincorá',
        'Coração de Maria', 'Cordeiros', 'Coribe', 'Coronel João Sá', 'Correntina', 'Cotegipe', 'Cravolândia',
        'Crisópolis', 'Cristópolis', 'Cruz das Almas', 'Curaçá', 'Dário Meira', 'Dias DÁvila', 'Dom Basílio',
        'Dom Macedo Costa', 'Elísio Medrado', 'Encruzilhada', 'Entre Rios', 'Érico Cardoso', 'Esplanada',
        'Euclides da Cunha', 'Eunápolis', 'Fátima', 'Feira da Mata', 'Feira de Santana', 'Filadélfia',
        'Firmino Alves', 'Floresta Azul', 'Formosa do Rio Preto', 'Gandu', 'Gavião', 'Gentio de Ouro', 'Glória',
        'Gongogi', 'Governador Mangabeira', 'Guajeru', 'Guanambi', 'Guaratinga', 'Heliópolis', 'Iaçu', 'Ibiassucê',
        'Ibicaraí', 'Ibicoara', 'Ibicuí', 'Ibipeba', 'Ibipitanga', 'Ibiquera', 'Ibirapitanga', 'Ibirapuã',
        'Ibirataia', 'Ibitiara', 'Ibititá', 'Ibotirama', 'Ichu', 'Igaporã', 'Igrapiúna', 'Iguaí', 'Ilhéus',
        'Inhambupe', 'Ipecaetá', 'Ipiaú', 'Ipirá', 'Ipupiara', 'Irajuba', 'Iramaia', 'Iraquara', 'Irará', 'Irecê',
        'Itabela', 'Itaberaba', 'Itabuna', 'Itacaré', 'Itaeté', 'Itagi', 'Itagibá', 'Itagimirim',
        'Itaguaçu da Bahia', 'Itaju do Colônia', 'Itajuípe', 'Itamaraju', 'Itamari', 'Itambé', 'Itanagra',
        'Itanhém', 'Itaparica', 'Itapé', 'Itapebi', 'Itapetinga', 'Itapicuru', 'Itapitanga', 'Itaquara',
        'Itarantim', 'Itatim', 'Itiruçu', 'Itiúba', 'Itororó', 'Ituaçu', 'Ituberá', 'Iuiú', 'Jaborandi', 'Jacaraci',
        'Jacobina', 'Jaguaquara', 'Jaguarari', 'Jaguaripe', 'Jandaíra', 'Jequié', 'Jeremoabo', 'Jiquiriçá',
        'Jitaúna', 'João Dourado', 'Juazeiro', 'Jucuruçu', 'Jussara', 'Jussari', 'Jussiape', 'Lafaiete Coutinho',
        'Lagoa Real', 'Laje', 'Lajedão', 'Lajedinho', 'Lajedo do Tabocal', 'Lamarão', 'Lapão', 'Lauro de Freitas',
        'Lençóis', 'Licínio de Almeida', 'Livramento de Nossa Senhora', 'Luís Eduardo Magalhães', 'Macajuba',
        'Macarani', 'Macaúbas', 'Macururé', 'Madre de Deus', 'Maetinga', 'Maiquinique', 'Mairi', 'Malhada',
        'Malhada de Pedras', 'Manoel Vitorino', 'Mansidão', 'Maracás', 'Maragogipe', 'Maraú', 'Marcionílio Souza',
        'Mascote', 'Mata de São João', 'Matina', 'Medeiros Neto', 'Miguel Calmon', 'Milagres', 'Mirangaba',
        'Mirante', 'Monte Santo', 'Morpará', 'Morro do Chapéu', 'Mortugaba', 'Mucugê', 'Mucuri', 'Mulungu do Morro',
        'Mundo Novo', 'Muniz Ferreira', 'Muquém do São Francisco', 'Muritiba', 'Mutuípe', 'Nazaré', 'Nilo Peçanha',
        'Nordestina', 'Nova Canaã', 'Nova Fátima', 'Nova Ibiá', 'Nova Itarana', 'Nova Redenção', 'Nova Soure',
        'Nova Viçosa', 'Novo Horizonte', 'Novo Triunfo', 'Olindina', 'Oliveira dos Brejinhos', 'Ouriçangas',
        'Ourolândia', 'Palmas de Monte Alto', 'Palmeiras', 'Paramirim', 'Paratinga', 'Paripiranga', 'Pau Brasil',
        'Paulo Afonso', 'Pé de Serra', 'Pedrão', 'Pedro Alexandre', 'Piatã', 'Pilão Arcado', 'Pindaí', 'Pindobaçu',
        'Pintadas', 'Piraí do Norte', 'Piripá', 'Piritiba', 'Planaltino', 'Planalto', 'Poções', 'Pojuca',
        'Ponto Novo', 'Porto Seguro', 'Potiraguá', 'Prado', 'Presidente Dutra', 'Presidente Jânio Quadros',
        'Presidente Tancredo Neves', 'Queimadas', 'Quijingue', 'Quixabeira', 'Rafael Jambeiro', 'Remanso',
        'Retirolândia', 'Riachão das Neves', 'Riachão do Jacuípe', 'Riacho de Santana', 'Ribeira do Amparo',
        'Ribeira do Pombal', 'Ribeirão do Largo', 'Rio de Contas', 'Rio do Antônio', 'Rio do Pires', 'Rio Real',
        'Rodelas', 'Ruy Barbosa', 'Salinas da Margarida', 'Salvador', 'Santa Bárbara', 'Santa Brígida',
        'Santa Cruz Cabrália', 'Santa Cruz da Vitória', 'Santa Inês', 'Santaluz', 'Santa Luzia',
        'Santa Maria da Vitória', 'Santana', 'Santanóplis', 'Santa Rita de Cássia', 'Santa Terezinha',
        'Santo Amaro', 'Santo Antônio de Jesus', 'Santo Estevão', 'São Desidério', 'São Domingos', 'São Félix',
        'São Félix do Coribe', 'São Felipe', 'São Francisco do Conde', 'São Gabriel', 'São Gonçalo dos Campos',
        'São José da Vitória', 'São José do Jacuípe', 'São Miguel das Matas', 'São Sebastião do Passé', 'Sapeaçu',
        'Sátiro Dias', 'Saubara', 'Saúde', 'Seabra', 'Sebastião Laranjeiras', 'Senhor do Bonfim',
        'Serra do Ramalho', 'Sento Sé', 'Serra Dourada', 'Serra Preta', 'Serrinha', 'Serrolândia', 'Simões Filho',
        'Sítio do Mato', 'Sítio do Quinto', 'Sobradinho', 'Souto Soares', 'Tabocas do Brejo Velho', 'Tanhaçu',
        'Tanque Novo', 'Tanquinho', 'Taperoá', 'Tapiramutá', 'Teixeira de Freitas', 'Teodoro Sampaio',
        'Teofilândia', 'Teolândia', 'Terra Nova', 'Tremedal', 'Tucano', 'Uauá', 'Ubaíra', 'Ubaitaba', 'Ubatã',
        'Uibaí', 'Umburanas', 'Una', 'Urandi', 'Uruçuca', 'Utinga', 'Valença', 'Valente', 'Várzea da Roça',
        'Várzea do Poço', 'Várzea Nova', 'Varzedo', 'Vera Cruz', 'Vereda', 'Vitória da Conquista', 'Wagner',
        'Wanderley', 'Wenceslau Guimarães', 'Xique-Xique',
    ];



    $('#the-basics .typeahead').typeahead({
        hint: false,
        highlight: true,
        minLength: 1
    }, {
        name: 'states',
        source: substringMatcher(states)
    });

    var bbms = ['1ºBBM',
        '2ºBBM',
        '3ºBBM',
        '4ºBBM',
        '5ºBBM',
        '6ºBBM',
        '7ºBBM',
        '8ºBBM',
        '9ºBBM',
        '10ºBBM',
        '11ºBBM',
        '12ºBBM',
        '13ºBBM',
        '14ºBBM',
        '15ºBBM',
        '16ºBBM',
        '17ºBBM',
        '18ºBBM',
        '19ºBBM',
        '20ºBBM',
    ];

    $('#ta-bbm-relatorios .typeahead').typeahead({
        hint: false,
        highlight: true,
        minLength: 1
    }, {
        name: 'bbms',
        source: substringMatcher(bbms)
    });


    //variaveis que não devem mudar ao limpar um formulário
    var date = new Date();
    var dataFormatada = date.toISOString().substring(0, 10);
    document.getElementById('data_registro').value = dataFormatada;


    const checkbox1 = document.getElementById('checkbox1');
    const checkbox2 = document.getElementById('checkbox2');
    const checkbox3 = document.getElementById('checkbox3');
    const checkbox4 = document.getElementById('checkbox4');
    const checkbox5 = document.getElementById('checkbox5');
    const checkbox6 = document.getElementById('checkbox6');



    const textInputMot = document.getElementById('textInputMot');

    // Adiciona os eventos de escuta
    checkbox1.addEventListener('change', function() {
        if (checkbox2.checked || checkbox3.checked) {
            checkbox2.checked = false; // Desmarca checkbox2
            checkbox3.checked = false; // Desmarca checkbox3

        }
    });

    checkbox2.addEventListener('change', function() {
        if (checkbox1.checked) {
            checkbox1.checked = false; // Desmarca checkbox1
        }
    });

    checkbox3.addEventListener('change', function() {
        if (checkbox1.checked) {
            checkbox1.checked = false; // Desmarca checkbox1
        }
    });

    // 
    checkbox4.addEventListener('change', function() {
        if (checkbox5.checked || checkbox6.checked) {
            checkbox5.checked = false; // 
            checkbox6.checked = false; // 
        }
        if (checkbox6.checked) {
            textInputMot.disabled = false;
        } else {
            textInputMot.disabled = true;
            textInputMot.value = "";
        }
    });

    checkbox5.addEventListener('change', function() {
        if (checkbox4.checked || checkbox6.checked) {
            checkbox4.checked = false; // 
            checkbox6.checked = false; // 
        }
        if (checkbox6.checked) {
            textInputMot.disabled = false;
        } else {
            textInputMot.disabled = true;
            textInputMot.value = "";
        }
    });

    checkbox6.addEventListener('change', function() {
        if (checkbox5.checked || checkbox4.checked) {
            checkbox5.checked = false; // 
            checkbox4.checked = false; // 
        }
        if (checkbox6.checked) {
            textInputMot.disabled = false;
        } else {
            textInputMot.disabled = true;
            textInputMot.value = "";
        }
    });

    const enableCheckbox = document.getElementById('enableCheckbox');
    const textInput = document.getElementById('textInput');

    enableCheckbox.addEventListener('change', function() {
        if (enableCheckbox.checked) {
            textInput.disabled = false;
        } else {
            textInput.disabled = true;
            textInput.value = "";
        }
    });

    const phoneNumberInput = document.getElementById('phoneNumberInput');

    phoneNumberInput.addEventListener('input', function() {
        let phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

        if (phoneNumber.length > 11) {
            phoneNumber = phoneNumber.slice(0, 11); // Limita o número a no máximo 11 dígitos
        }

        let formattedPhoneNumber = '';
        if (phoneNumber.length > 0) {
            formattedPhoneNumber += '(' + phoneNumber.substring(0, 2);

            if (phoneNumber.length > 2) {
                formattedPhoneNumber += ') ' + phoneNumber.substring(2, 7);

                if (phoneNumber.length > 7) {
                    formattedPhoneNumber += '-' + phoneNumber.substring(7);
                }
            }
        }

        phoneNumberInput.value = formattedPhoneNumber;
    });




    let pessoas = [];
    let veiculos = [];
    let testemunhas = [];

    function adicionarPessoa() {
        const nome = document.getElementById('nome').value;
        const endereco = document.getElementById('endereco').value;
        pessoas.push({
            nome,
            endereco
        });
        exibirInformacoes();
    }

    function adicionarVeiculo() {
        const marca = document.getElementById('marca').value;
        const modelo = document.getElementById('modelo').value;
        veiculos.push({
            marca,
            modelo
        });
        exibirInformacoes();
    }

    function adicionarTestemunha() {
        const nomeTestemunha = document.getElementById('nomeTestemunha').value;
        const enderecoTestemunha = document.getElementById('enderecoTestemunha').value;
        testemunhas.push({
            nomeTestemunha,
            enderecoTestemunha
        });
        exibirInformacoes();
    }

    function exibirInformacoes() {
        let informacoesAdicionadas = document.getElementById('informacoesAdicionadas');
        informacoesAdicionadas.innerHTML = '';

        pessoas.forEach((pessoa) => {
            informacoesAdicionadas.innerHTML +=
                `<p>Pessoa - Nome: ${pessoa.nome}, Endereço: ${pessoa.endereco}</p>`;
        });

        veiculos.forEach((veiculo) => {
            informacoesAdicionadas.innerHTML +=
                `<p>Veículo - Marca: ${veiculo.marca}, Modelo: ${veiculo.modelo}</p>`;
        });

        testemunhas.forEach((testemunha) => {
            informacoesAdicionadas.innerHTML +=
                `<p>Testemunha - Nome: ${testemunha.nomeTestemunha}, Endereço: ${testemunha.enderecoTestemunha}</p>`;
        });
    }

    document.getElementById('formulario').addEventListener('submit', (event) => {
        event.preventDefault(); // Impede o envio do formulário
        console.log('Formulário enviado!');
    });

    submitForms = function() {
        document.getElementById("formcentro").submit();
        document.getElementById("formulario").submit();
    }

    resetForms = function() {
        document.getElementById("formcentro").reset();
        document.getElementById("formulario").reset();
    }


    function zoomIn() {
  var image = document.getElementById("myImage");
  image.classList.add("zoomed");
}

function zoomOut() {
  var image = document.getElementById("myImage");
  image.classList.remove("zoomed");
}


</script>


@stack('js')


</html>
