
   <nav>

      
     <p  style = "text-align: left;">
        
      <?php
        $name = basename($_SERVER['PHP_SELF']);
        include("navChildren.php");
        if (isset($navChildren[$name])) echo $navChildren[$name];
        
     ?>
     
     
     </p>
</nav>

        <script src="lightbox-plus-jquery.js"></script>
        <script src="lumos.js"></script>



