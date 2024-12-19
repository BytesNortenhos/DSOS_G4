<?php
session_start();
unset($_SESSION['adminGer']);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="script/tailwind.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script/login.js"></script>
  <link rel="stylesheet" href="css/index.css">
  <title>Rodas & Bengalas</title>
</head>

<body class="bg-primary flex flex-wrap justify-center items-center h-screen">
  <div class="container bg-darkBlue h-sContainer w-sContainer flex justify-right rounded-3xl shadow-3xl">
    <div class="w-1/2 h-sContainer flex flex-wrap flex-col justify-top items-center">
      <a class="text-secondary text-5xl font-title mt-24">LOGIN</a>
      <form class="flex flex-col justify-center items-center content-center mt-28 w-full" action="verifyLogin.php"
        method="POST" onsubmit="login(); return false;">
        <input
          class="h-10 w-1/2 rounded-2xl bg-darkBlue border-solid border-secondary border-2 px-2 pl-2 text-secondary"
          type="text" id="email" placeholder="Email">
        <input
          class="h-10 w-1/2 mt-5 rounded-2xl bg-darkBlue border-solid border-secondary border-2 px-2 pl-2 text-secondary"
          type="password" id="pass" placeholder="Password">
        <button
          class="h-10 w-1/2 mt-8 bg-darkBlue text-secondary rounded-2xl border-solid border-secondary border-2 hover:bg-secondary hover:text-darkBlue"
          type="submit">Entrar</button>
      </form>
    </div>
    <div
      class="w-1/2 h-sContainer bg-gradient-to-br from-blue to-darkGreen flex flex-wrap flex-col justify-center items-center content-center rounded-r-3xl">
      <a class="text-secondary text-5xl font-title">BEM VINDO AO</a>
      <a class="text-secondary text-5xl font-title">RODAS & BENGALAS</a>
      <a class="text-secondary text-2xl ">Um lar para quem já construíu tantas histórias!</a>
      <img class="w-16" src="img/larIcon.png">
    </div>
  </div>

  <div style="display: none;" id="redToast"
    class="max-w-xs bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
    role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-red-label">
    <div id="hs-toast-soft-color-red-label" class="flex p-4">
      Email ou password incorretos. Tente novamente!

      <div class="ms-auto">
        <button type="button"
          class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-red-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-red-200"
          aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            onclick="closeToast();">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</body>

</html>