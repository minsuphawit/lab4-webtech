<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>bmi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CssBmi.css" />
    <script src="jquery-3.3.1.min.js" charset="utf-8"></script>
</head>
<body>
    <div class = "wrapper">

      <div class="form">
        <h1>Health Check</h1>
        <hr style="margin-top:-30px;">
        <br>

        <select id="" onchange="window.location=this.value" >
            <option value="index.php" selected>คำนวณหาค่าดัชนีมวลกาย Body Mass Index (BMI)</option>
            <option value="bmr.php" >คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</option>
            <option value="cal.php">คำนวณค่าคอเลสเตอรอลรวม</option>
        </select>
        <br>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="">ส่วนสูง/เซนติเมตร</label><br>
            <input type="text" name = "height"><br><br>
            <label for="" >น้ำหนัก/กิโลกรัม</label><br>
            <input type="text" name = "weight" ><br>
            <input type="submit" value="คำนวณ">


        </form>
        <br>
        <hr>
        <div class="result">
          <?php
              if($_SERVER["REQUEST_METHOD"] == "POST"){
                $height = $_POST["height"];
                $weight = $_POST["weight"];

                if(is_numeric($height) && is_numeric($weight)){
                  $bmi =  $weight / ($height/100)**2;
                  printf("ดัชนีมวลกาย = %.2f ",$bmi);
                  if ($bmi>=40) {

                    echo "<i>โรคอ้วนขั้นสูง</i>";
                  }
                  else if ($bmi>=35){
                    echo "<i>โรคอ้วนระดับ2</i>\nคุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน ต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง";
                  }
                  else if ($bmi>=28.5) {
                    echo "<i>โรคอ้วนระดับ1</i >\n คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย";

                    # code...
                  }
                  else if ($bmi>=23.5) {
                    echo "<i>น้ำหนักเกิน</i> \nหากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23";
                    # code...
                  }
                  else if ($bmi>=18.5){
                    echo "<i>น้ำหนักปกติ</i>  \nมักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้";
                  }
                  else{
                    echo "<i>น้ำหนักน้อยเกินไป</i> \nได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ ";
                  }

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
