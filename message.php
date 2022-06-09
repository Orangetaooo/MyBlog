<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>橘子哥留言板</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/message.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script>
    $(function () {
        $("#topnav").load("topnav.html");
    })
 
    $(function () {
        $("#rightcolumn").load("rightcolumn.html");
    })

    $(function () {
        $("#footer").load("footer.html");
    })
  </script>

</head>
<body>

<div class="header">
  <h1>TheLiuYanBoard</h1>
  <p>有什么想表达的，whatever，请都留在这里！</p>
</div>

<div id="topnav"></div>



<div class="row">
  <div class="leftcolumn">
    
  <div class="card">
        <form name="input" action="send_db.php" method="POST">
          <label for="fname">留下你的大名：</label>
          <input type="text" id="name" name="name" >

          <label for="lname">留言内容：</label>
          <!-- <input type="text" id="text" name="text" placeholder="Your content.."> -->
          <textarea name="text"></textarea>
          <input type="submit" value=" 发布留言！" ><br><br><br><br>
        </form>
      </div>

    <?php
      $link=mysqli_connect("localhost","root","123456","orange");//连接数据库
      mysqli_query($link,"set name utf8"); 
      $sql="select * from message order by time desc";
      $result=mysqli_query($link,$sql);//执行语句
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      foreach($result as $value){?>
        <div class="card">
          <h3><?php echo($value["name"]); ?>:</h3>
          <p align="center"><?php echo($value["text"]); ?></p>
          <h5><p align="right"><?php echo($value["time"]); ?></p></h5>
        </div>
     <?php }?>
  
      
  </div>
  <div id="rightcolumn"></div>
</div>

    <div id="footer"></div>


</body>
</html>
