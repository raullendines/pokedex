<?php

include dirname(__FILE__) . '/../php_libraries/bd.php';

if (isset($_SESSION["pokemon"])) {
    $pokemon = $_SESSION["pokemon"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pokedex</title>
</head>

</head>

<body>
<?php
$pokedex = selectPokemon($pokemon);

    include dirname(__FILE__) . '/../php_partials/mensajes.php';

?>

    <div class="card">
        <div class="card-body ">
            <div class="card-header bg-secondary">
                <a class="navbar-brand text-white align-self-center">
                    <img src="https://imagenpng.com/wp-content/uploads/2016/09/Pokebola-pokeball-png-2.png" alt="Inicio" width="25" height="25" class="d-inline-block align-text-top">
                    Pokemon
                </a>
            </div>
            <p class="card-text">
                <form action="/pokedex/php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">
                    <div class="column">

                        <!--ID-->
                        <input type="hidden" name="idPokemon" value= '<?php if(isset($pokedex)){ echo $pokedex[0]['id']; } ?>' id="idPokemon">
                        <!--ID-->

                        <!--Numero de pokemon-->
                        <div class="form-group row">
                            <label for="numPokemon" class="col-sm-2 col-form-label">Numero del pokemon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="<?php if(isset($pokedex)){ echo $pokedex[0]['numero']; } ?>"  name="numPokemon" placeholder="Numero del pokemon" id="numPokemon" required>
                            </div>
                        </div>
                        <!--Id de pokemon-->

                        <!--Nombre del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label for="namePokemon" class="col-sm-2 col-form-label">Nombre del pokemon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php if(isset($pokedex)){ echo $pokedex[0]['nombre']; } ?>" name="namePokemon" placeholder="Nombre del pokemon" id="namePokemon" required>
                            </div>
                        </div>
                        <!--Nombre del pokemon-->


                        <!--Region del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label class="col-sm-2 col-form-label" for="regionPokemon">Region del pokemon</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="regionPokemon" id="regionPokemon" required>
                                    <option value="">Escoge una opción</option>
                                    <?php $regiones = selectAllRegiones() ?>
                                    <?php foreach ($regiones as $region) { ?>
                                        <option <?php if(isset($pokedex)){if ($pokedex[0]['regiones_id'] == $region["id"]) {echo "selected";}} ?> value="<?php echo $region["id"] ?>" > <?php echo  $region["nombre"]; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        <!--Region del pokemon-->

                        <!--Tipo del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label class="col-sm-2 col-form-label" for="regionPokemon">Region del pokemon</label>
                            <div class="col-sm-10" required>
                                <?php 
                                    $tipos = selectAllTipos(); 
                                    $tiposPokemon = selectTipo($pokemon);
                                ?>
                                <?php foreach ($tipos as $tipo) {
                                    $i = 0;  
                                    $encontrado = false;
                                    while ($i < count($tiposPokemon) && !$encontrado) {
                                       if ($tipo["nombre"] == $tiposPokemon[$i]["nombre"]) {
                                            $encontrado = true;
                                        }
                                        else{
                                            $i++;
                                        }
                                    }
                                    ?>
                                    <input type="checkbox" <?php if($encontrado){echo "checked"; } ?> name="tipoPokemon[]" value="<?php echo $tipo['id'] ?>" id="<?php echo $tipo['id'] ?>" >  
                                    <label for="<?php echo $tipo['id'] ?>" > <?php echo $tipo['nombre'] ?></label>
                                <?php } ?>
                            </div>
                        </div>
                        <!--Tipo del pokemon-->

                        <!--Altura de pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label for="alturaPokemon" class="col-sm-2 col-form-label">Altura del pokemon</label>
                            <div class="col-sm-10">
                                <input type="number" value="<?php if(isset($pokedex)){ echo $pokedex[0]['altura']; } ?>" class="form-control" name="alturaPokemon" id="alturaPokemon" placeholder="Altura del pokemon" required>
                            </div>
                        </div>
                        <!--Altura de pokemon-->

                        <!--Peso del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label for="pesoPokemon" class="col-sm-2 col-form-label">Peso del pokemon</label>
                            <div class="col-sm-10">
                                <input type="number" value="<?php if(isset($pokedex)){ echo $pokedex[0]['peso']; } ?>" class="form-control" name="pesoPokemon" id="pesoPokemon" placeholder="Peso del pokemon" required>
                            </div>
                        </div>
                        <!--Peso del pokemon-->

                        <!--Evolucion del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label class="col-sm-2 col-form-label" for="evoPokemon">Evolucion del pokemon</label>
                            <div class="col-sm-10">
                                <input type="radio" name="evoPokemon" value="sinEvolucion" <?php if(isset($pokedex)){if ($pokedex[0]['evolucion'] == "Sin evolucionar") {echo "checked";}} ?> >
                                <label for="sinEvo">Sin evolucion</label>

                                <input type="radio" name="evoPokemon" value="primeraEvo" <?php if(isset($pokedex)){if ($pokedex[0]['evolucion'] == "Primera evolución") {echo "checked";}} ?> >
                                <label for="primeraEvo">Primera evolucion</label>

                                <input type="radio" name="evoPokemon" value="segundaEvo" <?php if(isset($pokedex)){if ($pokedex[0]['evolucion'] == "Segunda evolución") {echo "checked";}} ?> >
                                <label for="segundaEvo">Segunda evolucion</label>
                            </div>
                        </div>
                        <!--Evolucion del pokemon-->

                        <!--Imagen del pokemon-->
                        <div class="form-group row" style="margin-top:5px">
                            <label class="col-sm-2 col-form-label" for="imgPokemon">Region del pokemon</label>
                            <div class="col-sm-10">
                                <input type="file" name="imgPokemon" id="imgPokemon" required>
                            </div>
                        </div>
                        <!--Imagen del pokemon-->
                    </div>
                    <div class="card-footer text-end">
                        <a href="/pokedex/php_views/pokemon_list.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary" name="modify">Aceptar</button>
                    </div>
                </form>
            </p>
        </div>

    </div>



 <!--JS fontawesome-->
 <script src="https://kit.fontawesome.com/1ac3ed1571.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>