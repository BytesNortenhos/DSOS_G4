<?php
session_start();
if ($_SESSION['adminLar'] != true) {
    header('Location: ../index.php');
    exit();
} ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../script/tailwind.js"></script>
  <style>
    .hover\:lar-change:hover img {
      content: url('../img/larIconHover.png'); 
    }
    .hover\:addLar-change:hover img {
      content: url('../img/addLarHover.png'); 
    }
    .hover\:med-change:hover img {
      content: url('../img/gerirMedHover.png'); 
    }
    .hover\:gestAdmin-change:hover img {
      content: url('../img/gestAdminHover.png'); 
    }
    .hover\:logout-change:hover img {
      content: url('../img/logoutHover.png'); 
    }
  </style>
</head>
<header class="w-24">
<aside class="w-24 bg-gradient-to-b from-blue to-darkGreen h-screen p-5 flex flex-wrap flex-col items-center fixed">
        <nav>
            <ul>
                <li>
                    <a href="index.php" class="text-white block hover:lar-change" title="Home"><img src="../img/larIcon.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-28">
                    <a href="gerirTec.php" class="text-white block hover:gestAdmin-change" title="Gerir técnicos"><img src="../img/gestAdmin.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-10">
                    <a href="gerirMed.php" class="text-white block hover:med-change" title="Gerir medicamentos"><img src="../img/gerirMed.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-10">
                    <a href="gerirUtentes.php" class="text-white block hover:addLar-change" title="Gerir utentes"><img src="../img/addLar.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-52">
                    <a href="../index.php" class="text-white block hover:logout-change" title="Logout"><img src="../img/logout.png" class="w-14 h-14"></a>
                </li>
            </ul>
        </nav>
    </aside>
</header>
</html>