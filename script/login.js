
function login() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('pass').value;

    var formData = new FormData();
    formData.append('email', email);
    formData.append('pass', password);

    $.ajax({
        type: 'POST',
        url: 'verifyLogin.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response === 'adminGer') {
                window.location.href = 'adminGer/index.php';
            }
            if(response === 'adminLar') {
                window.location.href = 'adminLar/index.php';
            }
        }
    });
}
function closeToast() {
    document.getElementById('redToast').style.display = 'none';
}