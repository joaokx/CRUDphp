<div class="imagem-fundo layout-listagem text-center">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-11"> 
                <h1>Lista de Veículos Cadastrados</h1>
            </div>
        </div>
        <?php if(!empty($array)){?>

            <div class="row">
                <form class="form-inline" action="?controller=veiculo&acao=pesquisarVeiculo" method="POST">
                    <div class="form-group mb-2 ml-5">
                        <label class="titulo-pesquisa" for="">
                            Pesquisa por: Chassi, Placa e Características.
                        </label>
                        <input type="text" name="pesquisa" class="form-control mx-sm-3" />
                        <button type="submit" class="btn btn-secondary fa fa-search"></button>  
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table cor-table">
                        <tr>    
                            <th>Código</th>
                            <th>Número Chassi</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Placa</th>
                            <th>Características</th>
                            <th>Cor</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        <?php
                        require_once("controllers/Caracteristica.php");
                        foreach ($array as $veiculo){
                            $caracteristica = new CaracteristicaController();
                            $resultado = $caracteristica -> listarCaracteristicaPorId($veiculo['id']);?>
                            <tr>
                                <td ><?=$veiculo["id"]?></td>
                                <td><?=$veiculo["nroChassi"]?></td>
                                <td><?=$veiculo["marca"]?></td>
                                <td><?=$veiculo["modelo"]?></td> 
                                <td><?=$veiculo["ano"]?></td> 
                                <td><?=$veiculo["cor"]?></td> 
                                
                                <td>
                                    <?php 
                                    $count = 0;
                                    foreach($resultado as $r){
                                        ++$count;
                                        echo($r['nomeCaracteristica']);
                                        echo(count($resultado) > $count ? ", " : ".");
                                    } ?>
                                    <td><?=$veiculo["placa"]?></td> 
                                </td>
                                <td><a href="?controller=veiculo&acao=alterarVeiculo&id=<?=$veiculo['id'];?>" type="button" name="editar"class="btn btn-primary">Editar </a></td>
                                <td><button type="button" data-id="<?=$veiculo['id'];?>" name="deletar" class="btn btn-danger openModal" data-toggle="modal" >Deletar </button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <div class="card mt-5">
                <div class="card-body">
                    Não há registros.
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Excluir Item</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            Deseja realmente excluir este item?
        </div>
        <div class="modal-footer">
            <a href="" id="href" class="btn btn-primary">Sim</a>
            <a class="btn btn-default" data-dismiss="modal">Não</a>
        </div>
        </div>
    </div>
</div>