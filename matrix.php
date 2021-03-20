<!DOCTYPE html>
<html>
   <?php include ("head.php"); ?>
   <head>
           <title> Matrix </title>
   </head>

   <body class="fond2" >
      <div id="bloc_page">
         <header >

            <?php include ("network.html"); ?>

         </header>
         <?php include ("nav0.php"); ?>
         <section>

            <h1 style="text-align:center"> Matrix </h1>
            <p class="justi">
            Cette page regroupe toutes les connexions qui se font entre les différents éléments du site web.
            Chaque chargement de cette page crée deux fichier php : <a href='navChildren.php'>navChildren.php</a> et <a href='navParent.php'>navParent.php</a>. Ces deux fichiers représentent les arbres de connexions entre les pages. Ces dernières les utilient pour créer leur menu de navigation. Après avoir créer une nouvelle page, il convient alors de recharger la page matrix pour actualiser la matrice de connection et les deux fichiers php.
            <br/>
            <br/>
            
      
             </p>

             <p>
                 <h1>Children</h1>
                 <br/>

       
                <?php
                
 //////////////////////////////////////CHILDREN//////////////////////////////////////////////////////
                $id=1;
                $myfile = fopen("navChildren.php", "w") or die("Unable to open file!");
                $mycsv = fopen("matrix.csv", "w") or die("Unable to open file!");
                $mynodes = fopen("nodes.csv", "w") or die("Unable to open file!");
                
                fwrite($myfile,  '<?php ' ) ;

                include ("exclude.php");
                
                $vfiles = scandir(getcwd());
                $k = 0;
                $vmatches3 = array();
                
                $list = glob("*.php");
                natsort($list);
                
                fwrite($myfile,  '$navChildren=array(' ) ;

                
                foreach ($list as $vfile)
                //foreach ($vfiles as $vfile)
                {
                    if (in_array($vfile, $exclude))
                    {
                        continue;
                    }
                
                    $string = file_get_contents($vfile);
                    $search = "<a";
                    $search2 = "a>";
                    $found = strpos_recursive($string, $search);
                    $found2 = strpos_recursive($string, $search2);
                    $matches = array();
                    $matches2 = array();
                    $matches3 = array();
                    $matches3csv = array();
                    $i = 0;
                    $j = 0;
                
                    $pager = file_get_contents($vfile);
                
                    $searcht = "<title>";
                    $searcht2 = "</title>";
                    $foundt = strpos($pager, $searcht);
                    $foundt2 = strpos($pager, $searcht2);
                    $text2 = substr($pager, intval($foundt) + 7, intVal($foundt2) - intVal($foundt) - 7);
                    $textcsv=$text2;
                    
                    //$vfile = str_replace(".php", "", $vfile);

                    echo '<a href="' . $vfile . '">' . $text2 . '</a>';
                    fwrite($myfile,  "'".$vfile."'=>'" ) ;
                    fwrite($mynodes,  '"'.$text2.'","'.$text2.'"' ) ;
                    //fwrite($mynodes,  ''.$id.',"'.$text2.'"' ) ;
                    fwrite($mynodes,  "\n" ) ;

                    //fwrite($mynodes,  "".$id.",".$text2."\n" ) ;
                   // $id++;

                    //echo ' (' . $vfile . ')';
                    //fwrite($myfile,  ' (' . $vfile . ')' ) ;

                    echo '<br/>';
                    //fwrite($myfile,  '<br/>' ) ;
                    
                    //fwrite($myfile, "\n");

                
                    if ($found)
                    {
                        foreach ($found as $pos)
                        {
                            $matches[$i] = $pos;
                            $i++;
                
                        }
                        foreach ($found2 as $pos)
                        {
                            $matches2[$j] = $pos;
                            $j++;
                        }
                    }
                
                    for ($i = 0;$i < sizeOf($matches);$i++)
                    {
                        $link = substr($string, $matches[$i], intVal($matches2[$i]) - intVal($matches[$i]) + 2);
                
                        $searcht = '"';
                        $searcht2 = 'php"';
                        $foundt = strpos($link, $searcht);
                        $foundt2 = strpos($link, $searcht2);
                        
                        if (strpos($link, $searcht2) == false){
                            continue;
                        }
                
                        $text = substr($link, intval($foundt) + 1, intVal($foundt2) - intVal($foundt) + 2);
                
                        $page = file_get_contents($text);
                
                        $searcht = "<title>";
                        $searcht2 = "</title>";
                        $foundt = strpos($page, $searcht);
                        $foundt2 = strpos($page, $searcht2);
                        $text2 = substr($page, intval($foundt) + 7, intVal($foundt2) - intVal($foundt) - 7);

                        $matches3[$i] = '<a href="' . $text . '">' . $text2 . '</a>';
                        $matches3csv[$i] = $text2;
                    }
                
                    $count = array_count_values($matches3);
                    $countcsv = array_count_values($matches3csv);
                
                    arsort($count);
                    arsort($countcsv);
                    file_put_contents('filename.txt', print_r($count, true));
                    file_put_contents('filename.txt', print_r($countcsv, true));

                   
                    if(count($count)==0) fwrite($myfile,  "'");
                    foreach ($count as $x => $x_value)
                    {
                        echo '-> ';
                        //fwrite($myfile, "'" ) ;

                        echo ($x);
                        fwrite($myfile,  ($x) ) ;
                        //fwrite($mycsv,  ''.$textcsv.','.$x.',') ;

                        echo '<br/>';
                        fwrite($myfile, "\n");


                        end($count);
                        if ($x !== key($count)) fwrite($myfile,  '<br/><br/>' ) ;
                        if ($x === key($count)) fwrite($myfile,  "'" ) ;

                        
                        //fwrite($myfile, "\n");
                    }
                    
                    //if(count($countcsv)==0) fwrite($mycsv,  "     &    ");
                    foreach ($countcsv as $xk => $xk_value)
                    {
                        fwrite($mycsv,  '"'.$textcsv.'","'.$xk.'"');
                        fwrite($mycsv,  "\n");

                        //fwrite($mycsv,  "".$textcsv.",".$xk.",1\n");

                    }
                
                
                    echo '<br/>';
                    fwrite($myfile,  ',' ) ;
                    fwrite($myfile, "\n");
                    fwrite($myfile, "\n");


                }
                
               // $stat = fstat($mycsv);
               // ftruncate($mycsv, $stat['size']-1);
 
                fwrite($myfile,  ') ?>' ) ;

                fclose($mycsv);
                fclose($mynodes);
                fclose($myfile);









