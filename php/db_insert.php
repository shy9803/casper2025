<?php 
  // db_insert.php
  // 데이터 입력을 받는다.

  // 입력값 받기
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $sms = $_POST['sms'];
  $email = $_POST['email'];
  $region = $_POST['region'];
  $car = $_POST['car'];
  $my_car = $_POST['my_car'];
  $e_date = $_POST['e_date'];

  print $name . '<br>' . 
  $phone . '<br>' . 
  $sms . '<br>' . 
  $email . '<br>' . 
  $region . '<br>' . 
  $car . '<br>' . 
  $my_car . '<br>' . 
  $e_date . '<br>';

  // DB연결
  $mysql_host = 'localhost'; // 호스트
  $mysql_user = 'root'; // 사용자
  $mysql_password = '1234'; // 비밀번호
  $mysql_db = 'kdt'; // 데이터베이스 저장위치

  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db); //절차 지향적

  if(!$conn) {
    die('연결 실패 : ' . mysqli_connect_error());
  }

  // 연결 성공시 쿼리문 실행
  $query = "insert into test_drive(name, phone, sms, email, region, s_car, my_car, e_date) values ('$name', '$phone', '$sms', '$email', '$region', '$car', '$my_car', '$e_date');";

  $result = mysqli_query($conn, $query);

  echo '입력 완료';

  // DB 종료
  mysqli_close($conn);
?>