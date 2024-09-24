<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            margin: 0 auto 10px;
        }

        .sidebar h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .sidebar p {
            text-align: center;
            font-size: 14px;
            color: #ccc;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #444;
        }

        .sidebar ul li a.active {
            background-color: #28a745;
        }

        /* Main content */
        main {
            flex: 1;
            padding: 20px;
        }

        h1, h2 {
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="https://scontent-bkk1-2.xx.fbcdn.net/v/t39.30808-6/302133748_526817519246472_666858960998779757_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=9bT8gh8yVDAQ7kNvgHbhTVZ&_nc_ht=scontent-bkk1-2.xx&oh=00_AYARhvUneu1wf53jzac5K6FBX1ghsMK2hxv0QgN8RZInqg&oe=66D37283" alt="Admin Profile Picture">
        <h3>Greenfield Stadium</h3>
        <p>Store Name</p>
        <ul>
            <li><a href="?page=dashboard" class="active">Dashboard</a></li>
            <li><a href="?page=user_management">User Management</a></li>
            <li><a href="?page=booking_info">Booking Info</a></li>
            <li><a href="?page=booking_review">Booking Review</a></li>
            <li><a href="?page=logout" style="color: red;">Logout</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <main>
        <?php
        // กำหนดหน้าแรก
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

        // หน้าแอดมินหลัก
        if ($page == 'dashboard') {
            echo "<h2>Welcome to the Admin Dashboard</h2>";
            echo "<p>กรุณาเลือกเมนูเพื่อจัดการข้อมูลต่าง ๆ</p>";
        }
        // หน้าจัดการผู้ใช้
        elseif ($page == 'user_management') {
            echo "<h2>การจัดการผู้ใช้</h2>";
            echo "<p>ฟีเจอร์ในการเพิ่ม/แก้ไข/ลบผู้ใช้จะถูกเพิ่มในที่นี้</p>";
        }
// หน้าข้อมูลการจองของลูกค้า
if ($page == 'booking_info') {
    echo "<h2>ข้อมูลการจองของลูกค้า</h2>";

    // ตัวอย่างข้อมูลการจอง
    $booking = [
        'id' => 1,
        'ชื่อ' => 'สมชาย',
        'นามสกุล' => 'ใจดี',
        'เบอร์โทร' => '0812345678',
        'อีเมล' => 'somchai@example.com',
        'วันเวลาที่จอง' => '2024-08-27 10:00',
        'วันที่และเวลาใช้งาน' => '2024-09-01 09:00',
        'สถานะ' => 'รอการยืนยัน',
        'หมายเหตุ' => 'ต้องการเช่ากล้องรุ่นใหม่ล่าสุด',
        'จำนวนเงินที่ต้องชำระ' => '5000',
        'สถานะการชำระเงิน' => 'รอการชำระ',
        'วิธีการชำระเงิน' => 'โอนเงินผ่านธนาคาร',
        'สลิป' => 'slip1.jpg',
        'ชื่อบริการ' => 'กล้อง DSLR รุ่น XYZ',
        'จำนวน' => '1 วัน',
        'ราคา/หน่วย' => '5000 บาท',
        'รวมราคา' => '5000 บาท'
    ];

    // แสดงข้อมูลการจองในรูปแบบตารางแนวนอน
    echo "<h3>รายละเอียดการจอง</h3>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    
    // แถวที่มีชื่อหัวข้อของข้อมูล
    echo "<tr>";
    echo "<th>Booking ID</th>";
    echo "<th>ชื่อผู้จอง</th>";
    echo "<th>เบอร์โทร</th>";
    echo "<th>อีเมล</th>";
    echo "<th>วันเวลาที่จอง</th>";
    echo "<th>วันที่และเวลาใช้งาน</th>";
    echo "<th>สถานะการจอง</th>";
    echo "<th>หมายเหตุ</th>";
    echo "<th>จำนวนเงินที่ต้องชำระ</th>";
    echo "<th>สถานะการชำระเงิน</th>";
    echo "<th>วิธีการชำระเงิน</th>";
    echo "<th>สลิปการโอนเงิน</th>";
    echo "<th>ชื่อบริการ/สินค้า</th>";
    echo "<th>จำนวน</th>";
    echo "<th>ราคา/หน่วย</th>";
    echo "<th>รวมราคา</th>";
    echo "</tr>";

    // แถวที่มีรายละเอียดข้อมูลจริง
    echo "<tr>";
    echo "<td>{$booking['id']}</td>";
    echo "<td>{$booking['ชื่อ']} {$booking['นามสกุล']}</td>";
    echo "<td>{$booking['เบอร์โทร']}</td>";
    echo "<td>{$booking['อีเมล']}</td>";
    echo "<td>{$booking['วันเวลาที่จอง']}</td>";
    echo "<td>{$booking['วันที่และเวลาใช้งาน']}</td>";
    echo "<td>{$booking['สถานะ']}</td>";
    echo "<td>{$booking['หมายเหตุ']}</td>";
    echo "<td>{$booking['จำนวนเงินที่ต้องชำระ']} บาท</td>";
    echo "<td>{$booking['สถานะการชำระเงิน']}</td>";
    echo "<td>{$booking['วิธีการชำระเงิน']}</td>";
    echo "<td><a href='uploads/{$booking['สลิป']}' target='_blank'>ดูสลิป</a></td>";
    echo "<td>{$booking['ชื่อบริการ']}</td>";
    echo "<td>{$booking['จำนวน']}</td>";
    echo "<td>{$booking['ราคา/หน่วย']}</td>";
    echo "<td>{$booking['รวมราคา']}</td>";
    echo "</tr>";

    echo "</table>";

    // ฟังก์ชันเพิ่มเติม
    echo "<h3>ฟังก์ชันเพิ่มเติม</h3>";
    echo "<form method='POST' action='edit_booking.php' style='margin-bottom: 10px;'>
            <input type='hidden' name='booking_id' value='{$booking['id']}'>
            <input type='submit' name='edit' value='แก้ไขข้อมูลการจอง'>
          </form>";
    echo "<form method='POST' action='delete_booking.php'>
            <input type='hidden' name='booking_id' value='{$booking['id']}'>
            <input type='submit' name='delete' value='ลบการจอง' onclick='return confirm(\"คุณแน่ใจหรือไม่ว่าต้องการลบการจองนี้?\");'>
          </form>";
}
        // หน้าตรวจสอบการจอง
        elseif ($page == 'booking_review') {
            echo "<h2>ตรวจสอบการจอง</h2>";
            echo "<p>ฟีเจอร์ในการกรอง/ตรวจสอบสถานะการจองจะถูกเพิ่มในที่นี้</p>";
        }
        ?>
    </main>
</body>
</html>
