<?php
if (!isset($themeBase)) {
    $themeBase = '../';
}
?>
<script>
(function () {
    var t = localStorage.getItem('beatsense-theme');
    if (!t && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        t = 'dark';
    }
    if (!t) {
        t = 'light';
    }
    document.documentElement.setAttribute('data-bs-theme', t);
    document.documentElement.setAttribute('data-theme', t);
})();
</script>
<link rel="stylesheet" href="<?= htmlspecialchars($themeBase) ?>styles/theme.css">
