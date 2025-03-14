<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php';

// 데이터베이스 연결 정보
//$servername = "localhost";
//$username = "root";
//$password = "jungwon04^^";
//$dbname = "n";

// MySQL 연결
//$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
//if ($conn->connect_error) {
//    die(json_encode(["status" => "error", "message" => "DB 연결 실패"]));
//}

// 랭킹 조회 쿼리 (점수 내림차순 정렬)
$sql = "SELECT nickname, score FROM users ORDER BY score DESC";
$result = $conn->query($sql);

$rankings = [];
$rank = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rankings[] = [
            "rank" => $rank,
            "nickname" => $row["nickname"],
            "score" => (int) $row["score"]
        ];
        $rank++;
    }
}

// JSON 응답 출력
echo json_encode(["status" => "success", "rankings" => $rankings], JSON_PRETTY_PRINT);

// 연결 종료
$conn->close();
?>
