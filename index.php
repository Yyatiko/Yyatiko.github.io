<!DOCTYPE html>
<html>
   <?php include("head.php"); ?>
   <head>
           <title>Accueil</title>
   </head>
   <body class="fond2" >
      <div id="bloc_page">
         <header >


         </header>
         <?php include("nav0.php"); ?>
         <section>
                         <p style="text-align:center"><img class="picture" src="images/neuron2.jpg" width="570" /></p>

            <!--<p class="justi">
               "We look directly into our suffering rather than try to become happy. The happiness that arises from this approach is reliable."
               <br/> 
            <div class="right"> Ajahn Sumedho </div>
            
            </p>-->

            <h1 style="text-align:center"> Fractal Dhamma </h1>
            <p class="justi">
            Nous vivons dans un monde fractal.
            Ce site est une représentation de l'expérience de vie et de la création de son réseau de connaissance. 
            Chaque page est un réseau de "neurones" et chaque lien un neurone pointant vers un différent réseau.
            <br/>
            <br/>
            Une page de ce site, un neurone, peut être vu comme un réseau de sous-neurone compet qui forme une connaissance scépcigfique.
            En effet, un neurone est une capsule unité d'information. 
            Influx nerveux similaire à un bit dans un ordinatieur. 
            Bit de conscience phénomènologique.
            Dans notre expericance de vie, elle représente  
            <br/>
            <br/>
            PASSAGE FRACTAL DANIEL INGRAM
            
            <br/>
            <br/> 
            
            ESPACE COHERENT DE PENSÉE CLOT PAR OPÉRATION DE PENSÉ (SYSTÈME DE COROYANCE) VOIR IDRISS ABERKANNE
            
            <br/>
            <br/>
            
            <a href="matrix.php">The Matrix</a>
            </p>
            
          </section>
                   <?php include("nav.php"); ?>
                   
                   <?php
                        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                        $txt = "John \n";
                        fwrite($myfile, $txt);
                        $txt = "Jane \n";
                        fwrite($myfile, $txt);
                        fclose($myfile);    
                    ?>
      </div>
   </body>
</html>