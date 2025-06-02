<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/test_drive_print.css" type="text/css">
  <title>test_drive_print</title>
</head>
<body>
  <?php 
    // 검색어
    $search_txt = $_POST['search_txt'];

    // DB 연결
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '1234';
    $mysql_db = 'kdt';

    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    if(!$conn) {
      die('연결 실패 : ' . mysqli_connect_error());
    }

    // 연결 성공시 쿼리문 실행
    $query = "select * from test_drive where name = '$search_txt' or phone = '$search_txt';";

    $result = mysqli_query($conn, $query);

    print "<form name='현대자동차 시승신청 결과' method='post' action='./test_drive_search.php'>";
    print "<table><caption>현대자동차 시승신청 예약현황</caption><thead><tr><th>번호</th><th>고객명</th><th>휴대폰</th><th>SMS수신</th><th>이메일</th><th>희망지점</th><th>시승차량</th><th>보유차량</th><th>시승희망일</th></tr></thead><tbody>";

    while($row = mysqli_fetch_row($result)) {
      print "<tr><td>" . $row[0] . "</td>"; //code
      print "<td>" . $row[1] . "</td>"; //name
      print "<td>" . $row[2] . "</td>"; //phone
      print "<td>" . $row[3] . "</td>"; //sms
      print "<td>" . $row[4] . "</td>"; //email
      print "<td>" . $row[5] . "</td>"; //region
      print "<td>" . $row[6] . "</td>"; //car(s_car)
      print "<td>" . $row[7] . "</td>"; //my_car
      print "<td>" . $row[8] . "</td></tr>"; //e_date
    }

    print "</tbody></table>";

    print "<p class='reserve'><a href='../test_drive.html' title='시승신청예약하기'>시승신청예약하기</a></p>";
    print "<div class='reserve_list'><input type='search' name='search_txt' placeholder='고객명 또는 휴대폰 번호'><input type='submit' value='예약조회하기'></div>";
    echo "</form>";

    // DB 종료
    mysqli_close($conn);
  ?>
</body>
</html>