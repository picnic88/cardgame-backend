<?php
  
  $nickname = $_POST['nickname'];
  // $score = $_POST['score'];

  //DB연결
  require 'db.php';
  

  //DB 쿼리

  $query = "SELECT * FROM users WHERE nickname = '$nickname'";

  $result = mysqli_query($conn, $query);

  // 결과 확인
  if (mysqli_num_rows($result) > 0) {
    //닉네임 중복O
    // true 값 반환
    echo json_encode(array("status" => true));
    exit();
  } else {
    //닉네임 중복X
    $query = "insert into users(nickname, score) values ('$nickname',0)";

    if (mysqli_query($conn, $query)) {
      exit();
    }
    // header("Location: GameScreen.html");
  }

  //DB연결 종료
  mysqli_close($conn);
?>