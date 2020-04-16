<?php $con = mysqli_connect("localhost", "root", "root", "mapos"); ?>
<div class="span12" style="margin-left: 0; margin-top: 0">
    <div class="span12" style="margin-left: 0">
        <form action="<?php echo current_url()?>">
        <div class="span10" style="margin-left: 0">
            <input type="text" class="span12" name="termo" placeholder="Digite o nome do cliente ou o número de sua matrícula" />
        </div>
        <div class="span2">
            <button class="span12 btn"><i class="fas fa-search"></i> Pesquisar</button>
        </div>
        </form>
    </div>

    
     <link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
																						   
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>

<?php 
if (isset($_POST['pagar'])) {

	$emitente = mysqli_query($con, "SELECT nome FROM emitente ORDER BY id ASC LIMIT 1");
	while($ln = mysqli_fetch_array($emitente)){
	$nome_emitente = $ln['nome'];
}
	$data_atual = date('Y/m/d');
	// Recupera os dados dos campos
	$id = $_POST['id'];
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$valor = $_POST['valor'];
	$aluno = $_POST['aluno'];
		$partes = explode(' ', $aluno);
		$primeiroNome = array_shift($partes);
		$ultimoNome = array_pop($partes);

		$sql = mysqli_query($con, "UPDATE `mensalidades` SET `".$mes."` = '1' WHERE id = '".$id."'");
		$sql2 = mysqli_query($con, "UPDATE `mensalidades` SET totalpago = totalpago+'".$valor."' WHERE id = '".$id."'");
		$sql3 = mysqli_query($con, "UPDATE `total_pago_mes` SET `".$mes."` = $mes+'".$valor."' WHERE ano = '".$ano."'");
		$sql4 = mysqli_query($con, "INSERT INTO `lancamentos` VALUES ('','Mens. $primeiroNome $ultimoNome <strong>[id $id]</strong>','".$valor."','".$data_atual."','1','$nome_emitente','Dinheiro','receita','1','1')");
		
		if ($sql && $sql2 && $sql3 && $sql4){$this->session->set_flashdata('success','Mensalidade lançada com sucesso!');
		redirect('mapos/pesquisarCliente?termo='.$id);
		}
}

if (isset($_POST['estornar'])) {
	// Recupera os dados dos campos
	$id = $_POST['id'];
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$valor = $_POST['valor'];
	$aluno = $_POST['aluno'];
		$partes = explode(' ', $aluno);
		$primeiroNome = array_shift($partes);
		$ultimoNome = array_pop($partes);

		$sql = mysqli_query($con, "UPDATE `mensalidades` SET `".$mes."` = '0' WHERE id = '".$id."'");
		$sql2 = mysqli_query($con, "UPDATE `mensalidades` SET totalpago = totalpago-'".$valor."' WHERE id = '".$id."'");
		$sql3 = mysqli_query($con, "UPDATE `total_pago_mes` SET `".$mes."` = $mes-'".$valor."' WHERE ano = '".$ano."'");
		$sql4 = mysqli_query($con, "DELETE FROM `lancamentos` WHERE descricao = 'Mens. $primeiroNome $ultimoNome <strong>[id $id]</strong>'");
		if ($sql && $sql2 && $sql3 && $sql4){$this->session->set_flashdata('error','Mensalidade estornada com sucesso!');
		redirect('mapos/pesquisarCliente?termo='.$id);
		}
}


$dataatual = date('d/m/y');
	$partes = explode("/", $dataatual);
	$diaatual = $partes[0];
	$mesatual = $partes[1];
	$anoatual = "20".$partes[2];
     
    $ultimomes = $mesatual - 1;

