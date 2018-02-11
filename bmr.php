<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>bmr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CssBmr.css" />
    <script src="jquery-3.3.1.min.js" charset="utf-8"></script>
</head>
<body>

    <div class = "wrapper">
      <div class="form">
          <h1>Health Check</h1>
          <hr style="margin-top:-30px;">
          <br>
        <select id="" onchange="window.location=this.value" >
            <option value="./index.php">คำนวณหาค่าดัชนีมวลกาย Body Mass Index (BMI)</option>
            <option value="./bmr.php" selected>คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</option>
            <option value="./cal.php">คำนวณค่าคอเลสเตอรอลรวม</option>
        </select>
        <br>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="">ส่วนสูง/เซนติเมตร</label>
              <label for="" style="margin-left:130px;">น้ำหนัก/กิโลกรัม</label><br>
            <input type="text" name = "height">
            <input type="text" name = "weight"  style="margin-left:50px;"><br><br>
            <label for="">อายุ</label>
            <label for="" style="margin-left:225px;">เพศ</label><br>
            <input type="text" name = "age">

            <input type="radio" name="gender"  value="male" checked style="margin-left:50px;"> ชาย
            <input type="radio" name= "gender"  value="female"  style="margin-left60px;"> หญิง <br><br>
            <label for="">กิจกรรม</label><br>
      <select name="event" >
        <option value="1.2" selected>ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</option>
        <option value="1.375">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
        <option value="1.55">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</option>
        <option value="1.725">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</option>
        <option value="1.9">ออกกำลังกายหนักมากเป็นนักกีฬา</option>
      </select><br>

            <input type="submit" value="คำนวณ">

        </form>
        <br>
        <hr>
        <div class="result">
          <?php
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $height  = $_POST["height"];
            $weight = $_POST["weight"];
            $gender  = $_POST["gender"];
            $age = $_POST["age"];
            $event = $_POST["event"];

            if(is_numeric($age) && is_numeric($height) && is_numeric($weight)){
              if($gender == "male"){
                $bmr = 66 + (13.7*$weight) + (5*$height) - (6.8*$age);

              }
              else {
                $bmr = 665+(9.6*$weight)+(1.8*$height)-(4.7*$age);

              }
              printf( "BMR พลังงานที่จำเป็นพื้นฐานในการมีชีวิต  %d กิโลแคลอรี่<br>",$bmr);
              printf("TDEE พลังงานที่คุณใช้ในแต่ละวัน %d กิโลแคลอรี่",$bmr*$event);




            }
            else {
              echo "กรอกค่าผิด กรุณากรอกค่าใหม่";
            }


          }



          ?>

        </div>



      </div>


    </div>

</body>
</html>
