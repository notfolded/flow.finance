<div class="header">
    <!--php code for date today-->
    <p class="p-head">
        <!-- December 23, 2022 -->
        <?php
            $today = date_create()->format('F d, Y');
            echo $today;
            // echo basename($_SERVER["REQUEST_URI"], ".php");
        ?>

    </p>
    <span class="Span-Bold">Welcome back,</span>
    <!--php code for FIRST NAME-->
    <span class="Span-Bold highlight"> <?php echo $_SESSION["sess_fname"] ?></span>
    
</div>