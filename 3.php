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

// ลบข้อมูลตาม ID
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM plukfield WHERE id='$delete_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<div class='success-message'>Record deleted successfully</div>";
    } else {
        echo "<div class='error-message'>Error deleting record: " . $conn->error . "</div>";
    }
}

// อัปเดตข้อมูลในฐานข้อมูล
if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $field = $_POST['field'];
    $total_price = $_POST['total_price'];
    $edit_id = $_POST['edit_id'];

    $sql_update = "UPDATE plukfield SET fullname='$fullname', phone='$phone', field='$field', total_price='$total_price' WHERE id='$edit_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "<div class='success-message'>Record updated successfully</div>";
    } else {
        echo "<div class='error-message'>Error updating record: " . $conn->error . "</div>";
    }
}

// อัปเดตสถานะเป็นโอนเรียบร้อย
if (isset($_GET['confirm_id'])) {
    $confirm_id = $_GET['confirm_id'];
    $sql_confirm = "UPDATE plukfield SET status='confirmed' WHERE id='$confirm_id'";
    if ($conn->query($sql_confirm) === TRUE) {
        echo "<div class='success-message'>Payment confirmed successfully</div>";
    } else {
        echo "<div class='error-message'>Error confirming payment: " . $conn->error . "</div>";
    }
}

// SQL สำหรับเลือกข้อมูล
$sql = "SELECT * FROM plukfield";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show Booking Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            background-color: #fff;
            padding: 20px;
            margin: auto;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            padding: 8px 10px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
        }

        .success-message, .error-message {
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }

        form {
            background-color: #f9f9f9;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .btn {
                padding: 6px 8px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            table, th, td {
                font-size: 12px;
            }

            .btn {
                padding: 5px 7px;
                font-size: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Booking List</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Field</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Water Packs</th>
                <th>Bank</th>
                <th>Payment Proof</th>
                <th>Total Price</th>
                <th>Booking Date</th>
                <th>Confirm Payment</th>
                <th>Actions</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                // แสดงข้อมูลแต่ละแถว
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["field"] . "</td>";
                    echo "<td>" . $row["start_time"] . "</td>";
                    echo "<td>" . $row["end_time"] . "</td>";
                    echo "<td>" . $row["water_packs"] . "</td>";
                    echo "<td>" . $row["bank"] . "</td>";
                    echo "<td><a href='http:/034/{$row['payment_proof']}' target='_blank'>ดูหลักฐาน</a></td>";
                    echo "<td>" . $row["total_price"] . "</td>";
                    echo "<td>" . $row["booking_date"] . "</td>";
                    
                    // ตรวจสอบว่ามีสถานะหรือไม่ หากไม่มีให้แสดงค่าเริ่มต้น
                    $status = isset($row["status"]) ? $row["status"] : 'Not Confirmed';
                    echo "<td>" . ($status == 'confirmed' ? "<span style='color:green; font-weight:bold;'>Confirmed</span>" : "<a href='confirm_booking2.php?confirm_id=" . $row["id"] . "' class='btn btn-small'>Confirm</a>") . "</td>";
                    
                    // แสดงปุ่มแก้ไขและลบ
                    echo "<td class='action-buttons'>
                            <a href='?edit_id=" . $row["id"] . "' class='btn'>Edit</a>
                            <a href='?delete_id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No data available</td></tr>";
            }
            ?>
        </table>

        <?php
        // ตรวจสอบหากผู้ใช้กำลังแก้ไขข้อมูล
        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $sql_edit = "SELECT * FROM plukfield WHERE id='$edit_id'";
            $result_edit = $conn->query($sql_edit);
            if ($result_edit->num_rows > 0) {
                $row_edit = $result_edit->fetch_assoc();
                // แสดงฟอร์มแก้ไขข้อมูล
                echo "<form method='POST' action=''>
                    <label>Full Name:</label>
                    <input type='text' name='fullname' value='" . htmlspecialchars($row_edit['fullname']) . "' required><br>
                    <label>Phone:</label>
                    <input type='text' name='phone' value='" . htmlspecialchars($row_edit['phone']) . "' required><br>
                    <label>Field:</label>
                    <input type='text' name='field' value='" . htmlspecialchars($row_edit['field']) . "' required><br>
                    <label>Total Price:</label>
                    <input type='number' name='total_price' value='" . htmlspecialchars($row_edit['total_price']) . "' required><br>
                    <input type='hidden' name='edit_id' value='" . $edit_id . "'>
                    <input type='submit' name='update' value='Update'>
                </form>";
            }
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
