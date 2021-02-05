<?php
    if(isset($_POST['register'])){
        $fullName=htmlspecialchars($_POST['fullname']);
        $email=htmlspecialchars($_POST['mail']);
        $phone=htmlspecialchars($_POST['phone']);
        $budgetCost=htmlspecialchars($_POST['budget-cost']);
        $message=htmlspecialchars($_POST['message-content']);
        if(empty($fullName) || empty($email) || empty($phone) || empty($budgetCost)){
            header("Location:index.php?error=emptyField&fullName=".$fullName."&email=".$email."&phone=".$phone."&budgetCost=".$budgetCost);
        }
        else{
            if(!preg_match("/^[A-Za-z]*$/",$fullName)){
                header("Location:index.php?error=nameService");
            }
            else{
                if(!preg_match("/^\d{10}$/",$phone)){
                    header("Location:index.php?error=phone");
                }
                else{
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        header("Location:index.php?error=email");
                    }
                    else{
                        include "./connection.php";
                        $sql1="INSERT INTO details(id,fullname,email,phone,cost,message) VALUES('NOT NULL','$fullName','$email','$phone','$budgetCost','$message');";
                        $query= mysqli_query($conn,$sql1); 
                        if($query==true){
                            echo "Values are accepted and inserted to database";
                            $sql2="SELECT * FROM details";
                            $query1=mysqli_query($conn,$sql2);
                            $count=mysqli_num_rows($query1);
                            if($count>0){
                                ?>
                            <table style="display:table;border-collapse: collapse;">
                            <style>
                                td{
                                    border:1px solid grey;
                                }
                            </style>
                                <thead>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>Email</td>
                                        <td>Phone Number</td>
                                        <td>Cost</td>
                                        <td>Message</td>
                                    </tr>
                                </thead>
                               <tbody>
                                <?php
                                while($row=mysqli_fetch_array($query1)){
                                    echo "<tr>
                                            <td>".$row['fullname']."</td>
                                            <td>".$row['email']."</td>
                                            <td>".$row['phone']."</td>
                                            <td>".$row['Cost']."</td>
                                            <td>".$row['message']."</td>
                                        </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                                <?php
                            }
                        }
                        else{
                            echo "Insertion Failed";
                        }
                    }
                }
            }
        }
    }
?>