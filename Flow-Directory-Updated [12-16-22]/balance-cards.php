
<div class="balance-container">

    

<?php
    
    include('dbconn.php');

    
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
            
            <div class="balance-card">
                <h3 class="bal-title"><?php echo $useracc["bank_name"]; ?></h3>
                <div class="bal-card1">
                
                    <h1 class="balance">
                        PHP <?php echo number_format($useracc["balance"],2); ?>
                    </h1>
                </div>
            </div>

<?php

        }
    } else {
?>
    
    IMPORTANT: You have no bank accounts registered yet. Please add an account.
        

<?php
    }
    $conn->close();
?>






<!-- 

    <div class="balance-card">
        <h3 class="bal-title">current balance</h3>
        <div class="bal-card1">
            <h1 class="balance">
                PHP 99,999.00
            </h1>
        </div>
    </div>

    <div class="balance-card">
        <h3 class="bal-title">current balance</h3>
        <div class="bal-card1">
            <h1 class="balance">
                PHP 99,999.00
            </h1>
        </div>
    </div>                    
    <div class="balance-card">
        <h3 class="bal-title">current balance</h3>
        <div class="bal-card1">
            <h1 class="balance">
                PHP 99,999.00
            </h1>
        </div>
    </div>  -->


    
</div>