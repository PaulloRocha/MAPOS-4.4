<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet"></link>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>

<?php $con = mysqli_connect("localhost", "root", "root", "mapos"); ?>
<?php if($this->session->userdata('nivel') == 1){?>
<?php 
if (isset($_POST['selecionarano'])) {
	// Recupera os dados dos campos
	$selecionarano = $_POST['selecionarano'];

		$sql = mysqli_query($con, "UPDATE anoselecionado SET anoselecionado_mes_pagos = '".$selecionarano."'");
		if ($sql){$this->session->set_flashdata('success',"Exibindo mensalidades pagas em $selecionarano");
		redirect('mensalidades/mensalidadesPagas');
		}
}
		$seleciona = mysqli_query($con, "SELECT anoselecionado_mes_pagos FROM anoselecionado LIMIT 1");
		while($ln = mysqli_fetch_array($seleciona)){
		$anoselecionado = $ln['anoselecionado_mes_pagos'];
?>

     <div class="widget-title" style="border: 1px solid #ddd;">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Mensalidades pagas no ano de <?php echo $anoselecionado; ?></h5>

	<form action="" method="post" enctype="multipart/form-data">
			<select name="selecionarano" onchange="this.form.submit()" style="width: 80px;float: right;margin: 3px 5px 0 0;">

					<option><?php echo $anoselecionado; ?></option>
				<?php ;} ?>
					<option disabled="">-------</option>
					<option>2016</option>
					<option>2017</option>
					<option>2018</option>
					<option>2019</option>
					<option>2020</option>
			</select>
	</form>

     </div>

    	<?php
			$seleciona = mysqli_query($con, "SELECT anoselecionado_mes_pagos FROM anoselecionado LIMIT 1");
			while($ln = mysqli_fetch_array($seleciona)){
			$anoselecionado = $ln['anoselecionado_mes_pagos'];
		} ?>
				
<?php
	$dataatual = date('d/m/y');
	$partes = explode("/", $dataatual);
	$diaatual = $partes[0];
	$mesatual = $partes[1];
	$anoatual = "20".$partes[2];

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
	
if($mesatual == 1){$corjan = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 2){$corfev = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 3){$cormar = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 4){$corabr = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 5){$cormai = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 6){$corjun = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 7){$corjul = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 8){$corago = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 9){$corset = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 10){$corout = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 11){$cornov = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}
if($mesatual == 12){$cordez = "class='icon-calendar' style='float:right;font-size:25px;margin:5px 10px 0 0;'";}

			$seleciona = mysqli_query($con, "SELECT * FROM total_pago_mes WHERE ano = ".$anoselecionado."");
			while($ln = mysqli_fetch_array($seleciona)){
			$ano = $ln['ano'];
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
}; ?>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Janeiro</h5><i <?php echo $corjan;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $jan; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Fevereiro</h5><i <?php echo $corfev;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $fev; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title" ><h5>Março</h5><i <?php echo $cormar;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $mar; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Abril</h5><i <?php echo $corabr;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $abr; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Maio</h5><i <?php echo $cormai;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $mai; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Junho</h5><i <?php echo $corjun;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $jun; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Julho</h5><i <?php echo $corjul;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $jul; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;" style="width: 30%;">
			<div class="widget-title"><h5>Agosto</h5><i <?php echo $corago;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $ago; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Setembro</h5><i <?php echo $corset;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $set; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Outubro</h5><i <?php echo $corout;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $out; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Novembro</h5><i <?php echo $cornov;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $nov; ?></h1></center>
		</div>

		<div class="span3 box-mensalidades-recebidas" style="width: 30%;">
			<div class="widget-title"><h5>Dezembro</h5><i <?php echo $cordez;?>></i></div>
			<br />
			<center><h1>R$ <?php echo $dez; ?></h1></center>
		</div>
<?php }?>