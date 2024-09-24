<?php
session_start();

// ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบแล้วหรือยัง
if (!isset($_SESSION['username'])) {
    // ถ้าผู้ใช้ยังไม่ได้เข้าสู่ระบบ ให้ redirect ไปยังหน้า login.php
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #141629, #4e2c91);
            color: #ffffff;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #1f2235;
            padding: 20px;
            position: relative;
            transition: width 0.3s, background 0.3s;
            overflow: hidden;
        }
        .sidebar:hover {
            width: 280px;
            background: #2b2e47;
        }
        .profile {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 3px solid #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }
        .profile img:hover {
            transform: scale(1.1);
        }
        .profile h2 {
            font-size: 22px;
            margin: 15px 0 5px;
        }
        .profile p {
            font-size: 14px;
            color: #a0a3bd;
        }
        .menu-item {
            margin: 15px 0;
            display: flex;
            align-items: center;
        }
        .menu-item a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s ease;
            opacity: 0.9;
            position: relative;
        }
        .menu-item a:hover, .menu-item a.active {
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            transform: translateX(10px);
            opacity: 1;
        }
        .menu-item a i {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        .menu-item a:hover i {
            transform: rotate(360deg);
        }
        .content {
            flex-grow: 1;
            padding: 40px;
            background-color: #2d2f40;
            border-radius: 15px 0 0 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .content:hover {
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.1);
        }
        .content h1 {
            font-size: 28px;
            margin-bottom: 20px;
            position: relative;
            color: #ffab00;
        }
        .content h1::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 3px;
            background-color: #ffab00;
            bottom: -10px;
            left: 0;
            transition: width 0.4s ease;
        }
        .content h1:hover::after {
            width: 180px;
        }
        .content p {
            font-size: 16px;
            color: #a0a3bd;
        }
        .logout {
            margin-top: 50px;
            text-align: center;
        }
        .logout a {
            color: #a0a3bd;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .logout a:hover {
            color: #ffab00;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(31,34,53,0.9) 0%, rgba(31,34,53,0) 100%);
            pointer-events: none;
        }
        /* Add font awesome for icons */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        /* Scrollbar customization */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #2d2f40;
        }
        ::-webkit-scrollbar-thumb {
            background: #3a3d55;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4b4e6b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="profile.jpg" alt="Admin Profile">
            <h2><?php echo $_SESSION['username']; ?></h2>
            <p>admin@turfbooking.com</p>
        </div>
        <!-- เพิ่มเมนูสนามที่ต้องการ -->
        <div class="menu-item">
            <a href="1.php"><i class="fas fa-futbol"></i> สนามตือเบาะ</a>
        </div>
        <div class="menu-item">
            <a href="2.php"><i class="fas fa-futbol"></i> สนามมือลายูบางกอก</a>
        </div>
        <div class="menu-item">
            <a href="3.php"><i class="fas fa-futbol"></i> สนามพลุบาโกย</a>
        </div>
        <div class="logout">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>This is your admin dashboard for managing turf bookings.</p>
    </div>
</body>
</html>
