<?php
session_start();
session_unset();  // ลบตัวแปรทั้งหมดในเซสชัน
session_destroy();  // ทำลายเซสชัน
header("Location: admin_login.php"); // เปลี่ยนเส้นทางกลับไปยังหน้าล็อกอิน
exit();
?>
