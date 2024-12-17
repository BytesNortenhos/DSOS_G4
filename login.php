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
</head>
<body class="bg-primary flex justify-center items-center h-screen">
    <div class="container bg-darkBlue h-sContainer w-sContainer flex justify-right rounded-3xl shadow-3xl">
        <div class="w-1/2 h-sContainer flex flex-wrap flex-col justify-top items-center">
            <a class="text-secondary text-5xl font-title mt-24">LOGIN</a>
            <form class="flex flex-col justify-center items-center content-center mt-28 w-full" action="verifyLogin.php" method="POST" onsubmit="login(); return false;">
                <input class="h-10 w-1/2 rounded-2xl bg-darkBlue border-solid border-secondary border-2 px-2 pl-2 text-secondary" type="text" id="email" placeholder="Email">
                <input class="h-10 w-1/2 mt-5 rounded-2xl bg-darkBlue border-solid border-secondary border-2 px-2 pl-2 text-secondary" type="password" id="pass" placeholder="Password">
                <button class="h-10 w-1/2 mt-8 bg-darkBlue text-secondary rounded-2xl border-solid border-secondary border-2 hover:bg-secondary hover:text-darkBlue" type="submit">Entrar</button>
            </form>
        </div>
        <div class="w-1/2 h-sContainer bg-gradient-to-br from-blue to-darkGreen flex flex-wrap flex-col justify-center items-center content-center rounded-r-3xl">
            <a class="text-secondary text-5xl font-title">BEM VINDO AO</a>
            <a class="text-secondary text-5xl font-title">RODAS & BENGALAS</a>
            <a class="text-secondary text-2xl ">Um lar para quem já construíu tantas histórias!</a>
            <img class="w-16" src="img/larIcon.png">
        </div>
    </div>
</body>
</html>