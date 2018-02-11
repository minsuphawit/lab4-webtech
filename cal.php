<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CssCal.css" />
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
              <option value="./bmr.php">คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</option>
              <option value="./cal.php"selected>คำนวณค่าคอเลสเตอรอลรวม</option>
          </select>
          <br>
          <br>
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            ระดับไขมันแอลดีแอล มิลลิกรัม/เดซิลิตร <br>
            <input type="text" name="ldl" value=""><br><br>
            ระดับไขมันเอชดีแอล  มิลิกรัม/เดซืลิตร <br>
            <input type="text" name="hdl" value=""><br><br>
            ไตรกลีเซอไรด์ มิลิกรัม/เดซิลิตร <br>
            <input type="text" name="tri" value=""><br>
            <input type="submit" name="" value="คำนวณ">
          </form>
          <br>
          <hr>
          <div class="result">
            <?php
                   if($_SERVER["REQUEST_METHOD"] == "POST"){
                     $ldl = $_POST["ldl"];
                     $hdl = $_POST["hdl"];
                     $tri = $_POST["tri"];
                     if(is_numeric($ldl) && is_numeric($hdl) && is_numeric($tri)){
                       $cal  =  $ldl+$hdl+($tri/5);
                       printf("ค่าคอเลสเตอรอลรวม =  %d อยู่ในเกณฑ์ ",$cal);
                       if($cal>=240){
                         echo "<i>สูง</i>";
                       }
                       elseif ($cal>=200) {
                         echo "<i>ค่อนข้างสูง</i>";
                         # code...
                       }
                      else {
                        echo "<i>ดีมาก</i>";
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