/////////////////////////////////////////PARENT///////////////////////////////////////////



                echo '<h1>Parent</h1> <br/>';
                
                $myfile = fopen("navParent.php", "w") or die("Unable to open file!");
                fwrite($myfile,  '<?php ' ) ;
                $kvfiles = scandir(getcwd());
                $kk = 0;
                $kvmatches3 = array();
                
                $klist = glob("*.php");
                natsort($klist);
                
                fwrite($myfile,  '$navParent=array(' ) ;

                                foreach ($klist as $kvfile)
                //foreach ($vfiles as $vfile)
                
                {
                    if (in_array($kvfile, $exclude))
                    {
                        continue;
                    }
                
                    $vfiles = scandir(getcwd());
                    $k = 0;
                    $vmatches3 = array();
                    
                    foreach (glob("*.php") as $vfile)
                    //foreach ($vfiles as $vfile)
                    {
                        if (in_array($vfile, $exclude))
                        {
                            continue;
                        }   
                    
                        $vstring = file_get_contents($vfile);
                        $vsearch = "<a";
                        $vsearch2 = "a>";
                        $vfound = strpos_recursive($vstring, $vsearch);
                        $vfound2 = strpos_recursive($vstring, $vsearch2);
                        $vmatches = array();
                        $vmatches2 = array();
            
                        $i = 0;
                        $j = 0;
                    
                        if ($vfound)
                        {
                            foreach ($vfound as $vpos)
                            {
                    
                                $vmatches[$i] = $vpos;
                                $i++;
                    
                            }
                            foreach ($vfound2 as $vpos)
                            {
                    
                                $vmatches2[$j] = $vpos;
                                $j++;
                            }
                        }
                        
            
                    
                        for ($i = 0;$i < sizeOf($vmatches);$i++)
                        {
                    
                            if (strpos(substr($vstring, $vmatches[$i], intVal($vmatches2[$i]) - intVal($vmatches[$i]) + 2) , $kvfile) !== false)
                            {
                                
                    
                                $vsearcht = "<title>";
                                $vsearcht2 = "</title>";
                                $vfoundt = strpos($vstring, $vsearcht);
                                $vfoundt2 = strpos($vstring, $vsearcht2);
            
                                $vtext = substr($vstring, intval($vfoundt) + 7, intVal($vfoundt2) - intVal($vfoundt) - 7);
                    
                                $vmatches3[$k] = '<a href="' . $vfile . '">' . $vtext . '</a>';
                                
            
                                $k++;
                            }
                        }
                    }
                    
            
                    $vcount = array_count_values($vmatches3);
            
                    arsort($vcount); 
                    
                    fwrite($myfile, "\n");

                    echo $kvfile;

                    fwrite($myfile,  "'".$kvfile."'=>'" ) ;

                    echo '<br/>';

                    fwrite($myfile, "\n");

            
                    foreach($vcount as $vx => $vx_value) {
                            echo '<- ';
                            //fwrite($myfile, '<- ' ) ;

                            echo $vx;
                            fwrite($myfile,  ($vx) ) ;

                            echo '<br/>';
                            fwrite($myfile, "\n");


                            end($vcount);
                            if ($vx !== key($vcount)) fwrite($myfile,  '<br/><br/>' ) ;
                            //if ($vx === key($vcount)) fwrite($myfile,  "'" ) ;
                    }
                    
                    echo '<br/>';
                    fwrite($myfile,  "'," ) ;
                    fwrite($myfile, "\n");
                    fwrite($myfile, "\n");


                }
                
                fwrite($myfile,  ') ?>' ) ;

                fclose($myfile);

                ?>
                </p>
            </section>
            <!-- <?php include ("nav.php"); ?> -->
      </div>
   </body>
</html>
