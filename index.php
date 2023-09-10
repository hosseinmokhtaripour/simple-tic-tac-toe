<?php
  $WON = "noStatus";
  $box = array('','','','','','','','','',);
  if(isset($_POST["submit"])){
    $box[0] = $_POST['box0'];
    $box[1] = $_POST['box1'];
    $box[2] = $_POST['box2'];
    $box[3] = $_POST['box3'];
    $box[4] = $_POST['box4'];
    $box[5] = $_POST['box5'];
    $box[6] = $_POST['box6'];
    $box[7] = $_POST['box7'];
    $box[8] = $_POST['box8'];

    //logic method
    if(($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x') ||
    ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') ||
    ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') ||
    ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x') ||
    ($box[2] == 'x' && $box[6] == 'x' && $box[8] == 'x') ||
    ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x') ||
    ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') ||
    ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') ||
    ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x')){
      $WON = "won";
      echo "<br> <strong> X برنده بازی <strong> <br>";
    }
    $blank = 0;
    for($i = 0 ; $i <= 8 ; $i++){
      if($box[$i] == ''){
        $blank = 1;
      }
    }

    if($blank == 1 && $WON == "noStatus"){
      $i = rand() % 8;
      while($box[$i] != ''){
        $i = rand() % 8;
      }
      $box[$i] = 'O';
      if(($box[0] == 'O' && $box[1] == 'O' && $box[2] == 'O') ||
      ($box[3] == 'O' && $box[4] == 'O' && $box[5] == 'O') ||
      ($box[6] == 'O' && $box[7] == 'O' && $box[8] == 'O') ||
      ($box[0] == 'O' && $box[3] == 'O' && $box[6] == 'O') ||
      ($box[2] == 'O' && $box[6] == 'O' && $box[8] == 'O') ||
      ($box[2] == 'O' && $box[4] == 'O' && $box[6] == 'O') ||
      ($box[1] == 'O' && $box[4] == 'O' && $box[7] == 'O') ||
      ($box[2] == 'O' && $box[5] == 'O' && $box[8] == 'O') ||
      ($box[0] == 'O' && $box[4] == 'O' && $box[8] == 'O')){
        $WON = "won";
        echo "<br> <strong> O برنده بازی <strong> <br>";
      }
    }else if($WON == "noStatus"){
      $WON = "draw";
      echo "<br><strong>بازی مساوی شد<strong><br>";
    }
  }
?>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>بازی دوز</title>
    <style type="text/css">
      #box {
        background-color: #2dd4e3;
        border: 3px solid black;
        width: 100px;
        height: 100px;
        font-size: 70px;
        text-align: center;
      }
      #go {
        width: 150px;
        height: 50px;
        background-color: #4C78DD;
        font-size: 20px;
        border-radius: 50px;
      }
      #again {
        width: 200px;
        height: 50px;
        background-color: #4C78DD;
        font-size: 20px;
        border-radius: 50px;
      }
    </style>
  </head>
  <body bgcolor="#e6ebe7" align="center">
    <form action="index.php" method="post">
        <?php
          for($i = 0 ; $i <= 8 ; $i++){
            echo "<input type='text' name='box".$i."' value='".$box[$i]."' id='box'>";
            if($i==2 || $i ==5 || $i==8){
              echo "<br>";
            }
          }
          if($WON == "noStatus"){
            echo "<br><input type='submit' name='submit' value='شروع بازی' id='go'>";
          }else{
            echo '<br><input type="button" value="بازی دوباره" id="again" onclick="window.location.href=\'index.php\'">';
          }
         ?>
    </form>
  </body>
</html>
