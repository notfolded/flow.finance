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
            <h1 class="head-title title-highlight">My Account</h1>
            <table class="profile-table">


                <?php 
                    include('dbconn.php');
                    $userid = $_SESSION['sess_uid'];
                    // GET USER INFORMATION
                    $resultGetUser = $conn->query("SELECT * FROM user_info WHERE u_id = $userid");
                    $tu = $resultGetUser -> fetch_assoc();
                    //$currbalance = $tu["balance"];
                ?>
                <tr class="profile-tr">
                    <td class="profile-tr bold">REGISTERED NAME</td>
                    <td class="bold">EMAIL ADDRESS</td>
                </tr>
                <tr>
                    <td class="light"><?php echo $tu["first_name"] ." ". $tu["last_name"];?></td>
                    <td class="light"><?php echo $tu["email"];?></td>
                </tr>
                <tr>
                    <td class="bold">BIRTHDAY</td>
                    <td class="bold">CONTACT NUMBER</td>
                </tr>
                <tr>
                    <td class="light">
                        <?php 
                         $bdat = date_create($tu["birthdate"])->format('F d, Y');
                         echo $bdat;
                        ?>
                    </td>
                    <td class="light"><?php echo $tu["contact_num"];?></td>
                </tr>
                
                <?php
                  
                    $getubanks = "SELECT acc_num, bank_name FROM linked_accounts WHERE u_id = $userid";
                    $ubanks = $conn->query($getubanks);
                    
                    if ($ubanks->num_rows > 0) {
                        while($thisbank = $ubanks -> fetch_assoc()){
                ?>
                    <!--loop depending on how many accounts-->
                    <tr>
                        <td class="bold">ACCOUNT NUMBER</td>
                        <td class="bold">BANK NAME</td>
                    </tr>
                    <tr>
                        <td class="light"><?php echo $thisbank["acc_num"];?></td>
                        <td class="light"><?php echo $thisbank["bank_name"];?></td>
                    </tr>

                <?php

                        }
                    
                    } else {



                    }
                ?>    
                





                <tr>
                    <td>
                        <form>
                            <button formaction="accounts-edit.php" class="add-button" value="EDIT">EDIT</button>
                        </form>
                      
                    </td>
                    <td>
                        <form action="log-out.php">
                            <input class="add-button outlined"type="submit" value="LOGOUT">
                        </form>
                    </td>
                </tr>

                <?php
                    $conn->close();
                ?>

            </table>
        </div>
        <div class="quick-acc">
            <h3 class="small-title-black">Add a Bank Account</h3>

            <form action="accounts-add.php" method="post">
                <input class="rounded-form" type="text" name="Acc_num" placeholder="Account Number"><br>
                <input class="rounded-form" type="text" name="Bank_name" placeholder="Bank Name"><br>
                <input class="rounded-form" type="hidden" name="pagefrom" value="<?php echo basename($_SERVER["REQUEST_URI"], ".php") ?>"><br>
                <input class="add-button save" type="submit" value="ADD ACCOUNT">
            </form>
            <div>
                    <?php
                        if (isset($_GET['accadd'])) {
                            if ($_GET['accadd']==1){
                                echo "Account successully added.";

                            }else{
                                echo "Failed to add the account.";
                            }
                        }
                    ?>
            </div>

        </div>
</body>
</html>