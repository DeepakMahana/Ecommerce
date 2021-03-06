<!doctype html>

<?php
session_start();

include("C:/wamp/www/BookBerry/functions/functions.php");
include("includes/db.php");
?>

<html>   
    
<head>
    <meta charset="UTF-8">
    <title>BookBerry || Buy And Sell Books Online</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
  </head>
    
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 0.1px 20px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 20px 20px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
    
#searchbox
{
    background-color: #eaf8fc;
    background-image: linear-gradient(#fff, #d4e8ec);
    border-radius: 35px;    
    border-width: 1px;
    border-style: solid;
    border-color: #c4d9df #a4c3ca #83afb7;            
    width: 500px;
    height: 35px;
    padding: 5px;
    margin: 15px 400px auto;
    overflow: hidden; /* Clear floats */
}  
    
#search, 
#submit {
    float: left;
}

#search {
    padding: 5px 9px;
    height: 23px;
    width: 380px;
    border: 1px solid #a4c3ca;
    font: normal 13px 'trebuchet MS', arial, helvetica;
    background: #f1f1f1;
    border-radius: 50px 3px 3px 50px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);            
}

/* ----------------------- */

#submit
{       
    background-color: #6cbb6b;
    background-image: linear-gradient(#95d788, #6cbb6b);
    border-radius: 3px 50px 50px 3px;    
    border-width: 1px;
    border-style: solid;
    border-color: #7eba7c #578e57 #447d43;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 
                0 1px 0 rgba(255, 255, 255, 0.3) inset;
    height: 35px;
    margin: 0 0 0 10px;
    padding: 0;
    width: 90px;
    cursor: pointer;
    font: bold 14px Arial, Helvetica;
    color: #23441e;    
    text-shadow: 0 1px 0 rgba(255,255,255,0.5);
}

#submit:hover {       
    background-color: #95d788;
    background-image: linear-gradient(#6cbb6b, #95d788);
}   

#submit:active {       
    background: #95d788;
    outline: none;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;        
}

#submit::-moz-focus-inner {
       border: 0;  /* Small centering fix for Firefox */
}

#search::-webkit-input-placeholder {
   color: #9c9c9c;
   font-style: italic;
}

#search:-moz-placeholder {
   color: #9c9c9c;
   font-style: italic;
}  

#search:-ms-placeholder {
   color: #9c9c9c;
   font-style: italic;
} 
    
    
#cart
{           
    width: 50px;
    height: 40px;
    padding: 1px;
    margin: 5px 60px 0px;
    overflow: hidden; /* Clear floats */
}  
    
#shopping_cart{
        width: 100%;
        height: 50px;
        background: white;
        float:inherit;
    }
    
   
</style>    

<body>    
    
<header>
  
<a href="index.php"><img src="images/BookBerry_logo_trasp.png" align=left width="300px" height="60px" alt="Home"></a>
<a href="http://www.rait.ac.in"><img id="dylogo" src="images/dy.png" align=right width="180px" height="60px" alt="College logo"></a>   
    
<form id="searchbox" action="results.php" enctype="multipart/form-data" method="get">
    <input id="search" type="text" placeholder="Enter Book Name or Author Name" name="user_query">
    <input id="submit" type="submit" value="Search" name="search">
</form>      
    
</header>    
&nbsp;<br>    
        

<ul>
<li class="dropdowm">
<a href="index.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>HOME</strong></h2></a>
</li>
    
    
  <li class="dropdown">
      <a class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>CATEGORIES</strong></h2></a>
    <div class="dropdown-content">
      <?php getCats(); ?>
    </div>
  </li>
    
     <li class="dropdown">
    <a href="read.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>E-BOOKS</strong></h2></a>
  </li>    
    
    <li class="dropdown">
    <a href="Exam.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>EXAMS</strong></h2></a>
    </li>
    
    <li class="dropdown">
      <a href="customer/my_account.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>MY ACCOUNT</strong></h2></a>
    <div class="dropdown-content">
    </div>
  </li>
    
    <li class="dropdown">
    <a href="customer_register.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>REGISTER</strong></h2></a>
    </li>   
    
    <li class="dropdown">
    <a href="../BookBerry/admin_area/index.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>ADMIN</strong></h2></a>
    </li>   
    
 </ul> 

<?php cart(); ?> 
<div id="shopping_cart">
<span style="float:right; font-size:25px; padding:0px; line-height:60px;">
<?php
if(isset($_SESSION['customer_email'])){
    echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "&nbsp;";
}
    else
    {
        echo"<b>Welcome Guest:</b>";
    }
    
    ?>
     Total Items: <?php total_items() ?> -- Total Price : Rs. <?php total_price() ?>
