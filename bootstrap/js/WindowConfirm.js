function OpenConfirm() {
    document.getElementById('Open').style.display = 'flex';
    document.getElementById('overlay').style.display = 'block';
}

function CloseConfirm() {
    document.getElementById('Open').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function ConfirmConfirm(){
   window.location.href = 'http://localhost/BeatSense/Model/ExcludeAcc.php';
}

// -------------------------------------------------------------------------

function OpenLogout() {
    document.getElementById('OpenL').style.display = 'flex';
    document.getElementById('overlay').style.display = 'block';
}

function CloseLogout() {
    document.getElementById('OpenL').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function ConfirmLogout(){
   window.location.href = 'http://localhost/BeatSense/Controller/logout.php';
}