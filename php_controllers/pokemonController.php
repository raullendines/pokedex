<?php

require dirname(__FILE__) . "/../php_libraries/bd.php";
$error = [];

if (isset($_POST['aceptar'])) {

    //ID Pokemon
    $numPokemon = isset($_POST['numPokemon']) ? $_POST['numPokemon'] : "";

    //Nombre pokemon
    $namePokemon = isset($_POST['namePokemon']) ? $_POST['namePokemon'] : "";

    //Region pokemon
    $regionPokemon = isset($_POST['regionPokemon']) ? $_POST['regionPokemon'] : "";

    //Tipo pokemon
    $tipoPokemon = [];
    if (isset($_POST['tipoPokemon'])) {
        foreach ($_POST['tipoPokemon'] as $valor) {
            array_push($tipoPokemon, $valor);
        }
    } else {
        $tipoPokemon = "";
    }

    //Altura pokemon
    $alturaPokemon = isset($_POST['alturaPokemon']) ? $_POST['alturaPokemon'] : "";

    //Peso pokemon
    $pesoPokemon = isset($_POST['pesoPokemon']) ? $_POST['pesoPokemon'] : "";

    //Evolucion pokemon
    $evoPokemon = isset($_POST['evoPokemon']) ? $_POST['evoPokemon'] : "";

    //Imagen pokemon
    $imgPokemon = isset($_FILES['imgPokemon']) ? $_FILES['imgPokemon'] : "";

    $imgRutaTemp = $imgPokemon['tmp_name'];
    $imgExtension = pathinfo($imgPokemon['name'], PATHINFO_EXTENSION);
    $imgRutaAbs = "/pokedex/media/pomemons/" . $numPokemon . "." . $imgExtension;
    $imgRutaRel = "../media/pokemons/" . $numPokemon . "." . $imgExtension;

    if (!move_uploaded_file($imgRutaTemp, $imgRutaRel)) {
        $_SESSION["error"];
    }

    insertPokemon(
        $numPokemon,
        $namePokemon,
        $regionPokemon,
        $tipoPokemon,
        $alturaPokemon,
        $pesoPokemon,
        $evoPokemon,
        $imgRutaRel
    );


    if (isset($_SESSION["error"])) {
        $_SESSION["error"] = "El pokemon no se ha podido agregar.";
        header("Location: ../php_views/pokemon.php");
        exit();
    } else {
        $_SESSION["correcto"] = "El pokemon se ha agregado correctamente.";
        header("Location: ../php_views/pokemon_list.php");
        
        exit();
    }
}

if (isset($_POST['editar'])) {

    $buscarPokemon = $_POST['valorPokemon'];

    if ($buscarPokemon != -1) {
        $_SESSION['pokemon'] = $buscarPokemon;
        header("Location: ../php_views/pokemon_edit.php");
    }
}


if (isset($_POST['modify'])) {

    //ID pokemon
    $id = isset($_POST['idPokemon']) ? $_POST['idPokemon'] : "";

    //Num Pokemon
    $numPokemon = isset($_POST['numPokemon']) ? $_POST['numPokemon'] : "";

    //Nombre pokemon
    $namePokemon = isset($_POST['namePokemon']) ? $_POST['namePokemon'] : "";

    //Region pokemon
    $regionPokemon = isset($_POST['regionPokemon']) ? $_POST['regionPokemon'] : "";

    //Tipo pokemon
    $tipoPokemon = [];
    if (isset($_POST['tipoPokemon'])) {
        foreach ($_POST['tipoPokemon'] as $valor) {
            array_push($tipoPokemon, $valor);
        }
    } else {
        $tipoPokemon = "";
    }

    //Altura pokemon
    $alturaPokemon = isset($_POST['alturaPokemon']) ? $_POST['alturaPokemon'] : "";

    //Peso pokemon
    $pesoPokemon = isset($_POST['pesoPokemon']) ? $_POST['pesoPokemon'] : "";

    //Evolucion pokemon
    $evoPokemon = isset($_POST['evoPokemon']) ? $_POST['evoPokemon'] : "";

    //Imagen pokemon
    $imgPokemon = isset($_FILES['imgPokemon']) ? $_FILES['imgPokemon'] : "";

    $imgRutaTemp = $imgPokemon['tmp_name'];
    $imgExtension = pathinfo($imgPokemon['name'], PATHINFO_EXTENSION);
    $imgRutaAbs = "/pokedex/media/pomemons/" . $numPokemon . "." . $imgExtension;
    $imgRutaRel = "../media/pokemons/" . $numPokemon . "." . $imgExtension;

    if (!move_uploaded_file($imgRutaTemp, $imgRutaRel)) {
        $_SESSION["error"];
    }

    editarUsuario(
        $id,
        $numPokemon,
        $namePokemon,
        $regionPokemon,
        $tipoPokemon,
        $alturaPokemon,
        $pesoPokemon,
        $evoPokemon,
        $imgRutaRel
    );

    if (isset($_SESSION["error"])) {
        $_SESSION["error"] = "El pokemon no se ha podido modificar.";
        header("Location: ../php_views/pokemon_edit.php");
        exit();
    } else {
        $_SESSION["correcto"] = "El pokemon se ha modificado correctamente.";
        header("Location: ../php_views/pokemon_list.php");
        exit();
    }
}


if (isset($_POST['borrar'])) {

    $idPokemon = $_POST['valorPokemon'];

        borrarPokemon(
            $idPokemon
        );

        if (isset($_SESSION["error"])) {
            $_SESSION["error"] = "El pokemon no se ha podido borrar.";
            header("Location: ../php_views/pokemon_list.php");
            exit();
        } else {
            $_SESSION["correcto"] = "El pokemon se ha borrado correctamente.";
            header("Location: ../php_views/pokemon_list.php");
            
            exit();
        }

    }

 