<a href="cart.php"><img src="images/shopping-cart-md.png" height="40px" width="50px"></a>
    
<?php
if(!isset($_SESSION['customer_email'])){
    
    echo "<a href='checkout.php' style='text-decoration:none; color:Red;'><b>Login</b></a>";
}  
    else {
        echo"<a href='logout.php' style='text-decoration:none; color:Green;'><b>Logout</b></a>";
    }
?>    
    
</span>    
</div>    

<main>   
    
    <style>
        #aboutus{
            font-family: sans-serif;
            font-size: 20px;
            margin-left: 50px;
            margin-right: 50px;   
        }
    
    
    </style>    
<div id="aboutus">

<h1>About Us</h1><br>
<p>    
    At <b><u>BookBerry</u></b>, our vision is to be Earth's most customer centric company; to build a place where people can come to find and discover virtually any Book they want to buy online. With BookBerry.in, we endeavor to build that same destination in India by giving customers more of what they want – vast selection, low prices, fast and reliable delivery, and a trusted and convenient online shopping experience – and provide sellers a world-class e-commerce platform. We are committed to ensure 100% Purchase Protection for your shopping done on BookBerry.in so that you can benefit from a safe and secure online ordering experience, convenient payment options such as cash on delivery, easy returns and enjoy a completely hassle free online shopping experience. </p><br>


    <p>We launched with Books and our offerings include the Kindle family of E-Readers. Customers can now buy Books of popular Authors across categories such as <u>Engineering, Literature, Civil Services, Medical,</u> etc at BookBerry.in. Don’t forget to check out the BookBerry Exclusives and also, shop for Today's Deals on BookBerry and save big every day. On BookBerry, shopping is not only about buying, it's also about gifting and through Gift a Smile you can give products online to charity through verified NGOs.</p> <br>
 


    <p>It is still “Day 1” and we continue to relentlessly focus on using our investments in technology and innovation to transform the lives of our customers and all our partners. We strive to transform the way India shops and the way India sells.</p><br>
       
    </div>
    <hr>
    <hr>
    
    <h1 align="center"><u>Founders of BookBerry</u></h1><br><br>
 
    <style>
        
        #founders{
            margin-left: 230px;
            clear: both;
        }
    
    </style> 
    
<div id="founders">   
<div class="Deepak" style="float:left; display:inline-block; ">
        <span style="float:left;width: 20%;">
            <img src="images/1.jpg"  
             width="200" height="200" />
        </span>
        <span style="float:right;width: 60%;">
           <pre><h3><p style="float:right; display:block;">
            Name        :-      Deepak Mahana<br>
            Roll No     :-      14CE7506<br>
            Batch       :-      TE-C1/12<br>
            Worked With :-      HTML, CSS, PHP, MySql, Paypal, PHPMailer, Cart.<br>
            Email       :-      mahana.deepak20@gmail.com<br>
               </p></h3></pre>
        </span>
 </div>   
 </div>    
<br>
<br>    
<div id="founders">     
<div class="Pushkaraj" style="float:left; display:inline-block; ">
        <span style="float:left;width: 20%;">
            <img src="images/2.jpg"  
             width="200" height="200" />
        </span>
        <span style="float:right;width: 60%;">
         <pre><h3><p style="float:right; display:block;">
            Name        :-      Pushkaraj Joshi<br>
            Roll No     :-      14CE7504<br>
            Batch       :-      TE-C1/9<br>
            Worked With :-      HTML, CSS, JavaScript, Corousel, Scroller.<br>
            Email       :-      pushkaraj903@gmail.com<br>
            </p></h3></pre>
    </span></div> </div>   
    
<br>
<br>      
<div id="founders">     
<div class="Prajwal" style="float:left; display:inline-block; ">
        <span style="float:left;width: 20%;">
            <img src="images/3.jpg"  
             width="200" height="200" />
        </span>
        <span style="float:right;width: 60%;">
            <pre><h3><p style="float:right; display:block;">
            Name        :-      Prajwal Bharambe<br>
            Roll No     :-      14CE7024<br>
            Batch       :-      TE-C1/1<br>
            Worked With :-      HTML, CSS, Exam Section, Database.<br>
            Email       :-      plystudy@gmail.com<br>
            </p></h3></pre>
    </span></div> </div>       
    
    </main>
    
    <br><br>
    
</body>
    
</html>    