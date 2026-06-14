import os

files = {
    'View/modulo1.php': '../includes/accessibility-widget.php',
    'View/modulo2.php': '../includes/accessibility-widget.php',
    'View/modulo3.php': '../includes/accessibility-widget.php',
    'View/loginpage.php': '../includes/accessibility-widget.php',
    'View/cadastro.php': '../includes/accessibility-widget.php',
    'View/painel.php': '../includes/accessibility-widget.php',
    'index.php': 'includes/accessibility-widget.php',
}

for f, path in files.items():
    if os.path.exists(f):
        content = open(f, 'r', encoding='utf-8', errors='ignore').read()
        if 'accessibility-widget' not in content:
            new = content.replace('</body>', f"<?php include('{path}'); ?>\n</body>")
            open(f, 'w', encoding='utf-8').write(new)
            print('OK:', f)
        else:
            print('JA TEM:', f)
