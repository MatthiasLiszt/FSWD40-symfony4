<?php

 include 'dbconnect.php';

 $connect=connectDB();

 function isInDatabase($connect,$user){
   $sql="select userName from userLog where userName='$user'";
   $result=mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0){return true;}else{return false;}
  }  

  function registering($connect,$user,$name,$surname,$hash,$birth){
   $userId="select count(userId) from user";
      
   $result=mysqli_query($connect,$userId);
   $row = mysqli_fetch_array($result);
  
   $curId=$row[0]+1;
   $userLog="insert into userLog (userName,password,userId) values ('$user','$hash','$curId')";
   $userSql="insert into user (userId,name,surname,birthday) values ('$curId','$name','$surname','$birth')";


   $resultUserLog=mysqli_query($connect,$userLog);
   $resultUser=mysqli_query($connect,$userSql);
  
   //echo "userId: ".$curId;
  } 

?>
<html>
<body>
<h1>Registering to PHP Car Rental</h1>
<form method="post">
<p><input type="text" name="username" placeholder="username"/></p>
<p><input type="text" name="realname" placeholder="real name"/></p>
<p><input type="text" name="surname" placeholder="real surname"/></p>
<p><input type="text" name="birth" placeholder="birthday"</p>
<p><input type="password" name="password" placeholder="password"/></p>
<p><input type="password" name="retype" placeholder="retype password"/></p>
<button type="submit" name="register">register</button>
</form>
<?php
  if(isset($_POST['register']))
   {$username=$_POST['username'];
    $realname=$_POST['realname'];
    $surname=$_POST['surname'];
    $password=$_POST['password'];
    $birth=$_POST['birth'];
    $retype=$_POST['retype'];
    if(!$connect)
     {echo "sorry, no database access";}
    else
     {if(isInDatabase($connect,$username)=="true")
       {echo "<h1>warning: username already exists !!!</h1>";}
      else
       {echo "<p>$username is okay</p>";
        if($password==$retype)
         {echo "<p>password was entered correctly</p>";
          if($realname==""||$surname==""||$birth=="")
           {echo "<h1>please fill all fields !!! no empty fields allowed</h1>";}
          else
           {echo "data correct, writing to database ...";
            $hashpass = hash('sha256', $password); // password hashing
            echo "<p>$username $realname $surname $hashpass</p>";
            registering($connect,$username,$realname,$surname,$hashpass,$birth);   
            echo "<h2>You successfully registered! </h2>";
           }
         }
        else
         {echo "<h1>password and retype do not match !!!</h1>";}
       
       }
     }
   }
?>
</body>
</html>