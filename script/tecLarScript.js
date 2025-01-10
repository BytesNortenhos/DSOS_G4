function addTer() {
    var idUtente = document.getElementById('idUtente').value;
    var idMedicamento = document.getElementById('idMedicamento').value;
    var dataInicio = document.getElementById('dataInicio').value;
    var dataFim = document.getElementById('dataFim').value;
    var horario = document.getElementById('horario').value;
    var diasSemana = document.getElementById('diasSemana').value;
    var totalTomar = document.getElementById('totalTomar').value;
    var isSOS = document.getElementById('isSOS').value;

    var formData = new FormData();
    formData.append('idUtente', idUtente);
    formData.append('idMedicamento', idMedicamento);
    formData.append('dataInicio', dataInicio);
    formData.append('dataFim', dataFim);
    formData.append('horario', horario);
    formData.append('diasSemana', diasSemana);
    formData.append('totalTomar', totalTomar);
    formData.append('isSOS', isSOS);

    $.ajax({
        type: 'POST',
        url: 'insereTer.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.trim() === 'sucesso') {
                localStorage.setItem('showToast', 'true');
                location.reload();
            }
            if (response.trim() === 'campo vazio') {
                localStorage.setItem('showRedToast', 'true');
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
}

function modTer() {
    var dataFim = document.getElementById('dataFim').value;
    var horario = document.getElementById('horario').value;
    var diasSemana = document.getElementById('diasSemana').value;
    var totalTomar = document.getElementById('totalTomar').value;
    var isSOS = document.getElementById('isSOS').value;

    var formData = new FormData();
    formData.append('dataFim', dataFim);
    formData.append('horario', horario);
    formData.append('diasSemana', diasSemana);
    formData.append('totalTomar', totalTomar);
    formData.append('isSOS', isSOS);

    $.ajax({
        type: 'POST',
        url: 'atualizarTer.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.trim() === 'sucesso') {
                localStorage.setItem('showToast', 'true');
                location.reload();
            }
            if (response.trim() === 'campo vazio') {
                localStorage.setItem('showRedToast', 'true');
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
}

function closeToast(id) {
    document.getElementById(id).style.display = 'none';
}