<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran Siswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 20px;
            color: #333333;
        }

        .email-body h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .email-body ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .email-body ul li {
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }

        .email-footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Konfirmasi Pendaftaran Siswa</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2>Selamat, pendaftaran siswa berhasil!</h2>
            <p>Halo {{ $name }},</p>
            <p>Terima kasih telah mendaftarkan siswa atas nama <strong>{{ $name }}</strong> di sekolah kami.
                Berikut detail pendaftarannya:</p>
            <ul>
                @foreach ($details as $key => $value)
                    <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                @endforeach
            </ul>
            <p>Jika ada pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>Salam,</p>
            <p><strong>Tim Administrasi Sekolah</strong></p>
            <p>Email: admin@sekolah.com | Telepon: (021) 1234-5678</p>
        </div>
    </div>
</body>

</html>
