    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="style.css" />
        <link href="lightbox.css" rel="stylesheet" />
        <link href="lumos.css" rel="stylesheet">



          <?php
                        function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {               
                            $offset = strpos($haystack, $needle, $offset);
                            if($offset === false) {
                                return $results;           
                            } else {
                                $results[] = $offset;
                                return strpos_recursive($haystack, $needle, ($offset + 1), $results);
                            }
                        }
                   
                        
            ?>
    </head>