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
  <title>Gerir Utentes</title>
  <style>
      .hover\:add-change:hover img {
      content: url('../img/addHover.png'); 
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">GERIR UTENTES</h1>
      <a class="absolute top-0 right-0 bg-primary text-secondary font-bold py-2 px-4 rounded hover:add-change"
        href="addUtente.php">
        <img src="../img/add.png">
      </a>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique e adicione utentes tanes área:</a>

    <div id="tec-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraUtentes.php"); ?>
  </div>
</body>
<script>
  const container = document.getElementById('tec-container');

  if (utentes.length) {
    utentes.forEach(utente => {
        const card = document.createElement('div');
      card.className = "bg-secondary shadow-md rounded-lg p-4 text-center mt-5";

      const name = document.createElement('h2');
      name.className = "text-2xl font-bold font-semibold text-primary";
      name.textContent = utente.nome;

      const contacto = document.createElement('h2');
      contacto.className = "text-sm text-primary mt-2";
      contacto.textContent = "Contacto: " + utente.contacto;

      buttonEdit = document.createElement('button');
      buttonEdit.className = "bg-primary text-secondary font-bold py-2 px-4 rounded mt-4";
      buttonEdit.textContent = "Editar";

      card.appendChild(name);
      card.appendChild(contacto);
      container.appendChild(card);
    });
  } else {
    const noUt = document.createElement('p');
    noUt.className = "text-redE text-2xl mt-10";
    noUt.textContent = "Sem utentes encontrados!";
    container.appendChild(noUt);
  }
</script>

</html>