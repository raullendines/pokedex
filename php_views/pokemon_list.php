<?php

include dirname(__FILE__) . '/../php_libraries/bd.php';

if (isset($_SESSION["pokemon"])) {
    $pokemon = $_SESSION["pokemon"];
    unset($_SESSION["pokemon"]);
}

$pokedex = selectAllPokemons();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="../style/pokemon_list.css">

    <title>Pokedex</title>
</head>

<body>
    <?php

    include dirname(__FILE__) . '/../php_partials/menu.php';

    include dirname(__FILE__) . '/../php_partials/mensajes.php';

    ?>

    <div class="container-fluid mt-3">
        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 g-3">
            <?php
            if ($pokedex == null) {
                $pokedex = [];
            }
            foreach ($pokedex as $pokemon) {
                echo '
            <!--Bulbasur-->
            <div class="col d-flex align-items-stretch">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" ' . $pokemon['imagen'] . '" alt=" ' . $pokemon['nombre'] . ' ">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight:bold;"> ' . $pokemon['numero'] . ' - ' . $pokemon['nombre'] . ' </h5>
                        <div class="row">
                            <div class="col">
                                <div class="row row-cols-md-2 row-cols-lg-2"> 
                                ';

                $tipos = selectTipo($pokemon['id']);
                foreach ($tipos as $tipo) {
                    echo '<div class="col"><span class="badge bg-warning text-dark">' . $tipo['nombre'] . '</span></div>';
                }

                echo '</div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                    <div class="card-footer d-grid gap-2 d-flex justify-content-end">
                    <form action="/pokedex/php_controllers/pokemonController.php" method="post">
                        <input type="hidden" name="valorPokemon" value= ' . $pokemon['id'] . '>
                        <button type="submit" class="btn btn-outline-danger" name="borrar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    
                    <form action="/pokedex/php_controllers/pokemonController.php" method="post">
                        <input type="hidden" name="valorPokemon" value= ' . $pokemon['id'] . '>
                        <button type="submit" name="editar" class="btn btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </button>
                    </form>
                        
                    </div>
                </div>
            </div>
            <!--Bulbasur-->
            ';
            }
            ?>
        </div>

        <!--Boton-->
        <a href="/pokedex/php_views/pokemon.php" class="btn rounded-circle btn-warning" style="position:fixed; right:10px; bottom:10px; z-index:100;">
            <i class="fas fa-plus"></i>
        </a>
        <!--Boton-->

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!--JS fontawesome-->
        <script src="https://kit.fontawesome.com/1ac3ed1571.js" crossorigin="anonymous"></script>
</body>

</html>