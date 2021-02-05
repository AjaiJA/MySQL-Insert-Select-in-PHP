<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="form-section">
            <?php
                $funame;
                $mail;
                $ph;
                (isset($_GET['fullName'])) ? $funame=$_GET['fullName'] : $funame="";
                (isset($_GET['email'])) ? $mail=$_GET['email'] : $mail="";
                (isset($_GET['phone'])) ? $ph=$_GET['phone'] : $ph="";
            ?>
            <form action="./view.php" method="POST">
                <h2>Contact Us</h2>
                <div class="full-name">
                    <label for="full-name">FULL NAME</label><br/>
                    <input type="text" placeholder="Enter Your Name" name="fullname" value="<?php echo $funame; ?>" id="full-name"/>
                </div>
                <div class="email-phone">
                    <div class="email">
                        <label for="email">EMAIL</label><br/>
                        <input type="text" placeholder="Enter Your Email"  value="<?php echo $mail; ?>" name="mail" id="email"/>    
                    </div>
                    <div class="phone">
                        <label for="phone">PHONE</label><br/>
                        <input type="text" placeholder="Enter Number Phone"  value="<?php echo $ph; ?>" name="phone" id="phone"/>    
                    </div>
                </div>
                <div class="budget">
                    <label for="cost">BUDGET</label><br />
                    <label for="budget-value">$<span class="from">1500</span> - $<span class="to">2000</span></label><br />
                    <div class="range-multi">
                        <input type="range" oninput="slideRange(this)" value="2000" name="budget-cost" id="budget-value" min="1500" max="3900" />
                    </div>
                </div>
                <div class="message">
                    <label for="msg">MESSAGE</label><br />
                    <textarea name="message-content" id="msg" placeholder="Your message here..." rows="3"></textarea>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="register">Submit <span>&#10230;</span></button>
                </div>
                <?php
                    $msg="<p class='get-message error'>";
                    if(isset($_GET['error'])){
                        $err=$_GET['error'];
                        if($err=="emptyField"){
                            echo $msg."Fields are Empty"."</p>";
                        }else if($err=="phone"){
                            echo $msg."Enter valid Phone Number"."</p>";
                        }else if($err=="email"){
                            echo $msg."Enter valid Email"."</p>";
                        }
                    }else{
                        echo $msg.""."</p>";
                    }
                ?>
            </form>
        </div>
    </div>
    <script src="./main.js"></script>
</body>
</html>