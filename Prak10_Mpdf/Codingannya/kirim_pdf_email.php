<?php
include 'koneksi.php';

// =======================
// MPDF
// =======================
require_once __DIR__ . '/vendor/autoload.php';

// =======================
// PHPMailer
// =======================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// =======================
// BUAT PDF
// =======================
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4'
]);

$css = '
body { font-family: Arial; font-size: 11px; }
table { width:100%; border-collapse: collapse; }
th { background:#4CAF50; color:white; padding:8px; }
td { border:1px solid #ccc; padding:8px; text-align:center; }
img { height:80px; }
';

$data = mysqli_query($koneksi, "SELECT * FROM namasiswa ORDER BY id ASC");

$html = '<h3 align="center">DATA FOTO SISWA</h3>
<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Foto</th>
</tr>';

while ($d = mysqli_fetch_assoc($data)) {
    $foto = 'gambar/' . $d['foto'];
    $html .= "
    <tr>
        <td>{$d['id']}</td>
        <td>{$d['nama']}</td>
        <td><img src='$foto'></td>
    </tr>";
}

$html .= '</table>';

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

// Simpan PDF sementara
$pdfFile = "Data_Foto_Siswa.pdf";
$mpdf->Output($pdfFile, 'F');

// =======================
// KIRIM EMAIL
// =======================
$mail = new PHPMailer(true);

try {
    // SMTP GMAIL
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'upilgaring06@gmail.com';
    $mail->Password   = 'zktfwoxcglvgqzgk'; // app password TANPA spasi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // PENGIRIM & PENERIMA
    $mail->setFrom('upilgaring06@gmail.com', 'Sistem Foto');
    $mail->addAddress('fikaryourwelcome@gmail.com');

    // ATTACH PDF
    $mail->addAttachment($pdfFile);

    // EMAIL CONTENT
    $mail->isHTML(true);
    $mail->Subject = 'Laporan Data Foto Siswa (PDF)';
    $mail->Body = "
        <b>DATA FOTO SISWA</b><br><br>
        Terlampir laporan data foto siswa dalam bentuk PDF.<br><br>
        Waktu kirim: " . date('d-m-Y H:i:s') . "
    ";

    $mail->send();

    // HAPUS FILE PDF SEMENTARA
    unlink($pdfFile);

    echo "<script>
        alert('PDF berhasil dikirim ke email');
        window.location='index.php';
    </script>";

} catch (Exception $e) {
    echo "Gagal mengirim email: {$mail->ErrorInfo}";
}
