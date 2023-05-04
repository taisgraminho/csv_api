<?php
    if( ($dados = fopen("drinks.csv", "r")) !== FALSE){ /*nome do arquivo que vai abrir, modo de abertura (r -  read) */ 
        $cabecalho = fgetcsv($dados, 0, ","); //recurso usado, tamanho limite, limitador do arquivo (csv usa ,)
       
        //print_r($dados); //recurso que nos permite trabalhar

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--  estilizações da biblioteca dataTables  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!--  carregamentos da biblioteca dataTables  -->
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript"  src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript"  src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

   <title>CSV</title>

   <!-- script que roda a biblioteca -->
   <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
   </script>
   
</head>
<body>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead> 
            <tr>
                <?php  /*mostrar cabeçalho -- colunas da tabela */
                    foreach($cabecalho as $coluna)
                        echo "<th> $coluna </th>";
                ?>
            </tr>
        </thead> 
        <tbody>
            <?php /*$linha recebe o conteudo da linha em sequencia no csv */
                while($linha = fgetcsv($dados, 0, ",")){
                    echo "<tr>";
                    foreach($linha as $coluna){
                        echo "<td> $coluna </td>";   
                    }   
                    echo "</tr>";
                }
                fclose($dados); /*fechar o arquivo impedindo erros */
    }
            ?>
        </tbody>
    </table>
</body>
</html>