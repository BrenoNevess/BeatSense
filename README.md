# BeatSense

**BeatSense** é uma plataforma online de ensino de teoria musical, projetada para fornecer conteúdo acessível e interativo sobre música para iniciantes, com foco na Congregação Cristã no Brasil. O projeto tem como objetivo ensinar teoria musical de forma simples, abordando conceitos como ritmo, melodia, harmonia, intervalos e muito mais.

## Funcionalidades

- **Página Principal**: Acessível a todos os visitantes, com informações sobre teoria musical e tópicos do curso.
- **Módulos Interativos**: O site oferece uma série de módulos educacionais, cada um com temas e tópicos específicos de teoria musical.
  - **Módulo 1**: Introdução à teoria musical, ritmo, propriedades do som, figuras musicais e duração das figuras.
  - **Módulo 2**: Notação musical e leitura de partituras.
  - **Módulo 3**: Intervalos musicais, melodia, harmonia, sinais de alteração (acidentes musicais) e a fermata.
- **Sistema de Login**: Permite que usuários e administradores se autentiquem e acessem áreas exclusivas.
- **Cadastro de Usuários**: Tela para novos usuários se cadastrarem no sistema.
- **Painel Administrativo**: Exclusivo para o administrador, com funcionalidades de CRUD (Criar, Ler, Atualizar, Deletar) para gerenciar os usuários cadastrados.

## Tecnologias Utilizadas

- **Front-End**: HTML, CSS (com Bootstrap), JavaScript
- **Back-End**: PHP
- **Banco de Dados**: MySQL (Usando PHPMyAdmin)
- **Ferramentas**: XAMPP, VS Code

## Instruções para Execução

### Requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- **XAMPP** ou qualquer servidor que suporte PHP e MySQL.
- **PHPMyAdmin** para gerenciar o banco de dados.

### Passos para Implementação Local

1. **Clone o Repositório**: Clone este repositório para a sua máquina local:

   ```bash
   git clone https://github.com/BrenoNevess/BeatSense.git
Configuração do Ambiente de Desenvolvimento:

Baixe e instale o XAMPP ou qualquer servidor que suporte PHP e MySQL.

Abra o XAMPP e inicie os serviços Apache e MySQL.

Importação do Banco de Dados:

O banco de dados é necessário para o funcionamento do sistema. Siga os passos abaixo para configurá-lo:

Abra o PHPMyAdmin através do painel de controle do XAMPP.

Crie um novo banco de dados com o nome beatsense.

Importe o arquivo SQL que será fornecido para a criação das tabelas necessárias. O arquivo pode ser encontrado na pasta /database do repositório.

Configuração do Banco de Dados:

Abra o arquivo config.php e ajuste as configurações de conexão com o banco de dados:

php
Copiar
Editar
<?php
$servername = "localhost";
$username = "root"; // padrão do XAMPP
$password = ""; // padrão do XAMPP
$dbname = "beatsense"; // nome do banco de dados criado

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Acessando o Site:

Após configurar o ambiente de desenvolvimento e o banco de dados, inicie o servidor Apache e MySQL no XAMPP. Acesse o site no navegador, digitando:

text
Copiar
Editar
http://localhost/BeatSense
Estrutura do Projeto
/public: Contém os arquivos públicos do site, como HTML, CSS e JavaScript.

/admin: Contém as funcionalidades administrativas, incluindo o CRUD de usuários e o login do administrador.

/database: Arquivos relacionados ao banco de dados (como o script SQL).

/config: Arquivos de configuração, incluindo a conexão com o banco de dados.

Contribuição
Contribuições são bem-vindas! Se você deseja contribuir para este projeto, siga os passos abaixo:

Faça um fork deste repositório.

Crie uma nova branch para a sua feature (git checkout -b feature/nome-da-feature).

Faça as suas modificações e envie para o repositório (git commit -am 'Adiciona nova funcionalidade').

Envie a branch para o repositório remoto (git push origin feature/nome-da-feature).

Abra um Pull Request.

Licença
Este projeto está licenciado sob a MIT License.

Contato
Caso tenha dúvidas ou sugestões, sinta-se à vontade para entrar em contato.

E-mail: brenoadm@example.com
