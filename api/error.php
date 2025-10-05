<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;

            width: 100%;
            height: 100vh;
        }

        img {
            width: 35em;
            user-select: none;
        }

        @media (width <= 650px) {
            img {
                width: 25em;
            }
        }
        @media (width <= 422px) {
            img {
                width: 15em;
            }
        }
        @media (width <= 260px) {
            img {
                width: 10em;
            }
        }
        
    </style>
</head>
<body>
    <main>
        <img src="images/error-image.png" alt="error image">
    </main>
</body>
</html>