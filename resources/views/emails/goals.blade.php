<!DOCTYPE html>
<html>
<head>
    <title>Reminder Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e5e5e5;
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
            color: #063852;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #888888;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Lanjutkan Perjalanan Belajar Kamu di Studo pada Kelas {{ $goals->class_name }}! 🚀</h1>
        <p>Halo <b>{{ $goals->user_name }}</b>,</p>
        <p>Kami mengirim email ini sebagai pengingat kamu untuk melanjutkan dan menyelesaikan Kelas <b>{{ $goals->class_name }}</b> 🎯. Segera selesaikan kelas kamu untuk mendapatkan sertifikat yang dapat digunakan untuk mendukung CV atau portofolio kamu.</p>
        <p>Kamu dapat mengakses kelas ini kapan saja dan di mana saja melalui link berikut: <a href="https://studo.site/">Studo.Site</a> </p>
        <p>Teruslah belajar dan temukan pengetahuan baru setiap harinya!</p>

        <div class="footer">
            <p>Terima kasih,</p>
            <p>Tim Studo</p>
        </div>
    </div>
</body>
</html>
