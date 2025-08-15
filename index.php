<?php
$host = "localhost";
$user = "root"; // ضع اسم مستخدم MySQL
$pass = "";     // ضع كلمة مرور MySQL إذا كانت موجودة
$dbname = "clinic";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $date = $_POST["date"];

    $stmt = $conn->prepare("INSERT INTO bookings (name, phone, service, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $service, $date);

    if ($stmt->execute()) {
        echo "<script>alert('تم الحجز بنجاح!'); window.location.href='index.html';</script>";
    } else {
        echo "حدث خطأ: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
