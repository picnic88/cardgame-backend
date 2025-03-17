<?php
  
  $nickname = $_POST['nickname'];
  // $score = $_POST['score'];

  //DB연결
  require 'db.php';
  

  //DB 쿼리

  $query = "SELECT * FROM users WHERE nickname = '$nickname'";

  $result = mysqli_query($dbcon, $query);

  // 결과 확인
  if (mysqli_num_rows($result) > 0) {
    echo "<script>
              alert('동일한 닉네임이 존재합니다.');
            </script>";
      exit();
  } else {
    //닉네임 중복X
    $query = "insert into users(nickname, score) values ('$nickname',0)";

    if (mysqli_query($dbcon, $query)) {
      exit();
  }
    // header("Location: GameScreen.html");
  }

  //DB연결 종료
  mysqli_close($dbcon);
?>