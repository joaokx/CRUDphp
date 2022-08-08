<div class="imagem-fundo ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-5 mt-5" >Formulário de Alteração </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="cor-form" action="?controller=veiculo&acao=alterarVeiculoAc" method="POST" >
                    <input type="hidden" value="<?=$array['id'];?>" name="id"><br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nroChassi"> Número Chassi:</label>
                            <input type="text" value="<?=$array['nroChassi'];?>" name="nroChassi" class="form-control" maxlength="17" required><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="marca">Marca:</label>
                            <input type="text" value="<?=$array['marca'];?>" name="marca" class="form-control" required><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modelo">Modelo:</label>
                            <input type="text" value="<?=$array['modelo'];?>" name="modelo" class="form-control" required> <br>   
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ano">Ano:</label>
                            <input type="text" id="data" value="<?=$array['ano'];?>" name="ano" class="form-control" maxlength="4" required> <br>   
                        </div>
                        <div class="form-group col-md-4">
                            <label for="placa">Placa:</label>
                            <input type="text" value="<?=$array['placa'];?>" name="placa" id="placa" class="form-control" minlength="7" maxlength="7" required> <br>   
                        </div>
                        <div class="form-group col-md-4">
                            <label for="placa">Cor:</label>
                            <input type="text" value="<?=$array['cor'];?>" name="cor" id="cor" class="form-control" minlength="7" maxlength="7" required> <br>   
                        </div>
                            <?php
                                require_once("controllers/Caracteristica.php");
                                $caracteristica = new CaracteristicaController();
                                $caracteristicas = $caracteristica -> listarCaracteristica();
                            foreach($caracteristicas as $c){?>
                            <div class="form-check form-check-inline col-md-4">
                                <input class="form-check-input" name="caracteristica[]" id="caracteristica-<?=$c['id']?>" type="checkbox" <?=$caracteristica -> caracteristicaSelecionada($c["id"], $array["id"]);?> value="<?=$c['id']?>">
                                <label class="form-check-label"for="caracteristica-<?=$c['id']?>" ><?=$c["nome"]?></label>
                            </div>
                            <?php } ?>
                    </div>
                    <div class="form-row">
                        <div class="offset-10 col-md-2">
                            <button type="submit" class="btn btn-danger">Alterar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>