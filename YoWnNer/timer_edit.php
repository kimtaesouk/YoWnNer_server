<?php
// 데이터베이스 연결 코드를 포함합니다.
require_once("db_connect.php");

// POST 데이터 가져오기
$tpid = $_POST["pid"];
$name = $_POST["name"];
$color = $_POST["color"];
$colorhex = $_POST["colorhex"];

// SQL 쿼리 작성
$sql = "UPDATE timer SET name = ?, color = ?, colorhex = ? WHERE pid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $color, $colorhex, $tpid);

// 쿼리 실행
if ($stmt->execute()) {
    // 성공적으로 업데이트됨
    $response = array("success" => true, "message" => "데이터가 업데이트되었습니다.");
    echo json_encode($response);
} else {
    // 업데이트 실패
    $response = array("success" => false, "message" => "데이터 업데이트 실패.");
    echo json_encode($response);
}

// 데이터베이스 연결 종료
$stmt->close();
$conn->close();
?>
