<?php
  
  $nickname = $_POST['nickname'];
  // $score = $_POST['score'];

  //DB연결
  $dbcon = mysqli_connect('localhost', 'root','jungwon04^^', 'n');
  

 //DB 쿼리

 $query = "SELECT * FROM n.cardgame WHERE 닉네임 = '$nickname'";
//  $query = "insert into cardgame values ('$nickname')";
  // 실행
  $result = mysqli_query($dbcon, $query);

  // 결과 확인
  if (mysqli_num_rows($result) > 0) {
    //닉네임 중복O
    //   header("Location: MarsProject.html");
    // echo "<script>alert('동일한 닉네임이 존재합니다.')</script>";
    echo "<script>
              alert('동일한 닉네임이 존재합니다.');
            </script>";
            header("Location: MarsProject.html");
      exit();
  } else {
    //닉네임 중복X
    $query = "insert into n.cardgame(닉네임,점수) values ('$nickname',0)";

    if (mysqli_query($dbcon, $query)) {
      // 삽입 성공 시 GameScreen.html로 이동
      header("Location: GameScreen.html");
      exit();
  }
    // header("Location: GameScreen.html");
  }

  //DB연결 종료
  mysqli_close($dbcon);
  // echo "PHP 실행 확인";
?>