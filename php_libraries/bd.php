<?php

session_start();

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "pokedex";

    $conexion = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8");

    return $conexion;
}

function closeBd()
{
    return null;
}

function selectAllPokemons()
{
    try {
        $conexion = openBd();

        $sentenciaText = "SELECT * FROM `pokemons`";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->execute();

        $resultado = $sentencia->fetchAll();
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }

    $conexion = closeBd();

    return $resultado;
}


function selectAllTipos()
{
    try {
        $conexion = openBd();

        $sentenciaText = "SELECT * FROM `tipos`";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $conexion = closeBd();

        return $resultado;
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function selectAllRegiones()
{
    try {
        $conexion = openBd();

        $sentenciaText = "SELECT * FROM `regiones`";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $conexion = closeBd();

        return $resultado;
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function selectPokemon($idPokemon)
{
    try {
        $conexion = openBd();

        $sentenciaText = "SELECT * FROM pokemons WHERE id = :idPokemon";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $conexion = closeBd();

        return $resultado;
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function selectTipo($idPokemon)
{
    try {
        $conexion = openBd();

        $sentenciaText = "SELECT tipos.* FROM pokedex.tipos_has_pokemons 
        join tipos on tipos.id = tipos_has_pokemons.tipos_id
        where tipos_has_pokemons.pokemons_id = :idPokemon;";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $conexion = closeBd();

        return $resultado;
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function insertPokemon($numPokemon, $nombrePokemon, $regionIdPokemon, $tipoPokemon, $alturaPokemon, $pesoPokemon, $evoPokemon, $imgPokemon)
{
    try {
        $conexion = openBd();

        $conexion->beginTransaction();

        $sentenciaText = "INSERT INTO `pokemons` (`numero`, `nombre`, `altura`, `peso`, `evolucion`, `imagen`, `regiones_id`) 
                          VALUES (:numPokemon, :nombrePokemon, :alturaPokemon, :pesoPokemon, :evoPokemon, :imgPokemon, :regionIdPokemon)";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":numPokemon", $numPokemon);
        $sentencia->bindParam(":nombrePokemon", $nombrePokemon);
        $sentencia->bindParam(":alturaPokemon", $alturaPokemon);
        $sentencia->bindParam(":pesoPokemon", $pesoPokemon);
        $sentencia->bindParam(":evoPokemon", $evoPokemon);
        $sentencia->bindParam(":imgPokemon", $imgPokemon);
        $sentencia->bindParam(":regionIdPokemon", $regionIdPokemon);

        $sentencia->execute();

        $idPokemon = $conexion->lastInsertId();

        $sentenciaText = "INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id) 
                          VALUES (:tipoPokemon, :idPokemon)";

        $sentencia = $conexion->prepare($sentenciaText);

        foreach ($tipoPokemon as $tipos) {
            $sentencia->bindParam(":tipoPokemon", $tipos);
            $sentencia->bindParam(":idPokemon", $idPokemon);

            $sentencia->execute();
        }

        $conexion->commit();

        $conexion = closeBd();
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function borrarPokemon($idPokemon)
{
    try {
        $conexion = openBd();

        $conexion->beginTransaction();

        $sentenciaText = "DELETE FROM tipos_has_pokemons WHERE pokemons_id = :idPokemon";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->execute();

        $sentenciaText = "DELETE FROM pokemons WHERE id = :idPokemon";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->execute();

        $conexion->commit();

        $conexion = closeBd();
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function editarUsuario($idPokemon, $numPokemon, $nombrePokemon, $regionIdPokemon, $tipoPokemon, $alturaPokemon, $pesoPokemon, $evoPokemon, $imgPokemon)
{
    try {
        $conexion = openBd();

        $conexion->beginTransaction();

        $sentenciaText = "UPDATE `pokemons` SET numero = :numPokemon, nombre = :nombrePokemon, altura = :alturaPokemon, peso = :pesoPokemon, evolucion = :evoPokemon, imagen = :imgPokemon, regiones_id = :regionIdPokemon WHERE id = :idPokemon"; 

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->bindParam(":numPokemon", $numPokemon);
        $sentencia->bindParam(":nombrePokemon", $nombrePokemon);
        $sentencia->bindParam(":alturaPokemon", $alturaPokemon);
        $sentencia->bindParam(":pesoPokemon", $pesoPokemon);
        $sentencia->bindParam(":evoPokemon", $evoPokemon);
        $sentencia->bindParam(":imgPokemon", $imgPokemon);
        $sentencia->bindParam(":regionIdPokemon", $regionIdPokemon);

        $sentencia->execute();

        
        $sentenciaText = "DELETE FROM tipos_has_pokemons WHERE pokemons_id = :idPokemon";

        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(":idPokemon", $idPokemon);
        $sentencia->execute();

        $sentenciaText = "INSERT INTO tipos_has_pokemons (tipos_id, pokemons_id) VALUES (:tipoPokemon, :idPokemon)";

        $sentencia = $conexion->prepare($sentenciaText);

        foreach ($tipoPokemon as $tipos) {
            $sentencia->bindParam(":idPokemon", $idPokemon);
            $sentencia->bindParam(":tipoPokemon", $tipos);

            $sentencia->execute();
        }

        $conexion->commit();

        $conexion = closeBd();
    } catch (PDOException $e) {
        $_SESSION['error'] = getErrorMessage($e);
    }
}

function getErrorMessage($e)
{
    $message = "";

    /*
        0	SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard).
        1	Driver-specific error code.
        2	Driver-specific error message.
    */
    if (!empty($e->errorInfo[1]))
        {
            switch($e->errorInfo[1]) 
                {
                    case 1044: 
                        $message = "Usuario o contraseña incorrectos."; 
                        break;
                    case 1045: 
                        $message = "Acceso no concedido."; 
                        break;
                    case 1046: 
                        $message = "No hay ninguna base de datos seleccionada."; 
                        break;                    
                    case 1049: 
                        $message = "Se desconoce la base de datos, revisela."; 
                        break;
                    case 1451: 
                        $message = "Registro con datos de foreign key."; 
                        break;
                    case 1062: 
                        $message = "El registro ya esta en la base de datos."; 
                        break;
                    case 2002: 
                        $message = "Servidor no econtrado.";
                        break;
                    default: 
                        $message = $e->errorInfo[1] . ": " . $e->errorInfo[2];
                        break;
                }
        } 
    return $message;
}
