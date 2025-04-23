<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .welcome-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            animation: slideIn 1s ease;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        @keyframes slideIn {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-glow {
            background-color: #f1faee;
            color: #1d3557;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            background-color: #a8dadc;
            color: #1d3557;
            box-shadow: 0 0 15px #f1faee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="welcome-card mx-auto">
            <h1>Selamat Datang!</h1>
            <p>Terima kasih telah mengunjungi website kami. Jelajahi fitur-fitur menarik dan nikmati pengalaman terbaik bersama kami.</p>
            <a href="{{ route('kriterias.index') }}" class="btn btn-glow">Mulai Sekarang</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>