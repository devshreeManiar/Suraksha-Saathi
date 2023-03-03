<?php
session_start();
$_SESSION['user'] =$_GET['username'];
$e=$_GET['username'];
$servername="localhost";
$username="root";
$passsword="12#itlamshiv";
$dbname="women";
$conn=mysqli_connect($servername,$username,$passsword,$dbname);
if (isset($_GET["sign"]))
{

$us= $_GET['username']; 
$dob= $_GET['dob']; 
$pass=$_GET['pass'];
$email = $_GET['email']; 
$phno= $_GET['phno']; 
$name=$_GET['name'];
$address= $_GET['address']; 
$reltel= $_GET['reltel']; 
$reladdress=$_GET['reladdress'];
$relation = $_GET['relation']; 
$relname= $_GET['relname']; 
$sql="INSERT INTO user(Email_ID,DOB,Phone_no,User_ID,password,Name,Address) VALUES('$email','$dob','$phno','$us','$pass','$name','$address')";
$sql1="INSERT INTO family(Phone_no,User_ID,Address,relation,Name) VALUES('$reltel','$us','$reladdress','$relation','$relname')";
if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
  echo '<script type="text/javascript">alert("'.$name.'");</script>';
} 
else{
exit();
}
fun($us);
} 
elseif((isset($_GET["userlog"])))
{
  $us = $_GET['username'];  
  $pass=$_GET['pass'];
  $sql="SELECT * FROM user where User_ID='$us' AND password='$pass'";
  
  $result = mysqli_query($conn,$sql);
  $check = mysqli_fetch_array($result);
  if(isset($check)){
    $r="Welcome"." ".$us;
    echo '<script type="text/javascript">alert("'.$r.'");</script>';
  }
  else{
   exit();
   }
   fun($us);
}
elseif((isset($_GET["rellog"])))
{
  $us = $_GET['username'];  
  $name=$_GET['name'];
  $sql="SELECT * FROM family where User_ID='$us' AND name='$name'";
  $result = mysqli_query($conn,$sql);
  $check = mysqli_fetch_array($result);
  if(isset($check)){
    $r="Welcome"." ".$us;
    echo '<script type="text/javascript">alert("'.$r.'");</script>';
  }
  else{
   exit();
   }
   fun($us);
}
function fun($us)
{
  $_SESSION['user'] = $us;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SAFETYFIRST</title>
<link rel="icon" href="https://st2.depositphotos.com/1823785/7267/i/600/depositphotos_72675443-stock-photo-many-people-hands-holding-colorful.jpg" type="image/png">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link href="https://fonts.googleapis.com/css2?family=Modern+Antiqua&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;background-color: #CEDCF6;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.9;cursor:pointer;border-radius:30px}
.w3-half img:hover{opacity:1}
#hd
{
 font-family:'Amatic SC';
 font-size: 70px;

}
#main
{
font-family: 'Chewy';
}
#mySideBar
{
    box-shadow: 5px;
}
#red
{
  width:200px;
  height:200px;
  border-radius: 100px;
  background-color: red;
  opacity:0.8;
}
#red:hover{opacity:1}
#green
{
  width:200px;
  height:200px;
  border-radius: 100px;
  background-color: green;
  opacity:0.8;
}
#green:hover{opacity:1}
#orange
{
  width:200px;
  height:200px;
  border-radius: 100px;
  background-color:orangered;
  opacity:0.8;
}
#orange:hover{opacity:1}
.mainn
          {   width:400px;
            height:400px;
            background-color:white;
            z-index:3;
            border-radius: 5px;
            background-image:url("https://wallpaperaccess.com/full/3025501.jpg") ;
            border:2px firebrick solid;
            opacity:0.9;
            font-family: 'Amatic SC';
            font-size:20px;
            position:relative;
            left:-70px;
          }
          #g
           {
            padding-top:-20px;
           }
</style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">CLOSE MENU</a>
  <div class="w3-container">
    <h2 class="w3" id="hd"><b>Women Safety</b></h2>
  </div>
  <div class="w3-bar-block">
    <a href="exit.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white" id="us">LOG OUT</a> 
    <a href="right.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">KNOW ABOUT YOUR RIGHTS</a> 
    <hr>
    <hr>
    <h2>STORY TIME</h2>
    <form method="post">
      <textarea rows="4" cols="20" name="text"></textarea>
      <br>
      <input type="submit" value="Upload" name="story">
    </form>
    
    <?php
    if (isset($_POST["story"]))
    {
      $us=$_SESSION['user'];
      $story=$_POST['text'];
      $sql="INSERT INTO story(User_ID,story) VALUES('$us','$story')";
      if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Successfully added!")</script>';
      }
    }
    ?>
    <hr>
    <hr>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-white w3-margin-right" onclick="w3_open()">☰</a>
  <span>SAFETY FIRST</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:60px" id="showcase">
    <h1 class="w3-jumbo" id="main"><b>SURAKSHA SAATHI</b></h1>
    <h2 class=" w3-text-gray" style="position:relative; left:200px"><b>Together We Can.</b></h2>
    <h2 class=" w3-text-gray" style="position:relative; left:300px"><b>It's Time to Take Action.</b></h2>
    <hr style="width:700px;border:5px solid black" class="w3-round">
  </div>
  
  <!-- Photo grid (modal) -->
  <div class="w3-row-padding">

    <div class="w3-half Container">
      <img src="https://www.pepplay.in/wp-content/uploads/2022/03/1l9R6e2VnGzNIjZRVDRShGQ.jpeg" style="width:550px" onclick="onClick(this)">
      <p style="float:right;position:relative;top:-300px;left:600px">As the number of crimes against women continues to increase daily, women's safety has become an utmost priority. Defense isn’t the only measure that can be enough against this increasing abuse. The safety application will serve the purpose of providing security and safety to women so that they never feel helpless while facing such social challenges.</p>
    </div>
    <div class="w3-row" style="position:relative;top:-150px">
      <a href="red.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>"
      name="red"><div id="red" style="float:left">
        <p style="position:relative;top:40px;left:70px">RED</p>
      </div></a>
      <a href="green.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>"  name="green"><div id="green" style="float:left">
        <p style="position:relative;top:40px;left:70px">GREEN</p>
      </div></a>
      <a href="orange.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>"  name="orange"><div id="orange" style="float:left">
        <p style="position:relative;top:40px;left:70px">ORANGE</p>
      </div></a>
    </div>
    <br>
    <div class="mainn" >
                
      <h2 style="text-align:center">FUNCTIONS</h2>
      <hr>
      <hr>
      <p id="g"><ul>
        <li>Green mode- the location of the user is shared with the registered emergency number.</li>
        <li>Orange mode- the location of the user is shared with the registered emergency number along with a call.</li>
        <li> Red Mode- A call to the women help centre is immediately sent along with the user’s location. An alert and the location are sent to the family members.</li>
      </ul>
       </p>
      <hr>
      <hr>
  </div>

