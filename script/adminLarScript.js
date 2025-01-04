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

function editMed() {
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
        url: 'editaMed.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.trim() === 'sucesso') {
                localStorage.setItem('showToast', 'true');
                location.href = 'gerirMed.php';

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

function uploadUtente() {
    alert("O Ficheiro deve ser um CSV em que cada linha representa um medicamento e cada coluna representa um atributo do medicamento. Ordem: dose, principioAtivo, nome, marca, toma");

    const fileInput = document.getElementById("csvFile");
    fileInput.click();
    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            const formData = new FormData();
            formData.append("idLar", document.getElementById('idLarForUpload').value);
            formData.append("csvFile", fileInput.files[0]);

            $.ajax({
                type: 'POST',
                url: 'uploadMed.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    switch (response.trim()) {
                        case 'sucesso':
                            localStorage.setItem('upload-sucesso', 'true');
                            location.reload();
                            break;
                        case 'extensao-errada':
                            localStorage.setItem('upload-erro-extensao', 'true');
                            location.reload();
                            break;
                        case 'sem-ficheiro':
                            localStorage.setItem('upload-sem-ficheiro', 'true');
                            location.reload();
                            break;
                        case 'request-errado':
                            localStorage.setItem('upload-request-errado', 'true');
                            location.reload();
                            break;
                    }

                    if(response.startsWith('erro')) {
                        localStorage.setItem('erro', response);
                        location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    alert('Erro: ' + response);
                    console.error('AJAX error:', status, error);
                }
            });
        }
    });
}

function addUtente() {
    var nome = document.getElementById('nomeUtente').value;
    var contacto = document.getElementById('contactoUtente').value;


    var formData = new FormData();
    formData.append('nome', nome);
    formData.append('contacto', contacto);

    $.ajax({
        type: 'POST',
        url: 'insereUtente.php',
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
            if (response.trim() === 'utente ja existe') {
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

