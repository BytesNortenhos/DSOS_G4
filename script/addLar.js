function addLar() {
    var nome = document.getElementById('nomeLar').value;
    var morada = document.getElementById('moradaLar').value;

    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('morada', morada);

    $.ajax({
        type: 'POST',
        url: 'inserirLar.php',
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
            if(response.trim() === 'lar ja existe'){
                localStorage.setItem('showYellowToast', 'true');
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