<?php
	//mengeksekusi file koneksi.php
	include('koneksi.php');
	//mengeksekusi library dompdf
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	//membuat konstruktor dompdf
	$dompdf = new Dompdf();
	//membaca data dari database
	$query = mysqli_query($koneksi, "select * from pendaftaran");
	$html ='<html><center><h3>Daftar Nama Pendaftar</h3></center><hr/><br/>';
	$html .= '<table border = "1" width = "100%" >
		<tr>
			<th>No</th>
			<th>Jenis Pendaftaran</th>
			<th>Tanggal</th>
			<th>NIS</th>
			<th>No. Peserta</th>
			<th>PAUD</th>
			<th>TK</th>
			<th>No. SKHUN</th>
			<th>No. Ijazah</th>
			<th>Hobi</th>
			<th>Cita - cita</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>NISN</th>
			<th>NIK</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Kebutuhan Khusus</th>
			<th>Alamat</th>
			<th>RT</th>
			<th>RW</th>
			<th>Dusun</th>
			<th>Kelurahan</th>
			<th>Kecamatan</th>
			<th>Kode Pos</th>
			<th>Tempat tinggal</th>
			<th>Transportasi</th>
			<th>No. HP</th>
			<th>No. Telp</th>
			<th>Email</th>
			<th>Penerima KPS</th>
			<th>No. KPS</th>
			<th>Kewarganegaraan</th>
		</tr>';
	$no = 1;
	while($row = mysqli_fetch_array($query))
	{
		$html .= "<tr>
			<td>".$no."</td>
			<td>".$row['JENIS_PENDAFTARAN']."</td>
			<td>".$row['TANGGAL_MASUK']."</td>
			<td>".$row['NIS']."</td>
			<td>".$row['NOMOR_PESERTA']."</td>
			<td>".$row['PAUD']."</td>
			<td>".$row['TK']."</td>
			<td>".$row['NO_SKHUN']."</td>
			<td>".$row['NO_IJAZAH']."</td>
			<td>".$row['HOBI']."</td>
			<td>".$row['CITA_CITA']."</td>
			<td>".$row['NAMA']."</td>
			<td>".$row['JENIS_KELAMIN']."</td>
			<td>".$row['NISN']."</td>
			<td>".$row['NIK']."</td>
			<td>".$row['TEMPAT_LAHIR']."</td>
			<td>".$row['TANGGAL_LAHIR']."</td>
			<td>".$row['AGAMA']."</td>
			<td>".$row['BERKEBUTUHAN_KHUSUS']."</td>
			<td>".$row['ALAMAT']."</td>
			<td>".$row['RT']."</td>
			<td>".$row['RW']."</td>
			<td>".$row['DUSUN']."</td>
			<td>".$row['KELURAHAN']."</td>
			<td>".$row['KECAMATAN']."</td>
			<td>".$row['KODE_POS']."</td>
			<td>".$row['TEMPAT_TINGGAL']."</td>
			<td>".$row['TRANSPORTASI']."</td>
			<td>".$row['NO_HP']."</td>
			<td>".$row['NO_TELP']."</td>
			<td>".$row['EMAIL']."</td>
			<td>".$row['PENERIMA_KPS']."</td>
			<td>".$row['NO_KPS']."</td>
			<td>".$row['KEWARGANEGARAAN']."</td>
		</tr>";
		$no++;
	}
	$html.="</html>";
	$dompdf->loadHtml($html);
	//setting jenis ukuran dan orientasi kertas
	$dompdf->setPaper('A1','landscape');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('laporan_pendaftaran_siswa.pdf');
?>