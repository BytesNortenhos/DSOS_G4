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
  <title>Validar terapêuticas</title>
  <style>
    .hover\:add-change:hover img {
      content: url('../img/addHover.png');
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">Validar TERAPÊUTICAS</h1>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique e valide abaixo as terapêuticas já terminadas:</a>

    <div id="ter-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraTerVal.php"); ?>

    <div id="sucessToast" style="display:none"
            class=" mt-5 max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
            role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-teal-label">
            <div id="hs-toast-soft-color-teal-label" class="flex p-4">
                Terapêutica validada com sucesso!

                <div class="ms-auto">
                    <button type="button"
                        class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-teal-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-teal-200"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" onclick="closeToast('sucessToast');">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
  </div>
</body>
<script>

document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('showToast') === 'true') {
            document.getElementById('sucessToast').style.display = 'block';
            localStorage.removeItem('showToast');
        }
    });
  const container = document.getElementById('ter-container');

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

      buttonEdit = document.createElement('button');
      buttonEdit.className = "bg-primary text-secondary font-bold py-2 px-4 rounded mt-4";
      buttonEdit.textContent = "VALIDAR";
      buttonEdit.onclick = function () {
        console.log(terapeutica.id);
        setSession(terapeutica.id);
        window.location.href = "confirmaStock.php?";
      }

      card.appendChild(nomeUtente);
      card.appendChild(nomeMedicamento);
      card.appendChild(marcaMedicamento);
      card.appendChild(horario);
      card.appendChild(datas);
      card.appendChild(tecResp);
      card.appendChild(buttonEdit);
      container.appendChild(card);
    });
  } else {
    const noTer = document.createElement('p');
    noTer.className = "text-redE text-2xl mt-10";
    noTer.textContent = "Sem terapêuticas encontradas!";
    container.appendChild(noTer);
  }
  function setSession(idTer) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "setSessions.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("idTer=" + idTer);
  }
</script>

</html>