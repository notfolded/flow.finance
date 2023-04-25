<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="flow-white.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!--STYLESHEET-->
    <link rel="stylesheet" href="css/Nav-Head.css"/>
    <link rel="stylesheet" href="css/profile.css"/>

    <title>Flow | Profile Details</title>
</head>
<body>
     <!--NAVBAR-->  
 <!--NAVBAR-->  
 <?php include 'leftnavbar.php';?>
      
      <!--CONTENT-->
        <main>
          <!--header-->
        <?php include 'header-date-user.php';?>

        <h1 class="head-title">
          Profile Details
        </h1>
        <div class="profile-cont">
            <h1 class="head-title title-highlight">Edit My Account</h1>
            <!--EDIT ACCOUNT--> 

            <form action="accounts-update.php" method="post">

                <?php 
                    include('dbconn.php');
                    $userid = $_SESSION['sess_uid'];
                    // GET USER INFORMATION
                    $resultGetUser = $conn->query("SELECT * FROM user_info WHERE u_id = $userid");
                    $tu = $resultGetUser -> fetch_assoc();
                    //$currbalance = $tu["balance"];
                ?>

                <table class="acc-table">
                    <tr>
                        <td class="acc-head"> first name</td>
                        <td><input type="text" class="input-acc" name="first_name" value="<?php echo $tu["first_name"];?>" required></td>
                    </tr>
                    <tr>
                        <td class="acc-head">last name</td>
                        <td><input type="text" class="input-acc" name="last_name" value="<?php echo $tu["last_name"];?>" required></td>
                    </tr>
                    <tr>
                        <td class="acc-head">birthdate</td>
                        <td><input type=date step=7 min=2004-01-01 class="input-acc" name="birthday" value="<?php echo $tu["birthdate"];?>" required></td>
                    </tr>
                    <tr>
                        <td class="acc-head"> email address</td>
                        <td> <input type="text" placeholder="Loremipsum@dolorsita.met" class="input-acc" name="email" value="<?php echo $tu["email"];?>" required></td>
                    </tr>
                    <tr>
                        <td class="acc-head">phone number</td>
                        <td><input type="text" class="input-acc" name="contact_num" value="<?php echo $tu["contact_num"];?>" required></td>
                    </tr>
                   

                    </table>
    
                    <!--button-->
                    <input type="submit" value="SAVE CHANGES" class="add-button save"> 

                    <?php
                        $conn->close();
                    ?>
    
            </form>
            <div>
                    <?php
                        if (isset($_GET['updat'])) {
                            if ($_GET['updat']==1){
                                echo "Account successully Edited.";

                            }else{
                                echo "Failed to edit the account.";
                            }
                        }
                    ?>
            </div>


        </div>  


        <div class="quick-acc">
            <h3 class="small-title-black">Existing Bank Accounts</h3>
            <table class="transaction">
                <thead class="transc-head">
                    <tr>
                        <td>ACCOUNT NUMBER</td>
                        <td>BANK NAME</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="body-tr">

                <?php
    
                    include("dbconn.php");
                    
                    $userid = $_SESSION['sess_uid'];
                    
                    $getaccounts = "SELECT * FROM linked_accounts WHERE u_id = $userid";
                    $result = $conn->query($getaccounts);
                    //$user = $result -> fetch_assoc();
                    

                    if ($result->num_rows > 0) {

                        while($useracc = $result -> fetch_assoc()){
                            
                        //  echo " accountid: ". $useracc["account_id"] . "<br>";
                        //  echo " bankname: ". $useracc["bank_name"] . "<br>";
                        //  echo " acc num: ". $useracc["acc_num"] . "<br><br>";
                ?>
                
                    
                        <tr class="data-row">
                            <td class="td-desc"><?php echo $useracc["acc_num"]?></td>
                            <td class="td-highlight"><?php echo $useracc["bank_name"]?></td>

                            <td class="transc-delete">
                                <form action="accounts-delete.php" method="post">
                                    <input type="hidden" name="acc2del" value="<?php echo $useracc["account_id"]?>">
                                    <input class="delete-button" type="submit" name="delete" value="delete">
                                </form>
                            </td>     

                        </tr>
                <?php

                         }
                    } else {
                ?>
                        <tr class="data-row">
                            <td class="td-desc">-na-</td>
                            <td class="td-highlight">-na-</td>

                            <td class="transc-delete">
                                
                            </td>     

                        </tr>
                <?php
                    }
                    $conn->close();
                ?>













                </tbody>

            </table>
        </div>
        
        
    
</body>
</html>