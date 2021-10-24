<?php
$desenvolvedores = $viewVar['desenvolvedores'];

if (!empty($desenvolvedores)) {

    $contador = 0;
    foreach ($desenvolvedores['data'] as $desenvolvedor) {
        $contador++;
?>

        <tr>
            <td class="col-md-1"><input type="text" class="form-control text-center" id="id<?php echo $contador; ?>" value="<?php echo $desenvolvedor['id']; ?>" disabled></td>
            <td class="col-md-3"><input type="text" class="form-control text-center" id="nome<?php echo $contador; ?>" value="<?php echo $desenvolvedor["nome"]; ?>"></td>
            <td class="col-md-1"><select id="sexo<?php echo $contador; ?>" name="sexo<?php echo $contador; ?>" class="form-control">
                    <option value="M" <?php if($desenvolvedor['sexo'] == 'M'){ ?> selected <?php }; ?>>M</option>
                    <option value="F" <?php if($desenvolvedor['sexo'] == 'F'){ ?> selected <?php }; ?>>F</option>
                </select></td>
            <td class="col-md-1"><input type="text" class="form-control text-center" id="idade<?php echo $contador; ?>" value="<?php echo $desenvolvedor['idade']; ?>"></td>
            <td class="col-md-2"><input type="text" class="form-control text-center" id="hobby<?php echo $contador; ?>" value="<?php echo $desenvolvedor['hobby']; ?>"></td>
            <td class="col-md-2"><input type="text" class="form-control text-center dataNascimento" id="dataNascimento<?php echo $contador; ?>" value="<?php echo date('d/m/Y', strtotime($desenvolvedor['dataNascimento'])); ?>"></td>
            <td class="col-md-2 text-center">
                <a onclick="editar(<?php echo $contador; ?>)" class="btn btn-info text-white">Editar</a>
                <a onclick="excluir(<?php echo $desenvolvedor['id']; ?>)" class="btn btn-danger">Excluir</a>
            </td>
        </tr>

    <?php
    }
} else {
    ?>
    <tr>
        <th colspan="7" class="col-md-12 text-center alert alert-secondary" role="alert">Nenhum cadastro realizado.</th>
    </tr>
<?php
} ?>