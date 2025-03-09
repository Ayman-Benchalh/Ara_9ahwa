<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            font-size: 80px;
            color: #dc3545;
        }
        p {
            font-size: 20px;
            color: #6c757d;
        }
        a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Désolé, la page que vous cherchez n'existe pas.</p>
        <a href="{{ route('home') }}">Retour à l'accueil</a>
    </div>
</body>
</html>
