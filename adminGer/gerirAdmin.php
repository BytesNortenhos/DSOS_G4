<?php
session_start();
if ($_SESSION['adminGer'] != true) {
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
  <script src="../script/adminGerScript.js"></script>
  <title>Gerir administradores</title>
  <style>
      .hover\:add-change:hover img {
      content: url('../img/addHover.png'); 
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">GERIR ADMINISTRADORES</h1>
      <a class="absolute top-0 right-0 bg-primary text-secondary font-bold py-2 px-4 rounded hover:add-change"
        href="addAdmin.php">
        <img src="../img/add.png">
      </a>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique e adicione os administradores nesta área:</a>

    <div id="admin-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraAdmins.php"); ?>
  </div>
</body>
<script>
  const container = document.getElementById('admin-container');

  if (admins.length) {
    admins.forEach(admin => {
      const card = document.createElement('div');
      card.className = "bg-secondary shadow-md rounded-lg p-4 text-center mt-5";

      const name = document.createElement('h2');
      name.className = "text-2xl font-bold font-semibold text-primary";
      name.textContent = admin.nome;

      const email = document.createElement('p');
      email.className = "text-sm text-primary mt-2";
      email.textContent = "Email: " + admin.email;

      const nomeLar = document.createElement('p');
      nomeLar.className = "text-sm text-primary mt-2";
      nomeLar.textContent = "Nome do lar: " + admin.nomeLar;

      const moradaLar = document.createElement('p');
      moradaLar.className = "text-sm text-primary mt-2";
      moradaLar.textContent = "Morada do lar: " + admin.moradaLar;

      buttonEdit = document.createElement('button');
      buttonEdit.className = "bg-primary text-secondary font-bold py-2 px-4 rounded mt-4";
      buttonEdit.textContent = "Editar";

      card.appendChild(name);
      card.appendChild(email);
      card.appendChild(nomeLar);
      card.appendChild(moradaLar);
      container.appendChild(card);
    });
  } else {
    const noAdmins = document.createElement('p');
    noAdmins.className = "text-redE text-2xl mt-10";
    noAdmins.textContent = "Sem administradores encontrados!";
    container.appendChild(noAdmins);
  }
</script>

</html>