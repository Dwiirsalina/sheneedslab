<!DOCTYPE html>
<head>
	<title>Surat Izin</title>
	<style>
		
		body{
			margin:20px;
		}

		.surat { width: 600px; margin: 0 auto; }
		
		h1 { 
			height: 40px; 
			width: 100%; 
			background: #222; 
			text-align: center;
			color: white; 
			text-decoration: uppercase; 
			letter-spacing: 10px; 
			padding: 8px 0px;
		}

		.isi{
			text-align:justify;
			font-size: 20px;	
			margin: 10px;
			padding-top:20px;
		}

	</style>
</head>
<body>
	<div class="surat">
		<h1>Surat Izin Menginap</h1>
		<div class="isi">
			<p>Assalamualaikum wr. wb.</p>
			<p>Dengan ini menyatakan mahasiswa di bawah ini memiliki izin untuk menginap di Departemen Informatika ITS.</p>
			<p>Berikut nama-nama mahasiswa tersebut:</p>
			<p>Nama:</p>
			<ol>
				<?php foreach($lodgers as $lodger) {?>
					<li>
						<?php if ($lodger->user['role_id'] == 3) {
							echo $lodger->user['username'] . ' ' . $lodger->user['name'];
						}?>						
					</li>
				<?php } ?>
			</ol>
			<p>Atas perhatiannya kami ucapkan terima kasih</p>
			<p>Wassalamualaikum wr.wb</p>
		</div>
	</div>
</body>