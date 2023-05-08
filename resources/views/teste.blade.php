<!DOCTYPE html>
<html>
  <head>
    <title>Relatório de Ocorrências CBMBA</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select { 
      padding: 0;
      margin: 5;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #000;
      line-height: 10px;
      }
      h1, h4 {
      margin: 15px 0 4px;
      font-weight: 400;
      }
      h4 {
      margin: 20px 0 4px;
      font-weight: 400;
      }
      span {
      color: red;
      }
      .small {
      font-size: 10px;
      line-height: 18px;
      }
      a:link, a:visited {
          background-color: #f44336;
          color: white;
          padding: 14px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
      }
      a:hover, a:active {
          background-color: red;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      vertical-align: middle;
      }
      input:hover, textarea:hover, select:hover {
      outline: none;
      border: 1px solid #095484;
      background: #e6eef7;
      }
      .title-block select, .title-block input {
      margin-bottom: 10px;
      }
      select {
      padding: 7px 0;
      border-radius: 3px;
      border: 1px solid #ccc;
      background: transparent;
      }
      select, table {
      width: 100%;
      }
      option {
      background: #fff;
      }
      .day-visited, .time-visited {
      position: relative;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      .day-visited i, .time-visited i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      top: 8px;
      font-size: 20px;
      }
      .day-visited i, .time-visited i {
      right: 5px;
      z-index: 1;
      color: #a9a9a9;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      }
      .question-answer label {
      display: block;
      padding: 0 20px 10px 0;
      }
      .question-answer input {
      width: auto;
      margin-top: -2px;
      }
      th, td {
      width: 18%;
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col {
      width: 25%;
      text-align: left;
      }
      textarea {
      width: calc(100% - 6px);
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      .title-block {
      display: flex;
      justify-content: space-between;
      }
      .title-block select {
      width: 30%;
      margin-bottom: 0;
      }
      .title-block input {
      width: 31%;
      margin-bottom: 0;
      }
      th, td {
      word-break: keep-all;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
       <form method="post" action="process.php">
		
        <table style="border:1px solid black;border-collapse:collapse">
		<tr>
		<td style="width:20%;vertical-align: middle"><img src="{{ asset('light-bootstrap/img/cbmba.png') }}" alt="Simbolo CBMBA" width="150" height="150"></td>
		            <td style="width:60%;vertical-align: middle">
                    <h2 align="center">CORPO DE BOMBEIROS MILITAR DA BAHIA<p>
				        COMANDO DE OPERAÇÕES DE BOMBEIROS MILITARES<p>
						GRUPAMENTO DE BOMBEIROS MILITARES<p>
						SEÇÃO DE PLANEJAMENTO OPERACIONAL</h2>
                    </td>
		<td style="width:20%;vertical-align: middle"><h1 align="center">Visto</h1></td>
		</tr>
		</table>
		
		<h1 align="center">Relatório de Ocorrência</h1>
        <h4>Tipo de Ocorrência<span>*</span></h4>
        <select>
          <option value=""></option>
          <option value="">Incendio Veicular</option>
          <option value="2">Incêndio Residencial</option>
          <option value="3">Incêndio Florestal/Vegetação</option>
          <option value="4">Busca e Salvamento</option>
        </select>
        <!--<h4>Endereço<span>*</span></h4>
        <select>
          <option value=""></option>
          <option value="1"></option>
          <option value="2">Deposit</option>
          <option value="3">Housing and Renovation Loan</option>
          <option value="4">iBanking</option>
          <option value="5">Treasures</option>
        </select>-->
        <h4>Identificação do Solicitante<span>*</span></h4>
        <div class="title-block">
<!--          <select>
            <option value="title" selected>Title</option>
            <option value="ms">Ms</option>
            <option value="miss">Miss</option>
            <option value="mrs">Mrs</option>
            <option value="mr">Mr</option>
          </select>-->
          <input class="name" type="text" name="nome" placeholder="Nome" />
          <input class="name" type="date" name="data" placeholder="Data" />
          <input class="name" type="text" name="telefone" placeholder="Telefone" />
        </div>
        <h4>Email<span>*</span></h4>
        <input type="text" name="name" />
        <h4>Localização<span>*</span></h4>
          <div class="title-block">
              <input class="name" type="text" name="name" placeholder="Cidade" />
              <input class="name" type="text" name="name" placeholder="Bairro" />
              <input class="name" type="text" name="name" placeholder="Rua" />
          </div>
          <p></p>
          <table>
              <caption>Horário</caption>
              <tr>
                  <td>
                      <h4>Acionamento<span>*</span></h4>
                      <input class="name" type="time" name="name"/>
                  </td>
                  <td>
                      <h4>Chegada<span>*</span></h4>
                      <input class="name" type="time" name="name"/>

                  </td>
                  <td>
                      <h4>Término<span>*</span></h4>
                      <input class="name" type="time" name="name"/>

                  </td>
              </tr>
          </table>
        <h4>Histórico da Ocorrência</h4>
        <p class="small">HISTÓRICO/OBS: Deverão ser constados neste histórico, todos os dados relevantes à ocorrência tais como: Danos materiais
            causados ao imóvel, presença do proprietário, recursos utilizados, local provável do inicio do incêndio, meios de prevenção
            existentes no local (Extintores, iluminação, sinalização e saídas de emergência) e todos os outros dados importantes.</small>
          <textarea rows="5"></textarea>
        <div class="btn-block">
              <a href="welcome.php" class="btn btn-primary">Salvar</a>
              <a href="welcome.php" class="btn btn-primary">Voltar</a>
              <a href="welcome.php" class="btn btn-primary">Gerar Pdf</a>
          </div>
      </form>
    </div>
  </body>
</html>