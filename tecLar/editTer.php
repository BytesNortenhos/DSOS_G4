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
    <title>Modificar terapêutica</title>
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
        <h1 class="text-secondary text-6xl font-bold">MODIFICAR TERAPÊUTICA</h1>
        <a class="text-secondary text-xl">No seguinte formulário poderá modificar a terapêutica selecionada!</a>
        <form class="flex flex-col justify-center items-center content-center mt-12 w-full" action="insereTer.php"
            method="POST" onsubmit="modTer(); return false;">
            <div class="w-96 flex space-x-8">
                <div class="flex flex-col">
                    <label class="text-secondary text-m font-bold mb-1 ml-2" for="nomeUtente">Utente:</label>
                    <select disabled
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        id="idUtente" name="nomeUtente"></select>
                </div>
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="nomeMedicamento">Medicamento:</label>
                    <select disabled
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        id="idMedicamento" name="nomeMedicamento"></select>
                </div>
            </div>
            <div class="w-96 flex space-x-8 mt-5">
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="dataStart">Início:</label>
                    <input disabled
                        class="h-10 w-44 rounded-2xl bg-primary text-secondary border border-secondary px-2 pl-2 opacity-75 cursor-not-allowed"
                        type="date" id="dataInicio" name="dataStart" />
                </div>
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="dataFim">Fim:</label>
                    <input
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        type="date" id="dataFim" name="dataFim" />
                </div>
            </div>
            <div class="w-96 flex space-x-8 mt-5">
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="horario">Horas entre toma:</label>
                    <input
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        type="time" id="horario" name="horario">
                </div>
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="diasSemana">Dias a tomar:</label>
                    <input
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        type="text" id="diasSemana" name="diasSemana">
                </div>
            </div>
            <div class="w-96 flex space-x-8 mt-5">
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="totalTomar">Total a tomar:</label>
                    <input
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        type="text" id="totalTomar" name="totalTomar">
                </div>
                <div class="flex flex-col">
                    <label class="text-secondary text-m mb-1 ml-2 font-bold " for="isSOS">É urgente?</label>
                    <select
                        class="h-10 w-44 rounded-2xl bg-primary border-solid border-secondary border-2 px-2 pl-2 text-secondary"
                        id="isSOS" name="isSOS">
                        <option value="2">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <?php include("procurarEditar.php"); ?>
            <button
                class="h-10 w-96 mt-8 bg-primary text-secondary rounded-2xl border-solid border-secondary border-2 hover:bg-secondary hover:text-darkBlue"
                type="submit">Submeter</button>
        </form>
        <div id="sucessToast" style="display:none"
            class=" mt-5 max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
            role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-teal-label">
            <div id="hs-toast-soft-color-teal-label" class="flex p-4">
                Terapêutica modificada com sucesso!

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
        <div style="display: none;" id="redToast"
            class="mt-5 max-w-xs bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
            role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-red-label">
            <div id="hs-toast-soft-color-red-label" class="flex p-4">
                Campo inválido ou vazio!

                <div class="ms-auto">
                    <button type="button"
                        class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-red-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-red-200"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" onclick="closeToast('redToast');">
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
    const idUtente = $('#idUtente');
    const idMedicamento = $('#idMedicamento');
    const dataInicio = document.getElementById("dataInicio");
    const dataFim = document.getElementById("dataFim");
    const today = new Date().toISOString().split("T")[0];
    const horario = document.getElementById("horario");
    const diasSemana = document.getElementById("diasSemana");
    const totalTomar = document.getElementById("totalTomar");
    const isSOS = document.getElementById("isSOS");
    

    if (dados.length) {
        dados.forEach(dado => {
            const utente = $('<option></option>').val(dado.idUtente).text(dado.nome);
            idUtente.append(utente);
            const medicamento = $('<option></option>').val(dado.idMedicamento).text(dado.nomeMed);
            idMedicamento.append(medicamento);
            dataInicio.value = dado.dataInicio;
            dataInicio.disabled = true;
            dataFim.value = dado.dataFim;
            dataFim.min= today;
            horario.value = dado.horario;
            diasSemana.value = dado.diasSemana;
            totalTomar.value = dado.porTomar;
            isSOS.value = dado.isSOS;
        }
        )
    }

</script>

</html>