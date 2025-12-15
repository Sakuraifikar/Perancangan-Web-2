<?php
include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer manual
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Ambil data dari form
$nama        = $_POST['nama'];
$nim         = $_POST['nim'];
$kelas       = $_POST['kelas'];
$prodi       = $_POST['prodi'];
$universitas = $_POST['universitas'];
$pesan       = $_POST['pesan'];

// TEMPLATE EMAIL (SAMA SEPERTI GAMBAR PERTAMA)
$body = "
<b>Notifikasi Alert PHPMailer</b><br><br>

Nama: $nama<br>
NIM: $nim<br>
Kelas: $kelas<br>
Prodi: $prodi<br>
Universitas: $universitas<br>
Pesan:<br>
$pesan
";

$mail = new PHPMailer(true);

try {
    // SMTP GMAIL
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // EMAIL PENGIRIM
    $mail->Username   = 'upilgaring06@gmail.com';
    $mail->Password   = 'zktf woxc glvg qzgk'; // isi app password gmail

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // PENGIRIM & PENERIMA
    $mail->setFrom('upilgaring06@gmail.com', 'Alert PHPMailer');
    $mail->addAddress('fikaryourwelcome@gmail.com');

    // EMAIL CONTENT
    $mail->isHTML(true);
    $mail->Subject = 'Notifikasi Alert Mahasiswa';
    $mail->Body    = $body;

    $mail->send();

    // SIMPAN KE DATABASE
    mysqli_query($koneksi, "
        INSERT INTO user_log (nama, created_at)
        VALUES ('$nama', NOW())
    ");

    echo "<script>
        alert('Email berhasil dikirim & data tersimpan');
        window.location='index.php';
    </script>";

} catch (Exception $e) {
    echo "<script>
        alert('Gagal mengirim email: {$mail->ErrorInfo}');
        window.location='index.php';
    </script>";
}
?>
