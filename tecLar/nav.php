<?php
session_start();
if ($_SESSION['tecLar'] != true) {
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
    .hover\:gerirTer-change:hover img {
      content: url('../img/gerirTerHover.png'); 
    }
    .hover\:stockUtente-change:hover img {
      content: url('../img/stockUtenteHover.png'); 
    }
    .hover\:validar-change:hover img {
      content: url('../img/validarTerHover.png'); 
    }
    .hover\:stockGeral-change:hover img {
      content: url('../img/stockGeralHover.png'); 
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
                    <a href="gerirTer.php" class="text-white block hover:gerirTer-change" title="Gerir terapêuticas"><img src="../img/gerirTer.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-10">
                    <a href="stockUtente.php" class="text-white block hover:stockUtente-change" title="Stock por utente"><img src="../img/stockUtente.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-10">
                    <a href="validarTer.php" class="text-white block hover:validar-change" title="Validar terapêuticas"><img src="../img/validarTer.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-10">
                    <a href="stockGeral.php" class="text-white block hover:stockGeral-change" title="Stock Geral"><img src="../img/stockGeral.png" class="w-14 h-14"></a>
                </li>
                <li class="mt-28">
                    <a href="../index.php" class="text-white block hover:logout-change" title="Logout"><img src="../img/logout.png" class="w-14 h-14"></a>
                </li>
            </ul>
        </nav>
    </aside>
</header>
</html>