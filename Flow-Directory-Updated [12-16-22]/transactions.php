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
    
    <title>Flow | Transactions</title>
</head>
<body>
<!--NAVBAR-->  
<?php include 'leftnavbar.php';?>

<!--CONTENT-->
<main>
    <!--header-->
        <?php include 'header-date-user.php';?>
        

        <h1 class="head-title">
          Transaction History
        </h1>
        <div class="Hero-Main">
            <!--LEFT SIDE-->
                <div class="Left-Hero">    
                    <!--TRANSACTION HISTORY-->
                    <div class="transc-history">

                        <?php include 'transactions-recent.php'; ?>    

                    </div>
                </div>
<!--RIGHT SIDE -->
                <div class="Right-Hero">
                    <!--QUICK ACTIONS-->
                    <div class="quick-acc transc">
                        <h3 class="small-title-black">ADD A TRANSACTION</h3>
                        <form action="transactions-add.php" method="post">


                            <select class="rounded-form" id="bankacct" name="bankacct" ariplaceholder="Category" required>
                                <option value="" disabled selected>Select a bank</option>
                                <?php 
                                    include("dbconn.php");
                                    $userid = $_SESSION['sess_uid'];
                                    $query = "SELECT acc_num, bank_name FROM linked_accounts WHERE u_id = $userid";
                                    $result = $conn->query($query);
                                    if($result->num_rows> 0){
                                        while($optionData=$result->fetch_assoc()){
                                        $option = $optionData['bank_name'];
                                        $id = $optionData['acc_num'];
                                ?>
                                    <option value="<?php echo $id; ?>" ><?php echo $option; ?></option>
                                <?php
                                    }}
                                ?>
                            </select>
                            <input class="rounded-form" type="text" name="Amount" placeholder="Amount"><br>
                            <input class="rounded-form" type="date" id="Date" name="Date" placeholder="2022-12-12">
                            <select class="rounded-form" id="Category"  name="category" ariplaceholder="Category">
                                <option value="" disabled selected>Select Category</option>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                                <option value="housing">Housing</option>
                                <option value="transportation">Transportation</option>
                                <option value="food">Food & Drinks</option>
                                <option value="leisure">Leisure</option>
                            </select>
                            
                            
                            <input class="add-button" type="submit" value="ADD TRANSACTION">
                        </form>
                        <div>
                            <?php
                                if (isset($_GET['transadd'])) {
                                    if ($_GET['transadd']==1){
                                        echo "Transaction successully added.";

                                    }else{
                                        echo "Failed to add the transaction.";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

    
</body>
</html>