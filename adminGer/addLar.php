<?php 
session_start();
if($_SESSION['adminGer'] != true) {
  header('Location: ../index.php');
  exit();
}
else{
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
  <title>Adicionar lar</title>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col items-center justify-center h-screen">
    <h1 class="text-secondary text-6xl font-bold">ADICIONAR LAR</h1>
    <a class="text-secondary text-xl">No seguinte formulário poderá registar novos lares!</a>
    <form class="flex flex-col justify-center items-center content-center mt-12 w-full" action="insereLar.php"
      method="POST" onsubmit="addLar(); return false;">
      <input class="h-10 w-96 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
        type="text" id="nomeLar" placeholder="Nome do lar">
      <input
        class="h-10 w-96 mt-5 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
        type="text" id="moradaLar" placeholder="Morada">
      <button
        class="h-10 w-96 mt-8 bg-primary text-secondary rounded-2xl border-solid border-secondary border-2 hover:bg-secondary hover:text-darkBlue"
        type="submit">Submeter</button>
    </form>
    <div id="sucessToast" style="display:none"
      class=" mt-5 max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-teal-label">
      <div id="hs-toast-soft-color-teal-label" class="flex p-4">
        Lar registado com sucesso!

        <div class="ms-auto">
          <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-teal-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-teal-200"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              onclick="closeToast('sucessToast');">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div style="display: none;" id="redToast"
      class="mt-5 max-w-xs bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-red-label">
      <div id="hs-toast-soft-color-red-label" class="flex p-4">
        Nenhum campo pode estar vazio!

        <div class="ms-auto">
          <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-red-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-red-200"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              onclick="closeToast('redToast');">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div style="display: none;" id="yellowToast"
      class="mt-5 max-w-xs bg-yellow-100 border border-yellow-200 text-sm text-yellow-800 rounded-lg dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-yellow-label">
      <div id="hs-toast-soft-color-yellow-label" class="flex p-4">
        O lar que tentou registar já existe!

        <div class="ms-auto">
          <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-yellow-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-yellow-200"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              onclick="closeToast('yellowToast');">
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
    if (localStorage.getItem('showYellowToast') === 'true') {
      document.getElementById('yellowToast').style.display = 'block';
      localStorage.removeItem('showYellowToast');
    }
  });
</script>

</html>