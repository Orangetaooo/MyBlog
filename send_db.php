<?php
    $name=$_POST["name"];
	$text=$_POST["text"];
    $time = date("Y-m-d H:i:s");
	if($name==""||$text=="")
	 {
      	echo "<script>alert('填完整啊！笨蛋！'); history.go(-1);</script>";  
	 }
     else
     {
        $link=mysqli_connect("localhost","root","123456","orange");//连接数据库
        mysqli_query($link,"set names utf8"); 
        $sql_insert="insert into message (name,text,time)values('$_POST[name]','$_POST[text]', '$time')";
        $res_insert = mysqli_query($link,$sql_insert);
        if($res_insert)
        {
            echo "<script>alert('留言成功！');window.location='message.php';</script>";  
        }
        else
        {
            echo "<script>alert('系统繁忙请重试！'); history.go(-1);</script>";  
        }
     }
?> 
