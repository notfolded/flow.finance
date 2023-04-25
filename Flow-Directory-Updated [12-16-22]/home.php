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
    <link rel="stylesheet" href="css/Main-Hero.css"/>
    
    <title>Flow | Home</title>
</head>
<body>

<!--NAVBAR-->  
<?php include 'leftnavbar.php';?>
      
  <!--CONTENT-->
      <main>
      <!--header-->
        <?php include 'header-date-user.php';?>

          <h1 class="head-title">
            Dashboard Overview
          </h1>
<!--MAIN DASHBOARD-->
    <div class="Hero-Main">
        <!--LEFT SIDE-->
            <div class="Left-Hero">    
                <!--BALANCE CARDS-->
                
                <?php include 'balance-cards.php'; ?>



                <!--TRANSACTION HISTORY-->
                <div class="transc-history">
                    <h1 class="head-title">
                        Recent Transactions
                    </h1>

                    <?php include 'transactions-recent.php'; ?>
                    
                </div>
            </div>
   
   <!--RIGHT SIDE -->
           <div class="Right-Hero">
                <!--QUICK ACTIONS-->
                <div class="quick-acc">

                    <h3 class="small-title-black">ADD AN ACCOUNT</h3>
                    <form action="accounts-add.php" method="post">
                        <input class="rounded-form" type="text" name="Acc_num" placeholder="Account Number"><br>
                        <input class="rounded-form" type="text" name="Bank_name" placeholder="Bank Name"><br>
                        <input class="rounded-form" type="hidden" name="pagefrom" value="<?php echo basename($_SERVER["REQUEST_URI"], ".php") ?>"><br>

                        <input class="add-button" type="submit" value="ADD ACCOUNT">
                    </form>

                </div>
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
   
       </div>
      </main>
</body>
</html>