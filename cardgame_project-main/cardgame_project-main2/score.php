<?php
$dbcon = new mysqli('localhost', 'root', 'jungwon04^^', 'n');

var_dump($checkStmt);


// 요청 방식 확인 (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 데이터 수신
    $score = isset($_POST['score']) ? $_POST['score'] : 0;
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';

    // 닉네임 존재 확인
    $checkQuery = "SELECT * FROM n.cardgame WHERE 닉네임 = '$nickname'";
    $result = $dbcon->query($checkQuery);

    if ($result->num_rows > 0) {
        // 닉네임 있으면 점수 업데이트
        $updateQuery = "UPDATE n.cardgame SET 점수 = $score WHERE 닉네임 = '$nickname'";
        if ($dbcon->query($updateQuery) === TRUE) {
            echo "✅ 점수 업데이트 성공!";
        } else {
            echo "❌ 점수 업데이트 실패: " . $dbcon->error;
        }
    } else {
        echo "❌ 닉네임을 찾을 수 없습니다.";
    }
}

// DB 연결 종료
$dbcon->close();
?>
