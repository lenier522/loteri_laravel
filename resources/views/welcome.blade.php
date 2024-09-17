<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 | Página no encontrada</title>
    
        <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/404-icon.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Lottie Animation Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f1f5f9;
            color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            text-align: center;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #e53e3e;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .status-code {
            font-size: 1rem;
            color: #718096;
            margin-bottom: 2rem;
        }

        a {
            color: #3182ce;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            background-color: #edf2f7;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e2e8f0;
        }

        .lottie-container {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
        }

        lottie-player {
            display: block;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <!-- Lottie Animation -->
        <div class="lottie-container">
            <lottie-player 
                src="https://lottie.host/fa95211d-d378-4ced-baae-dc126f50d9fb/6BO5GJjDgQ.json" 
                background="transparent"  
                speed="1"  
                style="width: 300px; height: 300px;"  
                loop  
                autoplay>
            </lottie-player>
        </div>
        
        <h1>Página no encontrada</h1>
        <p>Lo sentimos, no pudimos encontrar la página que estás buscando.</p>
        <p class="status-code">Error 404 - Not Found</p>
        <a href="{{ url('/') }}">Regresar al inicio</a>
    </div>
</body>
</html>