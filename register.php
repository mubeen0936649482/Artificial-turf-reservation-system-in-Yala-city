<?php
include 'db.php'; // ไฟล์ที่เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // เข้ารหัสรหัสผ่าน

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>สมัครสมาชิกสำเร็จ</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
            overflow: hidden;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transition: transform 0.4s;
        }

        .form-container:hover {
            transform: scale(1.05);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #fff;
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            color: #eee;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        button {
            width: 100%;
            background-color: #ff6b6b;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #ff4757;
            transform: translateY(-5px);
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .success-message {
            color: #4cd137;
            text-align: center;
            margin-bottom: 15px;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
            }

            input[type="text"],
            input[type="password"] {
                padding: 10px;
            }

            button {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>สมัครสมาชิก</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">สมัครสมาชิก</button>
        </form>
    </div>
</body>
</html>