</div>

 

  <!-- Services -->
  <div class="w3-container" id="services" style=" position:relative;top:-300px">
    <h1 class="w3-xxxlarge w3-text-black"><b>OBJECTIVES.</b></h1>
    <hr style="width:50px;border:5px solid grey" class="w3-round">
    <p>
      <ul>
      <li><b>REGISTER FAMILY MEMBER'S CONTACT DETAILS:</b> If there is any emergency, it would help us contact the family members.</li>
      <li><b>SHARE LOCATION AND MAKE A CALL TO REGISTERED FAMILY MEMBERS AND WOMEN'S HELP CENTERS: </b>By sharing live location with family members and help centers, help us to reach the victim’s location at the earliest.</li>
      <li><b>UPLOAD YOUR STORY:</b> By sharing their experiences/stories, it would help others to be aware of the actions to be taken in similar situations.</li> </ul></p>
  </div>
  
  <!-- Designers -->
  <div class="w3-container" id="designers" style="margin-top:50px;position:relative;top:-200px">
    <h1 class="w3-xxxlarge w3-text-brown"><b>!!FEATURING!!</b></h1>
    <hr style="width:50px;border:5px solid grey" class="w3-round">
    <p>Our team aims to design a web-based application to help in providing safety for women across India. The application will have features such as finding the safest route to a place, sharing location and calling family members and emergency centres in case of an emergency, finding help in case of violence and more such features that ensure woman’s safety.
      Further, our application will also help women with their medical needs by providing locations of the nearest medical shops and hospitals with gynecologists. We also aim at expanding our application to assist in providing protection to children and senior citizens, if time permits.
    </p>
  </div>

  <!-- The Team -->
  <div class="w3-row-padding w3-grayscale " style="position:relative;top:-200px">
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="https://cdn.iconscout.com/icon/free/png-256/directions-1782209-1512759.png" alt="route" style="width:100%">
       <a href="safest.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>"><div class="w3-container">
          <h3>Safest Route</h3>
          <p>By routing the safest place to the victim, help them to reach that place and ensure their safety.</p>
          <input type="submit" value="safest Route">
        </div>
       </a>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="https://png.pngtree.com/png-clipart/20200701/original/pngtree-medicine-portfolio-flat-illustration-png-image_5406491.jpg" alt="shop" style="width:100%">
        <a href="shopkeeper.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>"><div class="w3-container">
          <h3>NEAREST SHOP TO BUY MEDICINE/SANITARY NAPKINS</h3>
          <p>In case of sudden menstruation flow, this feature can help the user to reach to the nearest shop to satisfy her requirements.</p>
          <input type="submit" value="Nearest Chemist Shop">
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="https://thumbs.dreamstime.com/b/medical-logo-caduceus-72380945.jpg" alt="gyno" style="width:100%"></a>
        <a href="gyno.php?id=<?php 
                            echo $_SESSION['user'];                        
                            ?>">
        <div class="w3-container">
          <h3>DISPLAY HOSPITAL WITH GYNECOLOGISTS:</h3>
          <p>In case of any situation, emergency or normal, helps the user find gynecologists. This feature ensures that the user has the information at her fingertips all in one app.</p>
          <input type="submit" value=" Nearest Gynecologist Center ">
        </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px;border:1px dotted black;position:Relative;top:-70px">
    <h1 class="w3-xxxlarge w3-text-black"><b>Contact Us.</b></h1>
    <hr style="width:50px;border:5px solid grey" class="w3-round">
    <p>For more information Contact us anytime:)</p>
    <form  method="post" >
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-block w3-padding-large w3-grey w3-margin-bottom" name="consub">Send Message</button>
    </form>  
  </div>
<!-- End page content -->
</div>
<?php
if (isset($_POST["consub"]))
{

$name = $_POST['Name']; 
$email= $_POST['Email']; 
$message=$_POST['Message'];

$sql="INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";
if (mysqli_query($conn, $sql)) {
  echo '<script>alert("Your Message has been send!!")</script>';
} 
}
?>
<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Follow us:abc._def</p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>



