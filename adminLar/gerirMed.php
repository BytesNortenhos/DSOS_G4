<?php
session_start();
if ($_SESSION['adminLar'] != true) {
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
  <title>Gerir medicamentos</title>
  <style>
      .hover\:add-change:hover img {
      content: url('../img/addHover.png'); 
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">GERIR MEDICAMENTOS</h1>
      <a class="absolute top-0 right-0 bg-primary text-secondary font-bold py-2 px-4 rounded hover:add-change"
        href="addMed.php">
        <img src="../img/add.png">
      </a>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique, edite e adicione medicamentos neste espaço!</a>

    <div id="med-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraMed.php"); ?>
    <div id="sucessToast" style="display:none"
            class=" mt-5 max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
            role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-teal-label">
            <div id="hs-toast-soft-color-teal-label" class="flex p-4">
                Medicamento editado com sucesso!

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
        if (localStorage.getItem('showRedToast') === 'true') {
            document.getElementById('redToast').style.display = 'block';
            localStorage.removeItem('showRedToast');
        }
    });
  const container = document.getElementById('med-container');
  if (medicamentos.length) {
    medicamentos.forEach(medicamento => {
      const card = document.createElement('div');
      card.className = "bg-secondary shadow-md rounded-lg p-4 text-center mt-5";

      const name = document.createElement('h2');
      name.className = "text-2xl font-bold font-semibold text-primary";
      name.textContent = medicamento.nome;

      const marca = document.createElement('p');
      marca.className = "text-sm text-primary mt-2";
      marca.textContent = "Marca: " + medicamento.marca;


      const prinAtivo = document.createElement('p');
      prinAtivo.className = "text-sm text-primary mt-2";
      prinAtivo.textContent = "Princípio ativo: " + medicamento.principioAtivo;

      const dose = document.createElement('p');
      dose.className = "text-sm text-primary mt-2";
      dose.textContent = "Dose: " + medicamento.dose;

      const toma = document.createElement('p');
      toma.className = "text-sm text-primary mt-2";
      toma.textContent = "Toma: " + medicamento.toma;

      buttonEdit = document.createElement('button');
      buttonEdit.className = "bg-primary text-secondary font-bold py-2 px-4 rounded mt-4";
      buttonEdit.textContent = "Editar";
      buttonEdit.addEventListener('click', function() {
        window.location.href = 'editMed.php?id=' +medicamento.id + '&nomeMed=' + medicamento.nome + '&marca=' + medicamento.marca + '&princAtivo=' + medicamento.principioAtivo + '&dose=' + medicamento.dose + '&toma=' + medicamento.toma;
      });

      card.appendChild(name);
      card.appendChild(marca);
      card.appendChild(prinAtivo);
      card.appendChild(dose);
      card.appendChild(toma);
      card.appendChild(buttonEdit);
      container.appendChild(card);
    });
  } else {
    const noMed = document.createElement('p');
    noMed.className = "text-redE text-2xl mt-10";
    noMed.textContent = "Sem medicamentos encontrados!";
    container.appendChild(noMed);
  }
</script>

</html>