function OpenConfirm() {
    document.getElementById('Open').style.display = 'flex';
    document.getElementById('overlay').style.display = 'block';
}

function CloseConfirm() {
    document.getElementById('Open').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function ConfirmConfirm(){
   window.location.href = 'http://localhost/BeatSense/src/servers/ExcludeAcc.php';
}