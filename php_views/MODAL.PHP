    <!-- MODAL 
        
        MODAL-->
        <!--Button for modal-->
        <button type="button" class="btn rounded-circle btn-warning" data-bs-toggle="modal" data-bs-target="#modalForm" style="position:fixed; right:10px; bottom:10px; z-index:100;">
            <i class="fas fa-plus"></i>
        </button>
    </div>

    <!--Button for modal-->

    <!--Modal-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="width:90%">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <a class="navbar-brand text-white align-self-center">
                        <img src="https://imagenpng.com/wp-content/uploads/2016/09/Pokebola-pokeball-png-2.png" alt="Inicio" width="25" height="25" class="d-inline-block align-text-top">
                        Pokemon
                    </a>
                </div>
                <div class="modal-body">

                    <form action="/pokedex/php_controllers/pokemonController.php" method="post" enctype="multipart/form-data">
                        <div class="column">

                            <!--Id de pokemon-->
                            <div class="form-group row">
                                <label for="numPokemon" class="col-sm-2 col-form-label">Id del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="numPokemon" placeholder="Id del pokemon">
                                </div>
                            </div>
                            <!--Id de pokemon-->

                            <!--Nombre del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label for="namePokemon" class="col-sm-2 col-form-label">Nombre del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namePokemon" placeholder="Nombre del pokemon">
                                </div>
                            </div>
                            <!--Nombre del pokemon-->


                            <!--Region del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label class="col-sm-2 col-form-label" for="regionPokemon">Region del pokemon</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="regionPokemon" id="regionPokemon">
                                        <option value="">Escoge una opción</option>
                                        <option value="Kanto">Kanto</option>
                                        <option value="Jotho">Jotho</option>
                                        <option value="Hoenn">Hoenn</option>
                                        <option value="Sinnoh">Sinnoh</option>
                                        <option value="Teselia">Teselia</option>
                                    </select>
                                </div>
                            </div>
                            <!--Region del pokemon-->

                            <!--Tipo del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label class="col-sm-2 col-form-label" for="regionPokemon">Region del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="tipoPokemon[]" value="planta" id="planta">
                                    <label for="electrico">Planta</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="veneno" id="veneno">
                                    <label for="veneno">Veneno</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="fuego" id="fuego">
                                    <label for="fuego">Fuego</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="volador" id="volador">
                                    <label for="volador">Volador</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="agua" id="agua">
                                    <label for="agua">Agua</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="electrico" id="electrico">
                                    <label for="electrico">Eléctrico</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="hada" id="hada">
                                    <label for="hada">Hada</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="bicho" id="bicho">
                                    <label for="bicho">Bicho</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="lucha" id="lucha">
                                    <label for="lucha">Lucha</label>

                                    <input type="checkbox" name="tipoPokemon[]" value="psiquico" id="psiquico">
                                    <label for="psiquico">Psiquico</label>
                                </div>
                            </div>
                            <!--Tipo del pokemon-->

                            <!--Altura de pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label for="alturaPokemon" class="col-sm-2 col-form-label">Altura del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="alturaPokemon" placeholder="Altura del pokemon">
                                </div>
                            </div>
                            <!--Altura de pokemon-->

                            <!--Peso del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label for="pesoPokemon" class="col-sm-2 col-form-label">Peso del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="pesoPokemon" placeholder="Peso del pokemon">
                                </div>
                            </div>
                            <!--Peso del pokemon-->

                            <!--Evolucion del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label class="col-sm-2 col-form-label" for="evoPokemon">Evolucion del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="evoPokemon" id="sinEvolucion">
                                    <label for="sinEvolucion">Sin evolucion</label>


                                    <input type="radio" name="evoPokemon" id="primeraEvo">
                                    <label for="primeraEvo">Primera evolucion</label>

                                    <input type="radio" name="evoPokemon" id="segundaEvo">
                                    <label for="segundaEvo">Segunda evolucion</label>
                                </div>
                            </div>
                            <!--Evolucion del pokemon-->

                            <!--Imagen del pokemon-->
                            <div class="form-group row" style="margin-top:5px">
                                <label class="col-sm-2 col-form-label" for="regionPokemon">Region del pokemon</label>
                                <div class="col-sm-10">
                                    <input type="file" name="imgPokemon" id="imgPokemon">
                                </div>
                            </div>
                            <!--Imagen del pokemon-->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary align-content-end" data-bs-toggle="modal">Cancelar</button>
                            <input type="submit" class="btn btn-primary align-content-end" data-bs-toggle="modal" name="form" value="Aceptar" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--Modal-->
   