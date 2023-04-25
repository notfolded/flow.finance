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

    <title>Flow | Statistics</title>
</head>
<body>
    <!--NAVBAR-->  
    <?php include 'leftnavbar.php';?>
      
  <!--CONTENT-->
    <main>
      <!--header-->
        <?php include 'header-date-user.php';?>

          <h1 class="head-title">
            Statistics
          </h1>
<!--MAIN DASHBOARD-->
    <div class="Hero-Main">
        <!--LEFT SIDE-->
            <div class="Left-Hero" style = "display:none">    
                <!--BALANCE CARDS-->
                
                <!-- <div class="balance-container">
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
                    </div> 
                </div>   -->
             
             
            </div>  

  
        </div>   <!--MAIN HERO END-->
        
        <div class="row">

            <div class="column-hero">

              <div class="card">
                    <?php include 'balance-cards.php'; ?>
              </div>
              
            </div>
          
            <div class="column-hero2">
              <div class="card">
                <div class="balance-myPieChart">
                    <div>
                        <h4 class="balance">
                           EXPENSE
                           STRUCTURE
                        </h4>
                        <span class="Must"></span> Must
                        <br>
                        <span class="Needs"></span> Needs
                        <br>
                        <span class="Wants"></span> Wants
                    </div>
                    <div style="height: 200px;">
                    <canvas id="myPieChart"></canvas>
                    </div>
                </div> 
              </div>
            </div>

            <div class="column-hero">
                <div class="card">
                    <h1 class="head-title">
                        BALANCE TREND
                    </h1>
                  <div class="balance-containers">
                      <canvas id="myAreaChart"></canvas>
                  </div> 
                </div>
            </div>

            <div class="column-hero2">
                <div class="card">
                  <div class="balance-myBarChart">
                    <h4 style="text-align: center;">
                        <br>
                        CASH FLOW OVERVIEW
                     </h4>
                     <div style="height: 250px;">
                      <canvas id="myBarChart"></canvas>
                     </div>
                  </div> 
                </div>
            </div>
           
        </div>
    </main>    
    
    <style>
.Must {
  height: 8px;
  width: 30px;
  background-color: #988686;
  border-radius: 25px;
  display: inline-block;
}
.Needs {
  height: 8px;
  width: 30px;
  background-color: #964b00;
  border-radius: 25px;
  display: inline-block;
}
.Wants {
  height: 8px;
  width: 30px;
  background-color: #D1D0D0;
  border-radius: 25px;
  display: inline-block;
}
        /* Float four columns side by side */
.column-hero {
  float: left;
  width: 65%;
  padding: 10px 10px ;
 
}
.column-hero2 {
  float: right;
  width: 30%;
  padding: 15px 10px;
}
/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive columns */
@media screen and (max-width: 600px) {
  .column-hero2 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
  .column-hero{
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.balance-containers{
    background-color: rgb(255, 255, 255);
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    border-radius: 15px;
    height: 300px;
    filter: drop-shadow(0px -29px 30px rgba(123, 97, 255, 0.1));
    box-shadow: 1px 1px 10px 10px #DCDCDC;
}
.balance-myPieChart{
    background-color: rgb(255, 255, 255);
    display: flex;
    border-radius: 15px;
    height: 200px;
    padding: 10px;
    filter: drop-shadow(0px -29px 30px rgba(123, 97, 255, 0.1));
    box-shadow: 1px 1px 10px 10px #DCDCDC;
}
.balance-myBarChart{
    background-color: rgb(255, 255, 255);
    border-radius: 15px;
    height: 300px;
    filter: drop-shadow(0px -29px 30px rgba(123, 97, 255, 0.1));
    box-shadow: 1px 1px 10px 10px #DCDCDC;
}
    </style>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
</body>
</html>