<table class="transaction">
    <thead class="transc-head">
        <tr>
            <td>ACCOUNT</td>
            <td>BANK</td>
            <td>CATEGORY</td>
            <td>DATE</td>
            <td>AMOUNT</td>
            <td></td>
        </tr>
    </thead>
    <tbody>

    <?php
    
    include("dbconn.php");

    $userid = $_SESSION['sess_uid'];
    
    $gettrans = "SELECT a.*, b.bank_name FROM transactions a INNER JOIN linked_accounts b ON a.acc_num = b.acc_num AND a.u_ID = $userid order by transaction_ID desc";
    $result = $conn->query($gettrans);
    //$user = $result -> fetch_assoc();
    

    if ($result->num_rows > 0) {

        while($usertrans = $result -> fetch_assoc()){
            
          //  echo " accountid: ". $useracc["account_id"] . "<br>";
          //  echo " bankname: ". $useracc["bank_name"] . "<br>";
          //  echo " acc num: ". $useracc["acc_num"] . "<br><br>";
    ?>



        <tr class="data-row">
            <td class="td-desc"><?php echo $usertrans['acc_num'] ?></td>
            <td class="td-desc"><?php echo $usertrans['bank_name'] ?></td>
            <td class="td-highlight"><?php echo $usertrans['type'] ?></td>
            <td class="td-desc">
                <?php 
                    $tdat = date_create($usertrans['date'])->format('F d, Y');
                    echo $tdat;
                ?>
            </td>
            <td class="td-highlight" align="right">
                PHP <?php echo number_format($usertrans["amount"],2); ?>
            </td>

            <td class="transc-delete">
                <form action="transactions-delete.php" method="post">
                    <input type="hidden" name="transaction_id" value="<?php echo $usertrans['transaction_ID'] ?>">
                    <input type="hidden" name="pagefrom" value="<?php echo basename($_SERVER["REQUEST_URI"], ".php") ?>"><br>
                    <input class="delete-button" type="submit" name="delete" value="delete">
                </form>
            </td>     
        </tr>                                   

    <?php

        }
    } else {
        

        $currentPage = basename($_SERVER["REQUEST_URI"], ".php");

    ?>

        <tr class="data-row">
            <td class="td-desc">-na-</td>
            <td class="td-desc">-na-</td>
            <td class="td-highlight">-na-</td>
            <td class="td-desc">-na-</td>
            <td class="td-highlight">-na-</td>

            <td class="transc-delete">
                
            </td>     
        </tr> 
        <tr  style="background-color: #ffffff">
            <td colspan="6">No transactions have been recorded yet. You may start adding transactions 
            <?php if ($currentPage!="transactions"){echo "<a href='transactions.php'>here</a>";}; ?>.
            </td>
        </tr>  


    <?php
        }
        $conn->close();
    ?>







    </tbody>
</table>