<?php
session_start();
if ($_SESSION['tecLar'] != true) {
  header('Location: ../index.php');
  exit();
} else {
  include("nav.php");
} ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../script/tailwind.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../script/adminLarScript.js"></script>
  <title>Gerir terapêuticas</title>
  <style>
      .hover\:add-change:hover img {
      content: url('../img/addHover.png'); 
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">GERIR TERAPÊUTICAS</h1>
      <a class="absolute top-0 right-0 bg-primary text-secondary font-bold py-2 px-4 rounded hover:add-change"
        href="addTec.php">
        <img src="../img/add.png">
      </a>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique e adicione terapêuticas nesta área:</a>

    <div id="tec-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraTer.php"); ?>
  </div>
</body>
<script>
  const container = document.getElementById('tec-container');

  if (terapeuticas.length) {
    terapeuticas.forEach(terapeutica => {
      const card = document.createElement('div');
      card.className = "bg-secondary shadow-md rounded-lg p-4 text-center mt-5";

      const nomeUtente = document.createElement('h2');
      nomeUtente.className = "text-2xl font-bold font-semibold text-primary";
      nomeUtente.textContent = terapeutica.nomeUtente;

      const nomeMedicamento = document.createElement('p');
      nomeMedicamento.className = "text-xl text-primary mt-2";
      nomeMedicamento.textContent = terapeutica.nomeMedicamento;

      const marcaMedicamento = document.createElement('p');
      marcaMedicamento.className = "text-sm text-primary mt-2";
      marcaMedicamento.textContent = "Marca: " + terapeutica.marca;

      const horario = document.createElement('p');
      horario.className = "text-sm text-primary mt-2";
      horario.textContent = "Tomar a cada: " + terapeutica.horario + " horas, " + terapeutica.diasSemana + " dias por semana";

      const datas = document.createElement('p');
      datas.className = "text-sm text-primary mt-2";
      datas.textContent = "Início: " + terapeutica.dataInicio + " Fim: " + terapeutica.dataFim;

      const tecResp = document.createElement('p');
      tecResp.className = "text-sm text-primary mt-2";
      tecResp.textContent = "Técnico responsável: " + terapeutica.nomeStaff;;

      card.appendChild(nomeUtente);
      card.appendChild(nomeMedicamento);
      card.appendChild(marcaMedicamento);
        card.appendChild(horario);
        card.appendChild(datas);
        card.appendChild(tecResp);
      container.appendChild(card);
    });
  } else {
    const noTer = document.createElement('p');
    noTer.className = "text-redE text-2xl mt-10";
    noTer.textContent = "Sem terapêuticas encontrados!";
    container.appendChild(noTer);
  }
</script>

</html>