<!DOCTYPE html>
<html lang="en">
    <?php
	include_once "../connect.php";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php
        include('../scripts/menu.php');
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transportadoras</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="transportadoras.php">
                                <button type="submit" class="btn btn-outline btn-primary">Voltar</button> </a>
                           
                            <br>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                                
                      
                            <form role="form" method="post">
                                <?php 
			if(isset($_POST['acao']) && $_POST['acao']=='enviar'){
                
                $erro = 0;

			$nome_transportadora = $_POST['nome_transportadora'];
                
                 $s=mysql_query("SELECT * FROM transportadora WHERE nome_transportadora='$nome_transportadora'")or die(mysql_error());
            $mnr=mysql_num_rows($s);
 
                if($mnr!=0){ 
					echo "<div class='alert alert-warning' role='alert'>";
					echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
					echo "Transportadora já existe!";
					echo "</div>"; 
					$erro++; }
		else{
		$inserir_transportadora = mysql_query("INSERT INTO transportadora (nome_transportadora)
										  VALUES('$nome_transportadora')")
							or die(mysql_error());
		if($inserir_transportadora){
			echo "<div class='alert alert-success' role='alert'>";
			echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
			echo "Transportadora Inserida com sucesso";
			echo "</div>";	
		}else{
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
			echo "Falha ao inserir Transportadora!";
			echo "</div>";		
		}
        }
	}

?>
                                        <div class="form-group">
                                            <label>Nome Transportadora</label>
                                            <input class="form-control" name="nome_transportadora" placeholder="Nome transportadora...">
                                            
                                        </div>
                                            <input type="hidden" name="acao" value="enviar"/>
                                            <button type="submit" class="btn btn-success">Inserir</button>
                                        </fieldset>
                                    </form>
                            
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
           

   

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
