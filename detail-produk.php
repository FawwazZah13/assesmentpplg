<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wazlyou Thrift</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Wazlyou Thrift</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width="100%">
				</div>
				<div class="col-2">
					<h3>
						<?php echo $p->product_name ?>
					</h3>
					<h4>Rp.
						<?php echo number_format($p->product_price) ?>
					</h4>
					<p>Deskripsi :<br>
						<?php echo $p->product_description ?>
					</p>
					<p><a href="https://wa.me/085894981176" target="_blank">
							Hubungin via Whatsapp<br>
							<img src="img/wa.png" width="50px"></a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- content -->

	<div class="section">
		<div class="container">
			<h3>ISI DATA ANDA</h3>
			<div class="box">
				<form action="" method="post">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" id="nama" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" id="alamat" required>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" id="hp" required>
					<h4>Rp.
						<?php echo number_format($p->product_price) ?>
					</h4><br>
					<input type="submit" name="beli" value="Beli Produk" class="btn">
				</form>
			</div>
			<h2>S T R U K &nbsp B E L A N J A</h2>
			<div class="box">
				<div class="col-2">


					<?php

					if (isset($_POST["beli"])) {

						$price = $p->product_price; // Example price
						$quantity = 1; // Example quantity
					
						$total = $price * $quantity;
					}

					?>



					<h1>Total Belanja</h1><br>
					<h2>Nama Pembeli :
						<?php echo $_POST['nama'] ?>
					</h2>&nbsp
					<h2>Alamat :
						<?php echo $_POST['alamat'] ?>
					</h2>&nbsp
					<h2>No Hp :
						<?php echo $_POST['hp'] ?>
					</h2>&nbsp
					<h2>Harga :
						<?php echo number_format($price); ?>
					</h2>&nbsp
					<h2>Jumlah :
						<?php echo $quantity; ?>
					</h2>&nbsp
					<h2>Total Pembelian : Rp. <b style='color: red' ; font-size: 2em;>
							<?php echo number_format($total); ?>
					</h2>&nbsp
				</div>
			</div>
		</div>


		<!-- footer -->
		<div class="footer">
			<div class="container">
				<h4>Alamat</h4>
				<p>
					<?php echo $a->admin_address ?>
				</p>

				<h4>Email</h4>
				<p>
					<?php echo $a->admin_email ?>
				</p>

				<h4>No. Hp</h4>
				<p>
					<?php echo $a->admin_telp ?>
				</p>
				<small>Copyright &copy; 2023 - Thrift-WZ.</small>
			</div>
		</div>
</body>

</html>