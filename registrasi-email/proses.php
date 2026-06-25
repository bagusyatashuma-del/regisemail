<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$nama = $_POST['nama'];
$email = $_POST['email'];

$mail = new PHPMailer(true);

try {

    // Konfigurasi SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // Gmail pengirim
    $mail->Username   = 'maharasthra05@gmail.com';

    // Ganti dengan App Password Google
    $mail->Password   = 'ioav rmkh hpmv pojq';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Pengirim
    $mail->setFrom(
        'maharasthra05@gmail.com',
        'Sistem Pendaftaran'
    );

    // Penerima
    $mail->addAddress($email, $nama);

    // Isi email
    $mail->isHTML(true);
    $mail->Subject = 'Konfirmasi Pendaftaran';

    $mail->Body = "
        <h2>Halo $nama</h2>

        <p>
            Terima kasih telah melakukan pendaftaran.
        </p>

        <p>
            Data Anda telah berhasil kami terima.
        </p>

        <p>
            Salam,<br>
            Sistem Pendaftaran
        </p>
    ";

    $mail->send();

    echo "
        <h2>Pendaftaran Berhasil</h2>
        <p>Email konfirmasi telah dikirim ke $email</p>
    ";

} catch (Exception $e) {

    echo "
        <h2>Terjadi Kesalahan</h2>
        <p>Email gagal dikirim.</p>
        <p>Error: {$mail->ErrorInfo}</p>
    ";
}
?>