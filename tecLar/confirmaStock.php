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
    <script src="../script/tecLarScript.js"></script>
    <title>Validar terapêutica</title>
</head>
<style>
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        filter: invert(100%) sepia(23%) saturate(508%) hue-rotate(32deg) brightness(98%) contrast(90%);
    }
</style>
<script>
    let date = new Date().toLocaleDateString('en-US');
</script>

<body class="bg-primary flex justify-top">
    <div class="w-screen flex flex-col items-center justify-center h-screen">
        <h1 class="text-secondary text-6xl font-bold">VALIDAR TERAPÊUTICA</h1>
        <a class="text-secondary text-xl">No seguinte formulário deverá informar quantos medicamentos foram realmente
            tomados!</a>
        <form class="flex flex-col justify-center items-center content-center mt-12 w-full" action="valTer.php"
            method="POST" onsubmit="valTer(); return false;">
            <div class="flex flex-col">
                <label class="text-secondary text-m font-bold mb-1 ml-2" for="nTomados">Número de medicamentos
                    tomados:</label>
                <select
                    class="h-10 w-96 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                    id="nTomados" name="nTomados"></select>
                <?php include("procuraPorTomar.php"); ?>
            </div>
            <button
                class="h-10 w-96 mt-8 bg-primary text-secondary rounded-2xl border-solid border-secondary border-2 hover:bg-secondary hover:text-darkBlue"
                type="submit">Submeter</button>
        </form>
    </div>


</body>
<script>

    if (dados.length) {
        dados.forEach(dado => {
            const count = parseInt(dado.porTomar, 10);
            const select = document.getElementById('nTomados');
            select.innerHTML = '';

            for (let i = count; i >= 1; i--) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        });
    }


</script>

</html>