if ($ultimomes == "1"){
	$sql = mysqli_query($con,"UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	}

if ($ultimomes == "2"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	}

if ($ultimomes == "3"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	}

if ($ultimomes == "4"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	}
	
if ($ultimomes == "5"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	}
	
if ($ultimomes == "6"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	}
	
if ($ultimomes == "7"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	}
	
if ($ultimomes == "8"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	}
	
if ($ultimomes == "9"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	}
	
if ($ultimomes == "10"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	}
	
if ($ultimomes == "11"){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET nov = '2' WHERE nov = '0'");
	}
	
if ($mesatual == "12" &&  $diaatual >= 20  ){
	$sql = mysqli_query($con, "UPDATE mensalidades SET jan = '2' WHERE jan = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET fev = '2' WHERE fev = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mar = '2' WHERE mar = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET abr = '2' WHERE abr = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET mai = '2' WHERE mai = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jun = '2' WHERE jun = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET jul = '2' WHERE jul = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET ago = '2' WHERE ago = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET setembro = '2' WHERE setembro = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET outubro = '2' WHERE outubro = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET nov = '2' WHERE nov = '0'");
	$sql = mysqli_query($con, "UPDATE mensalidades SET dez = '2' WHERE dez = '0'");
	}
?>


<center><h2><i class=" icon-search"></i> Resultado da busca</h2> </center>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Resultado da busca</h5> 
     </div>
     
<div class="widget-content nopadding">
    	<?php
			$seleciona = mysqli_query($con, "SELECT anoselecionado FROM anoselecionado LIMIT 1");
			while($ln = mysqli_fetch_array($seleciona)){
			$anoselecionado = $ln['anoselecionado'];
		} ?>

<?php
if(isset($_GET['termo'])) {
	$termo_pesquisado = $_GET['termo'];
	}else{
		$termo_pesquisado = "";
	}
	$seleciona = mysqli_query($con, "SELECT * FROM mensalidades INNER JOIN clientes ON idClientes = clientes_id WHERE ano = ".$anoselecionado." AND (clientes.nomeCliente LIKE '%$termo_pesquisado%' OR id = '".$termo_pesquisado."') ORDER by id DESC");
			$conta = mysqli_num_rows($seleciona);
			    if($conta <= 0){
			    	echo "<center><div><h3>Não há resultados para <span style='color:#da4f49;'>$termo_pesquisado</span> no ano de $anoselecionado</h3></div></center>";
			    	}else{
					echo "
					<table class='table table-bordered' id='tabela-mensalidades'>
						<thead>
							<tr style='backgroud-color: #2D335B'>
								<th>#</th>
							    <th style='width: 200px'>Cliente</th>
							    <th>Ano</th>
							    <th>Ações</th>
							    <th>Jan</th>
							    <th>Fev</th>
							    <th>Mar</th>
							    <th>Abr</th>
							    <th>Mai</th>
							    <th>Jun</th>
							    <th>Jul</th>
							    <th>Ago</th>
							    <th>Set</th>
							    <th>Out</th>
							    <th>Nov</th>
							    <th>Dez</th>
							</tr>
						</thead>
					";}
			while($ln = mysqli_fetch_array($seleciona)){
			$id = $ln['id'];
			$clientes_id = $ln['clientes_id'];
			$ano = $ln['ano'];
			$data_pagamento = $ln['data_pagamento'];
			$servico_id = $ln['servico_id'];
			$jan = $ln['jan'];
			$fev = $ln['fev'];
			$mar = $ln['mar'];
			$abr = $ln['abr'];
			$mai = $ln['mai'];
			$jun = $ln['jun'];
			$jul = $ln['jul'];
			$ago = $ln['ago'];
			$set = $ln['setembro'];
			$out = $ln['outubro'];
			$nov = $ln['nov'];
			$dez = $ln['dez'];
			
			if($jan == 0){$input_jan = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($jan == 1){$input_jan = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jan == 2){$input_jan = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jan == 3){$input_jan = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era matriculado' /></center>";}

			if($fev == 0){$input_fev = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($fev == 1){$input_fev = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($fev == 2){$input_fev = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($fev == 3){$input_fev = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($mar == 0){$input_mar = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($mar == 1){$input_mar = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($mar == 2){$input_mar = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($mar == 3){$input_mar = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($abr == 0){$input_abr = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($abr == 1){$input_abr = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($abr == 2){$input_abr = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($abr == 3){$input_abr = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($mai == 0){$input_mai = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($mai == 1){$input_mai = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($mai == 2){$input_mai = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($mai == 3){$input_mai = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($jun == 0){$input_jun = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($jun == 1){$input_jun = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jun == 2){$input_jun = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jun == 3){$input_jun = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($jul == 0){$input_jul = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($jul == 1){$input_jul = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($jul == 2){$input_jul = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($jul == 3){$input_jul = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($ago == 0){$input_ago = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($ago == 1){$input_ago = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($ago == 2){$input_ago = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($ago == 3){$input_ago = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($set == 0){$input_set = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($set == 1){$input_set = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($set == 2){$input_set = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($set == 3){$input_set = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($out == 0){$input_out = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($out == 1){$input_out = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($out == 2){$input_out = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($out == 3){$input_out = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($nov == 0){$input_nov = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($nov == 1){$input_nov = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($nov == 2){$input_nov = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($nov == 3){$input_nov = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

			if($dez == 0){$input_dez = "<center><input type='submit' class='mesnpago' name='pagar' value='N.Pago'/></center>";}
			if($dez == 1){$input_dez = "<center><input type='submit' class='mespago' name='estornar' value='Pago'/></center>";}
			if($dez == 2){$input_dez = "<center><input type='submit' class='mesatraso' name='pagar' value='Atraso'/></center>";}
			if($dez == 3){$input_dez = "<center><input type='button' class='mespre tip-top' value=' pré ' title='Cliente não era cadastrado' /></center>";}

$corjan = "";
$corfev = "";
$cormar = "";
$corabr = "";
$cormai = "";
$corjun = "";
$corjul = "";
$corago = "";
$corset = "";
$corout = "";
$cornov = "";
$cordez = "";

if($mesatual == 1 and $data_pagamento <= $diaatual and $jan == 0){$corjan = 'style="background-color:#f2dddd;"';}
if($mesatual == 2 and $data_pagamento <= $diaatual and $fev == 0){$corfev = 'style="background-color:#f2dddd;"';}
if($mesatual == 3 and $data_pagamento <= $diaatual and $mar == 0){$cormar = 'style="background-color:#f2dddd;"';}
if($mesatual == 4 and $data_pagamento <= $diaatual and $abr == 0){$corabr = 'style="background-color:#f2dddd;"';}
if($mesatual == 5 and $data_pagamento <= $diaatual and $mai == 0){$cormai = 'style="background-color:#f2dddd;"';}
if($mesatual == 6 and $data_pagamento <= $diaatual and $jun == 0){$corjun = 'style="background-color:#f2dddd;"';}
if($mesatual == 7 and $data_pagamento <= $diaatual and $jul == 0){$corjul = 'style="background-color:#f2dddd;"';}
if($mesatual == 8 and $data_pagamento <= $diaatual and $ago == 0){$corago = 'style="background-color:#f2dddd;"';}
if($mesatual == 9 and $data_pagamento <= $diaatual and $set == 0){$corset = 'style="background-color:#f2dddd;"';}
if($mesatual == 10 and $data_pagamento <= $diaatual and $out == 0){$corout = 'style="background-color:#f2dddd;"';}
if($mesatual == 11 and $data_pagamento <= $diaatual and $nov == 0){$cornov = 'style="background-color:#f2dddd;"';}
if($mesatual == 12 and $data_pagamento < $diaatual and $dez == 0){$cordez = 'style="background-color:#f2dddd;"';}		
?>
    <tbody>
        <tr>
            <td><?php echo $id; ?></td>
		<?php
			$selecionar_cliente_innerjoin = mysqli_query($con, "SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
			<td><?php echo $nomeCliente; ?></td>
		<?php }?>

            <td><?php echo $ano; ?></td>
            <td><a href="#modalVer<?php echo $id;?>" data-toggle="modal"><div class="ver">Ações</div></a></td>
            <td <?php echo $corjan; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jan"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_jan; ?>
            	</form>
            </td>
           
            <td <?php echo $corfev; ?>>
             	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>           			
           			<input type="hidden" name="mes" value="fev"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_fev; ?>
            	</form>
            </td>

            <td <?php echo $cormar; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="mar"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_mar; ?>
            	</form>
            </td>

            <td <?php echo $corabr; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="abr"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_abr; ?>
            	</form>
            </td>

            <td <?php echo $cormai; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="mai"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_mai; ?>
            	</form>
            </td>

            <td <?php echo $corjun; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jun"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_jun; ?>
            	</form>
            </td>

            <td <?php echo $corjul; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="jul"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_jul; ?>
            	</form>
            </td>

            <td <?php echo $corago; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="ago"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_ago; ?>
            	</form>
            </td>

            <td <?php echo $corset; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="setembro"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_set; ?>
            	</form>
            </td>

            <td <?php echo $corout; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="outubro"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_out; ?>
            	</form>
            </td>

            <td <?php echo $cornov; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="nov"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_nov; ?>
            	</form>
            </td>

            <td <?php echo $cordez; ?>>
            	<form action="" method="post" enctype="multipart/form-data" >
           			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
           			<input type="hidden" name="ano" value="<?php echo $ano; ?>"/>
					<?php
					$selecionar_servico_innerjoin = mysqli_query($con, "SELECT preco FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
						while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
							$preco = $ln['preco'];
							$nomeServico = $ln['servico'];
					?>
           			<input type="hidden" name="valor" value="<?php echo $preco; ?>"/>
					<?php }?>
           			<input type="hidden" name="mes" value="dez"/>
           			<input type="hidden" name="cliente" value="<?php echo $nomeCliente; ?>"/>
           			<?php echo $input_dez; ?>
            	</form>
            </td>

        </tr>
    </tbody>
    
    
    
<?php
if(isset($_POST['excluir'.$id])) {
	// Recupera os dados dos campos
	$id_men = $_POST['id_men'.$id];
	$cliente = $_POST['cliente'.$id];
$sql = mysqli_query($con, "DELETE from mensalidades WHERE id = '".$id_men."'");
		if ($sql){$this->session->set_flashdata('success',"Mensalidades de <b>$cliente</b> removidas com sucesso!");
		redirect('os');
}}
?>


<?php
if(isset($_POST['edit'.$id])) {
	// Recupera os dados dos campos
	$clientes_id = $_POST['clientes_id'.$id];
	$ano = $_POST['ano'.$id];
	$vencimento = $_POST['vencimento'.$id];
	$idServico = $_POST['idServico'.$id];
	$servico = $_POST['servico'.$id];

if($idServico == 0){
	$this->session->set_flashdata('error',"É necessário cadastrar o serviço <b>$servico</b> para lançar as mensalidades. Clique no botão <b>+Serviços</b>");
	redirect('mapos/pesquisarCliente?termo='.$id);
}else{
$sql = mysqli_query($con, "UPDATE mensalidades SET servico_id = '".$idServico."', ano = '".$ano."', data_pagamento = '".$vencimento."' WHERE id = '".$clientes_id."'");
		if ($sql){$this->session->set_flashdata('success',"Cliente atualizado com sucesso!");
		redirect('mapos/pesquisarCliente?termo='.$id);
		}
}}
?>


<!-- Modal Ver -->
<div id="modalVer<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Visualizar</h3>
  </div>

 <div class="modal-body">
		<div class="span8" style="float: left;">
		<?php
			$selecionar_cliente_innerjoin = mysqli_query($con, "SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
			<label><b>Cliente: </b><?php echo $nomeCliente;?></label>
		<?php }?>  
			<br />
		<?php
			$selecionar_servico_innerjoin = mysqli_query($con, "SELECT * FROM servicos INNER JOIN mensalidades ON idServicos = $servico_id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_servico_innerjoin)){
				$nome = $ln['nome'];
				$preco = $ln['preco'];
		?>
			<label><b>Serviço: </b><?php echo $nome;?></label>
			<label><b>Preço: </b>R$ <?php echo $preco;?></label>
		<?php
			$selecionar_vencimento = mysqli_query($con, "SELECT data_pagamento FROM mensalidades WHERE id = $id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_vencimento)){
				$data_pagamento = $ln['data_pagamento'];
		?>
			<label><b>Data Pagamento: </b>Todo dia <?php echo $data_pagamento;?></label>
			
			
		<?php }}?>  
		</div>
  		
  		
  		  <div style="float: right;width:150px;">
                <ul class="site-stats">
                <li style="width: 100%;margin:0;right: 20px;border: 1px dashed #ccc;background-color:#eee;">
                <i class="icon-barcode"></i>
	                 <form action="<?php echo base_url() ?>index.php/relatorios/carne" method="get">
		                 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
		                 <input type="submit" style="border: none;background:transparent" value="Gerar Carnê" value="Gerar Carnê" />
	                 </form>
                 </li>   
  				</ul>
 		</div>
 		</div>
 		
 		
  <div class="modal-footer">
    <a href="#modalEdit<?php echo $id;?>" data-toggle="modal"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" style="float: left">Editar Mensalidades</button></a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>



  <!-- Modal editar -->
<div id="modalEdit<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="" method="post">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<?php
			$selecionar_cliente_innerjoin = mysqli_query($con, "SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
    <h3 id="myModalLabel">Alterar Mensalidade de: <?php echo $nomeCliente;?></h3>
  </div>
  <div class="modal-body">
  		
  		<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento de todos os campos.</div>
    	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Cliente</label>
    			<input class="span12" id="cliente<?php echo $id;?>" type="text" disabled="" value="<?php echo $nomeCliente;?>" style="cursor: default"/>
		<?php }?>
    			<input id="clientes_id<?php echo $id;?>" class="span12" type="hidden" name="clientes_id<?php echo $id;?>" value="<?php echo $id;?>" />
    		</div>
    	</div>
    	
    	<div class="span12" style="margin-left: 0">
            <input type="hidden" name="idServico<?php echo $id;?>" id="idServico<?php echo $id;?>" value=""/>
            <label for="">Serviço</label>
            <input type="text" class="span12" name="servico<?php echo $id;?>" id="servico<?php echo $id;?>" placeholder="Digite o nome do serviço" required="" value="<?php echo $nomeServico;?>" />
    	</div>	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="ano">Ano</label>
					<div class="styled-select">
						<select name="ano<?php echo $id;?>" class="span7">
			    				<option selected=""><?php echo $anoatual; ?></option>
								<option disabled="">-------</option>
								<option>2016</option>
								<option>2017</option>
								<option>2018</option>
								<option>2019</option>
								<option>2020</option>
						</select>
		    		</div>
    		</div>

    		<div class="span4" style="margin-left: 0">  
				<label for="">Data Base Pagamento</label>
            	<input type="text" class="span12" name="vencimento<?php echo $id;?>" id="vencimento<?php echo $id;?>" maxlength="2" required=""/>

    		</div>
    	</div>
  </div>
  <div class="modal-footer">
    <a href="#modal-excluir<?php echo $id;?>" data-toggle="modal"><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="float: left;">Excluir Mensalidades</button></a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" name="edit<?php echo $id;?>" class="btn btn-success" value="Salvar"></input>
  </div>
  </form>
</div>



<!-- Modal Excluir-->
<div id="modal-excluir<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Cobranças</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" name="id_men<?php echo $id;?>" value="<?php echo $id;?>" />
		<?php
			$selecionar_cliente_innerjoin = mysqli_query($con, "SELECT nomeCliente FROM clientes INNER JOIN mensalidades ON idClientes = $clientes_id LIMIT 1");
			while($ln = mysqli_fetch_array($selecionar_cliente_innerjoin)){
				$nomeCliente = $ln['nomeCliente'];
		?>
    <input type="hidden" name="cliente<?php echo $id;?>" value="<?php echo $nomeCliente;?>" />
    <h5 style="text-align: center">Deseja realmente excluir as mensalidades de <?php echo $nomeCliente;?></h5>
		<?php }?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <input type="submit" class="btn btn-danger" name="excluir<?php echo $id;?>" value="Excluir">
  </div>
  </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
      $("#servico<?php echo $id;?>").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServico<?php echo $id;?>").val(ui.item.id);
                 $("#precoServico<?php echo $id;?>").val(ui.item.preco);
            }
      });
});

</script>  
<?php } echo "</table>"; ?>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    
      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                 $("#servico").focus();
            }
      })
      
      $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServico").val(ui.item.id);
                 $("#precoServico").val(ui.item.preco);
            }
      });

});
</script>
</div>

