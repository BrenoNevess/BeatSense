<?php
   include 'protect.php'; 
   include  '../servers/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $db = Conexao::GetConexao();

              if(isset($_GET['cod_cliente'])){
                if(isset($_GET['operacao'])){
                    if($_GET['operacao']=="E"){

                        //Excluir
                        ?>
                    <script language="javascript">                        
                        retorno = confirm('Deseja realmente excluir este usuário?'); 
                        if(!retorno){
                           window.location.href="search.php";
                        }
                    </script>    
                        <?php
                        $query = "DELETE from usuario WHERE id= ". $_GET['id'];
                        $rs = $pdo->query($query);
                        ?>
                    <script language="javascript">                        
                        alert('Usuário EXLCUÍDO com sucesso!');
                        window.location.href="search.php";
                    </script>    
                        <?php
                    }
                }
            }
         }      
?>       
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>BeatSense</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="description" content="loja de Materiais Esportivos do Brasil." />
    <meta name="authores" content="Ronaldo" />
     <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
     <link rel="shortcut icon"href="imagens/ip_icon_02_Ok.png"> 
        
         <style type="text/css" media="all">
     body {
            background:#ccc url('imagens/bg-body.jpg') repeat-x 0 0;
            color:#333;
            padding: 0;
            font: 12px/1.4 Verdana, Arial, Helvetica, sans-serif;
            text-align: center;
        }
        #tudo {
            width: 980px;
            margin: 0 auto;
            text-align:left;
            background:#fff;
        }
        #topo {
            position:relative;
            width:980px;
            height:100px;
            background:SkyBlue url('imagens/boneca.jpg') no-repeat;
        }
        #topo h1  { 
            position:absolute; 
            left:50px; 
            top:15px; 
            font-size: 28px;
            margin:0;
        }
        #topo h1 span {
            color:#fff;
        }
        ul#nav {
            position:absolute; 
            left:50px; 
            top:75px;
            margin:0; 
            padding:0;
        } 
        ul#nav li { 
            margin-right:5px;
            display: inline;
            list-style-type: none;
        }
        ul#nav li a { 
            float:left;  
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            text-decoration: none;
            text-transform: uppercase;
            padding: 3px 15px 7px 15px;
            margin-right:25px;
        }
        ul#nav li a:hover {  
            background:#f63 url('imagens/bg-over.jpg') repeat-x 0 0;
        }
        #busca { 
            position:absolute; 
            right:20px; 
            top:75px;
            margin: 0;
            padding: 0;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
        }
        #busca label input {
            background: #fcc;
            border: none;
        }
        #busca input#submit {
            background: #c30;
            border: 2px outset #f66;
            color:#fff;
            font-size:10px;
        }
        #principal {
            width:500px;
            margin: 20px 80px 50px 50px;	
            float:left;
            display:inline;
        }
        #auxiliar {
            width:350px;
            float:right;
            margin-top:50px;
            margin-bottom:50px;
        }
        #rodape {
            height:20px;
            clear:both;
            background:SkyBlue;
        }
        #rodape p {
            margin-left: 50px;
            font-size:11px;
            line-height:2;
        }
        #rodape p span {
            color:#f60;
            font-weight:bold;
        }
        h2 {
            font-size:26px;
            color:#0056a6;
            margin:30px 0 10px 0;
        }
        #principal p {
            margin-top:10px;;
        }
        #principal a, #principal a:visited {
            color: #f63;
        }
        #principal a:hover {
            color: #f90;
            text-decoration: none;
        }
         </style>
    
    </head>
    <body>
        <div id="tudo">
            <div id="topo">
                <h1><blink> </blink>PESQUISAR<span>&nbspUSUÁRIO</span></h1>              
                <ul id="nav">
                    <li><a href="cadastrar_cliente.php">CADASTRAR</a></li>	
                    <li><a href="pesquisar_cliente.php">PESQUISAR</a></li>	
                    	
                    <li><a href="cliente.php">VOLTAR</a></li>
                </ul>
            </div>
         
            <div id="principal">
                <fieldset>
                    <legend align="center"><font size="5">USUÁRIO</font></legend>
                   <div id="principal">  
                       <form name="form" method="post" action="" onsubmit="return valida(this);">
                        <table >
                            <tr>
                                <td> <font size="4">Nome:</font></td>
                                <td><input type="text" name="nome" size="30"></td>
                            </tr>
                            <tr>
                                <td> <font size="4">Email:</font></td>
                                <td>
                                    <input type="text" name="cpf" maxlength="10" size="20">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table>
                            <tr>
                                <td> <input type="submit" value="Pesquisar"></td>
                                <td> <input type="reset" value="Limpar"></td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
                          
             <div id="auxiliar">
            <img src="imagens/boneca.jpg" alt="Produtos Jogos" />
        </div>
                
                <CENTER>    
        <?php
                    
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = Conexao::GetConexao();

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $query = "SELECT * FROM usuarios ";
            if (!empty($nome)) {
                $query .= " WHERE nome like '%" . $nome. "%'";
            } else {
                if (!empty($cpf)) {
                    $query .= " WHERE email = '" . $email . "'";
                }
            }
            $query .= " ORDER BY nome ";
            
            
            $rs = $db->query($query);
            if ($rs) {
                $rows = $rs->fetchAll();

                if ($rows) {
                    echo '<table border="1"><tr>';
                    echo '    <td>Nome</td><td>CPF</td><td>EXCLUIR</td><td>EDITAR</td></td><td>PEDIDO</td></tr>';

                    foreach ($rows as $clie) {
                        echo '<tr><td>'.$clie["nome"].'</td><td>'.$clie["cpf"].'</td>';
                        echo '<td><a href="search.php?operacao=E&id='.$clie["id"].'">Excluir</a></td>';
                        echo '<td><a href="edit.php?id='.$clie["id"].'">Editar</a></td>';
                        echo '<td><a href="cadastrar_pedido.php?cod_cliente='.$clie["cod_cliente"].'">Pedido</a></td>';
                        
                    }
                   echo '</table>'; 
                }
             }
    }  
        ?>
                </CENTER>
                
            <div id="rodape">
            <p>Copyright &copy; 2025 - <b>BeatSense</b></p>
        </div>

        
    </div>
    
</body>

</html>