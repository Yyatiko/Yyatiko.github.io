<nav>
      
     <p  style = "text-align: right;">
       
        <?php
        
        
        $name = basename($_SERVER['PHP_SELF']);
        include("navParent.php");
        if (isset($navParent[$name])) echo $navParent[$name];
        
     
        
        ?>
    </p>
</nav>
