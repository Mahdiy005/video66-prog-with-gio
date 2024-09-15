<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 8rem;
            margin-bottom: 1rem;
            color: #ff6f61;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .button {
            text-decoration: none;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #ff8f81;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $this->args['code']; ?></h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="/" class="button">Go Back Home</a>
    </div>
</body>
</html>
