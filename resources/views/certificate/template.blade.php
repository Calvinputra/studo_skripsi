<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }
        .certificate {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 2px solid #dddddd;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 10px;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            font-size: 18px;
            color: #666666;
            margin-bottom: 10px;
        }
        .signature {
            text-align: right;
            margin-top: 20px;
        }
        .signature p {
            font-size: 16px;
            color: #888888;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="header">
            <h2>Sertifikat Kelas</h2>
            <h3>Dengan bangga Kami persembahkan kepada</h3>
        </div>
        <div class="content">
            <center>
                <h3>{{ $user_name }}</h3>
                <p>Atas Keberhasilannya dalam menyelesaikan:</p>
                <h4>{{ $class_name }}</h4>
            </center>
        </div>
        <div class="signature">
            <p>Tanda tangan:</p>
            <p>Nama Penandatangan</p>
            <p>Jabatan Penandatangan</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>