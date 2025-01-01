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

    <div id="tec-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraMed.php"); ?>
  </div>
</body>
<script>
  const container = document.getElementById('tec-container');

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