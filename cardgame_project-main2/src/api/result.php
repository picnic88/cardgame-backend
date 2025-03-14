<?php
require 'db.php';
header("Content-Type: application/json; charset=UTF-8");

$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : null;
$score = isset($_POST['score']) ? $_POST['score'] : null;

if($nickname === null || $score === null) {
	echo json_encode(["status" => "error", "message" => "닉네임과 점수는 필수 항목입니다."]);
	exit();
}

  //DB연결
  //$dbcon = mysqli_connect('localhost', 'root','jungwon04^^', 'n');
  

 //DB 쿼리

 $query = "SELECT * FROM users WHERE nickname = '$nickname'";
//  $query = "insert into cardgame values ('$nickname')";
  // 실행
  $result = mysqli_query($conn, $query);

  // 결과 확인
  if (mysqli_num_rows($result) > 0) {
    echo json_encode(["status" => "error", "message" => "동일한 닉네임이 존재합니다."]);
    exit();
  } else {
    //닉네임 중복X
    $query = "insert into users(nickname,score) values ('$nickname', '$score')";

    if (mysqli_query($conn, $query)) {
      echo json_encode(["status" => "success", "message" => "사용자가 성공적으로 등록되었습니다."]);
      exit();
    } else {
      echo json_encode(["status" => "error", "message" => "사용자 등록 실패", "error" => mysqli_error($conn)]);
      exit();
    }
  }

  //DB연결 종료
  mysqli_close($conn);
  // echo "PHP 실행 확인";
?>
