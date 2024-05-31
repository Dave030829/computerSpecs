<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            font-size: 1.1em;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the IoT Project</h1>
        <p>This is the home page.</p>
        <a href="/admin">Admin Panel</a>
    </div>
</body>
</html>
