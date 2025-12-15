<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include PHPMailer manual
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$mail = new PHPMailer(true);

try {
    // KONFIGURASI SMTP GMAIL
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // EMAIL PENGIRIM
    $mail->Username   = 'upilgaring06@gmail.com';
    $mail->Password   = 'zktf woxc glvg qzgk'; // app password tanpa spasi

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // PENGIRIM & PENERIMA
    $mail->setFrom('upilgaring06@gmail.com', 'Alert System');
    $mail->addAddress('fikaryourwelcome@gmail.com');

    // KONTEN EMAIL
    $mail->isHTML(true);
    $mail->Subject = 'Alert Notification';
    $mail->Body    = "
        <b>ALERT SYSTEM</b><br><br>
        Email berhasil dikirim.<br>
        Waktu: " . date("d-m-Y H:i:s") . "
    ";

    $mail->send();

    echo "Email alert berhasil dikirim";

} catch (Exception $e) {
    echo "Gagal mengirim email: {$mail->ErrorInfo}";
}
