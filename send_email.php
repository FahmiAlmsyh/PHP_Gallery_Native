<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "admin@example.com"; // Ganti dengan alamat email admin Anda
    $subject = "Pesan dari $name";
    $headers = "From: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { padding: 20px; }
            .header { background-color: #f8f9fa; padding: 10px; text-align: center; }
            .content { margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Pesan Baru dari Website</h2>
            </div>
            <div class='content'>
                <p><strong>Nama:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Pesan:</strong></p>
                <p>$message</p>
            </div>
        </div>
    </body>
    </html>
    ";

    if (mail($to, $subject, $body, $headers)) {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-success' role='alert'>
                Email berhasil dikirim!
            </div>
            <a href='index.php' class='btn btn-primary'>Kembali ke Formulir</a>
        </div>";
    } else {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-danger' role='alert'>
                Gagal mengirim email.
            </div>
            <a href='index.php' class='btn btn-primary'>Coba Lagi</a>
        </div>";
    }
} else {
    echo "Metode pengiriman salah.";
}
?>
