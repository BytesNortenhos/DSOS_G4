function addTec() {
    var nome = document.getElementById('nomeTec').value;
    var email = document.getElementById('emailTec').value;
    var pass = document.getElementById('passTec').value;

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
            console.log(response.trim());
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

function addMed() {
    var nome = document.getElementById('nomeMed').value;
    var marca = document.getElementById('marcaMed').value;
    var princAtivo = document.getElementById('princAtivo').value;
    var dose = document.getElementById('doseMed').value;
    var toma = document.getElementById('tomaMed').value;


    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('marca', marca);
    formData.append('princAtivo', princAtivo);
    formData.append('dose', dose);
    formData.append('toma', toma);


    $.ajax({
        type: 'POST',
        url: 'insereMed.php',
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
            if (response.trim() === 'marca ja existe') {
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

