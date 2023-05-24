<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Relator 2.0</title>
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

<script>







//variaveis que não devem mudar ao limpar um formulário
    var date = new Date();
    var dataFormatada = date.toISOString().substring(0, 10);
    document.getElementById('data_registro').value = dataFormatada;


//variáveis do número de registro aleátório
$(document).ready(function() {
    var data = [
        "Opção 1",
        "Opção 2",
        "Opção 3",
        // Adicione mais opções aqui conforme necessário
    ];

    $('#meuInput').typeahead({
        source: data
    });
});



    const checkbox1 = document.getElementById('checkbox1');
    const checkbox2 = document.getElementById('checkbox2');
    const checkbox3 = document.getElementById('checkbox3');
    const checkbox4 = document.getElementById('checkbox4');
    const checkbox5 = document.getElementById('checkbox5');
    const checkbox6 = document.getElementById('checkbox6');


    
    const textInputMot = document.getElementById('textInputMot');

    // Adiciona os eventos de escuta
    checkbox1.addEventListener('change', function () {
        if (checkbox2.checked || checkbox3.checked) {
            checkbox2.checked = false; // Desmarca checkbox2
            checkbox3.checked = false; // Desmarca checkbox3

        }
    });

    checkbox2.addEventListener('change', function () {
        if (checkbox1.checked) {
            checkbox1.checked = false; // Desmarca checkbox1
        }
    });

    checkbox3.addEventListener('change', function () {
        if (checkbox1.checked) {
            checkbox1.checked = false; // Desmarca checkbox1
        }
    });

    // 
    checkbox4.addEventListener('change', function () {
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

    checkbox5.addEventListener('change', function () {
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

    checkbox6.addEventListener('change', function () {
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

    enableCheckbox.addEventListener('change', function () {
        if (enableCheckbox.checked) {
            textInput.disabled = false;
        } else {
            textInput.disabled = true;
            textInput.value = "";
        }
    });

    const phoneNumberInput = document.getElementById('phoneNumberInput');

    phoneNumberInput.addEventListener('input', function () {
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
  pessoas.push({ nome, endereco });
  exibirInformacoes();
}

function adicionarVeiculo() {
  const marca = document.getElementById('marca').value;
  const modelo = document.getElementById('modelo').value;
  veiculos.push({ marca, modelo });
  exibirInformacoes();
}

function adicionarTestemunha() {
  const nomeTestemunha = document.getElementById('nomeTestemunha').value;
  const enderecoTestemunha = document.getElementById('enderecoTestemunha').value;
  testemunhas.push({ nomeTestemunha, enderecoTestemunha });
  exibirInformacoes();
}

function exibirInformacoes() {
  let informacoesAdicionadas = document.getElementById('informacoesAdicionadas');
  informacoesAdicionadas.innerHTML = '';

  pessoas.forEach((pessoa) => {
    informacoesAdicionadas.innerHTML += `<p>Pessoa - Nome: ${pessoa.nome}, Endereço: ${pessoa.endereco}</p>`;
  });

  veiculos.forEach((veiculo) => {
    informacoesAdicionadas.innerHTML += `<p>Veículo - Marca: ${veiculo.marca}, Modelo: ${veiculo.modelo}</p>`;
  });

  testemunhas.forEach((testemunha) => {
    informacoesAdicionadas.innerHTML += `<p>Testemunha - Nome: ${testemunha.nomeTestemunha}, Endereço: ${testemunha.enderecoTestemunha}</p>`;
  });
}

document.getElementById('formulario').addEventListener('submit', (event) => {
  event.preventDefault(); // Impede o envio do formulário
  console.log('Formulário enviado!');
});

submitForms = function(){
    document.getElementById("formcentro").submit();
    document.getElementById("formulario").submit();
}

resetForms = function(){
    document.getElementById("formcentro").reset();
    document.getElementById("formulario").reset();
}





  </script>


@stack('js')


</html>
