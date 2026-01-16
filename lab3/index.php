<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>67</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <form action="" method="get">
            <input type="text" name="love_mom_Egora" class="input-field" placeholder="Введите текст...">
            <button type="submit" class="submit-btn">пусь</button>
        </form>

        <?php
        if (isset($_GET['love_mom_Egora']) && $_GET['love_mom_Egora'] !== ''){
            $ultra_zhirniy = explode (' ', $_GET['love_mom_Egora']);
            upFunc($ultra_zhirniy);
            echo '<div class="result">' . implode (' ', $ultra_zhirniy) . '</div>';
        }

        function upFunc (&$ultra_zhirniy){
            for ($anti_zhir = 0; $anti_zhir < count($ultra_zhirniy); $anti_zhir++){
                if(($anti_zhir % 2) > 0){
                    $ultra_zhirniy [$anti_zhir] = strtoupper ($ultra_zhirniy[$anti_zhir]);
                }
            }
        }
      