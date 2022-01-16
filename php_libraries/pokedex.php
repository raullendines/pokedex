<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
    
<?php 
    
   function crearPokemon($numero, $nombre, $region, $tipo, $altura, $peso, $evolucion, $imagen)
   {
       $pokemon = array(
           "numero" => $numero,
           "nombre" => $nombre,
           "region" => $region,
           "tipo" => $tipo,
           "altura" => $altura,
           "peso" => $peso,
           "evolucion" => $evolucion,
           "imagen" => $imagen
       );

       return $pokemon;
   }

    function mostrarPokemon($pokemon)
    {
        echo "Numero del pokemon: " . $pokemon["numero"] . "<br>";
        echo "Nombre del pokemon: " . $pokemon["nombre"] . "<br>";
        echo "Region del pokemon: " . $pokemon["region"] . "<br>";
        echo "Tipo de pokemon: " . $pokemon["tipo"] . "<br>";
        echo "Altura del pokemon: " . $pokemon["altura"] . "<br>";
        echo "Peso del pokemon: " . $pokemon["peso"] . "<br>";
        echo "Evolucion del pokemon: " . $pokemon["evolucion"] . "<br>";
        echo "Imagen del pokemon: " . $pokemon["imagen"] . "<br>";
        echo "<br>";
    }

    function buscarPokemon($numberPokemon, $pokedex){
        $i=0;
        $encontrado = false;
        $posicionPokemon = -1;

        
        while ($i < count($pokedex) && !$encontrado) {
            if ($pokedex [$i]['numero'] == $numberPokemon) {
                $posicionPokemon = $i;
                $encontrado = true;
            } 
            $i++;
        }
            return $posicionPokemon;
    }

    function addPokemon(&$pokedex, $pokemon){
        if (buscarPokemon($pokemon['numero'], $pokedex) == -1) {
            array_push($pokedex, $pokemon);
            $_SESSION["correcto"] = "Pokemon añadido correctamente";
        }
        else{
            $_SESSION["error"] = "Error, no se puede añadir el pokemon";
        }
    }

    function mostrarPokedex($pokedex){
        for ($i=0  ; $i < count($pokedex); $i++ ) { 
            mostrarPokemon($pokedex[$i]);
        }
    }

    function delPokemon(&$pokedex, $num){
        $buscarPokemons = buscarPokemon($num, $pokedex);
        if ($buscarPokemons  != -1) {
           array_splice($pokedex, $buscarPokemons, 1);
           $_SESSION["correcto"] = "Pokemon borrado correctamente";
        }
        else {
            $_SESSION["error"] = "Error, no se puede añadir el pokemon";
        }
    }

    function modifyPokemon(&$pokedex, $pokemon){
        $buscarPokemons = buscarPokemon($pokemon['numero'], $pokedex);
            if ($buscarPokemons == -1) {
                $_SESSION["error"] = "Error, no se puede añadir el pokemon";

            }
            else{
                $pokedex = array_replace($pokedex, array($buscarPokemons => $pokemon));
                $_SESSION["correcto"] = "Pokemon borrado correctamente";
            }

    }

?>
</body>
</html>