<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Star Wars</title>
    </head>
    <body>
        <?php
        $url = "https://swapi.dev/api/people/?page=2";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        foreach ($resultado->results as $ator){
            echo("Nome:". $ator->name . "<br>");
            echo("Altura:". $ator->height . " cm<br>");
            echo("Filme em que aparece:<br>");
            foreach ($ator->films as $filme){
                $ch_filme = curl_init($filme);
                curl_setopt($ch_filme, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch_filme, CURLOPT_SSL_VERIFYPEER, false);
                $resultado_filmes = json_decode(curl_exec($ch_filme));
                echo $resultado_filmes->title;
                echo "<br>";
            }
            echo"<hr>";
        }
        ?>

    </body>
</html>
