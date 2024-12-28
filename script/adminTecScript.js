function addTec() {
    var nome = document.getElementById('nomeTec').value;
    var email = document.getElementById('emailTec').value;
    var pass = document.getElementById('passTec').value;
    console.log(nome);

    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('email', email);
    formData.append('pass', pass);


    $.ajax({
        type: 'POST',
        url: 'insereTec.php',
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
            if (response.trim() === 'tec ja existe') {
                localStorage.setItem('showYellowToast', 'true');
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
}