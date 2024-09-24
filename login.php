<?php
include 'db.php'; // ไฟล์ที่เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // สร้าง session เพื่อเก็บข้อมูลผู้ใช้
            session_start();
            $_SESSION['username'] = $username;

            // เปลี่ยนหน้าไปยังหน้า dashboard.php
            header("Location: dashboard.php");
            exit(); // หยุดการทำงานของ script ที่เหลือ
        } else {
            echo "<div class='error-message'>รหัสผ่านไม่ถูกต้อง</div>";
        }
    } else {
        echo "<div class='error-message'>ไม่พบชื่อผู้ใช้</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8e44ad, #9b59b6); /* Purple gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-container:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
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
            background-color: #2ecc71;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #27ae60;
            transform: translateY(-5px);
        }

        .error-message {
            color: #e74c3c;
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
        <h2>เข้าสู่ระบบ</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">เข้าสู่ระบบ</button>
        </form>
    </div>
</body>
</html>
