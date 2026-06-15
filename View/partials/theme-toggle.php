<?php
if (!isset($themeToggleClass)) {
    $themeToggleClass = 'theme-toggle--fixed';
}
?>
<button type="button" class="theme-toggle <?= htmlspecialchars($themeToggleClass) ?>" id="theme-toggle" aria-label="Alternar modo escuro/claro" title="Alternar tema">
    <span class="theme-toggle-icon theme-icon-light" aria-hidden="true">&#9728;</span>
    <span class="theme-toggle-icon theme-icon-dark" aria-hidden="true">&#9790;</span>
</button>
