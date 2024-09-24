<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งค่า confirm_id มา
if (isset($_GET['confirm_id'])) {
    $confirm_id = $_GET['confirm_id'];

    // อัปเดตสถานะเป็น confirmed
    $sql_confirm = "UPDATE plukfield SET status='confirmed' WHERE id='$confirm_id'";
    if ($conn->query($sql_confirm) === TRUE) {
        echo "<div class='success-message'>Booking confirmed successfully</div>";
    } else {
        echo "<div class='error-message'>Error confirming plukfield: " . $conn->error . "</div>";
    }

    // เปลี่ยนเส้นทางกลับไปยังหน้าหลัก
    header("Location: 3.php"); // หรือใส่หน้าหลักของคุณ
    exit;
}

$conn->close();
?>
