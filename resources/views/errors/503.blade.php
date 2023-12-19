<!DOCTYPE html>
<html>

<head>
    <title>503 - Bạn không có quyền truy cập vào trang này</title>
    <style>
        /* CSS cho trang 503 */
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 100px auto;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 60px;
            color: #ff6666;
            margin: 0;
        }

        p {
            font-size: 24px;
            color: #333;
            margin: 20px 0;
        }

        a {
            display: block;
            font-size: 20px;
            color: #fff;
            background-color: #ff6666;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto;
            max-width: 200px;
        }

        a:hover {
            background-color: #ff4d4d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>503</h1>
        <p>Bạn không có quyền thực hiện trức năng này</p>
        <a href="#" onclick="goBack()">Quay lại</a>
    </div>
</body>
<script>
    function goBack() {
        window.location.href = document.referrer;
    }
    </script>
</html>
