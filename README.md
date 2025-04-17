# BeatSense

**BeatSense** é uma plataforma online de ensino de teoria musical, projetada para fornecer conteúdo acessível e interativo sobre música para iniciantes, com foco na Congregacão Cristã no Brasil. O projeto tem como objetivo ensinar teoria musical de forma simples, abordando conceitos como ritmo, melodia, harmonia, intervalos e muito mais.

## Funcionalidades

- **Página Principal**: Acessível a todos os visitantes, com informações sobre teoria musical e tópicos do curso.
- **Módulos Interativos**: O site oferece uma série de módulos educacionais, cada um com temas e tópicos específicos de teoria musical.
  - **Módulo 1**: Introdução à teoria musical, ritmo, propriedades do som, figuras musicais e duração das figuras.
  - **Módulo 2**: Notação musical e leitura de partituras.
  - **Módulo 3**: Intervalos musicais, melodia, harmonia, sinais de alteração (acidentes musicais) e a fermata.
- **Sistema de Login**: Permite que usuários e administradores se autentiquem e acessem áreas exclusivas.
- **Cadastro de Usuários**: Tela para novos usuários se cadastrarem no sistema.
- **Painel Administrativo**: Exclusivo para o administrador, com funcionalidades de CRUD (Criar, Ler, Atualizar, Deletar) para gerenciar os usuários cadastrados.

## Detalhes do Painel Administrativo

- **Login do Administrador:**
- **Email:** brenoadm@gmail.com
- **Senha:** Neves7
- **CRUD de Usuários:** O administrador pode adicionar, editar e excluir usuários cadastrados.

## Tecnologias Utilizadas

- **Front-End**: HTML, CSS (com Bootstrap), JavaScript
- **Back-End**: PHP
- **Banco de Dados**: MySQL (usando PHPMyAdmin)
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
   ```

2. **Configuração do Ambiente de Desenvolvimento**:
   - Baixe e instale o XAMPP ou qualquer servidor que suporte PHP e MySQL.
   - Abra o XAMPP e inicie os serviços Apache e MySQL.

3. **Importação do Banco de Dados**:
   - Abra o PHPMyAdmin através do painel de controle do XAMPP.
   - Crie um novo banco de dados com o nome `beatsense`.
   - Importe o arquivo SQL localizado na pasta `/database` do repositório para criar as tabelas necessárias.

4. **Configuração do Banco de Dados**:
   - Abra o arquivo `conexao.php` e ajuste as configurações de conexão com o banco de dados conforme o exemplo abaixo:

   ```php
   <?php
   class Conexao {
       private static $host="localhost";
       private static $username="root";
       private static $password="";
       private static $dbname="beatsense";

       public static function GetConexao() {
           try {
               $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8";
               $db = new PDO($dsn, self::$username, self::$password);
               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               return $db;
           } catch (PDOException $e) {
               die("Erro ao conectar ao banco de dados: " . $e->getMessage());
           }
       }
   }
   ?>
   ```

5. **Acessando o Site**:
   - Após configurar o ambiente de desenvolvimento e o banco de dados, acesse o site no navegador:
     ```
     http://localhost/BeatSense
     ```

## Estrutura do Projeto

- `/src`: Contém os arquivos públicos do site, como HTML, CSS e JavaScript.
- `/adm`: Contém as funcionalidades administrativas, incluindo o CRUD de usuários e o painel de admin e arquivos relacionado ao banco de dados.
- `/servers`: Arquivos de configuração, incluindo a conexão com o banco de dados.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

## Licença

Este projeto está licenciado sob a MIT License.

## Contato

Desenvolvido por **Breno Neves**. Caso tenha dúvidas ou sugestões, sinta-se à vontade para entrar em contato:

- **E-mail**: brenoadm@gmail.com