<?php require_once("layouts/header.php")?>
<a href="index.php?action=rellenarNuevoProducto" class="addProductbtn">Nuevo producto</a>
<table class="productsTable">
    <thead>
        <th class="productsTable__columnHeader">Nombre</th>
        <th class="productsTable__columnHeader">Precio</th>
        <th class="productsTable__columnHeader">Tipo</th>
        <th class="productsTable__columnHeader">Marca</th>
        <th class="productsTable__columnHeader" colspan="2">Acciones</th>
    </thead>
    <tbody>
        <?php if (isset($productos)) {?>
            
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td class="productsTable__cell"><?php echo $producto['nombre'] ?></td>
                    <td class="productsTable__cell"><?php echo $producto['precio'] ?></td>
                    <td class="productsTable__cell"><?php echo $producto['tipo'] ?></td>
                    <td class="productsTable__cell"><?php echo $producto['marca'] ?></td>
                    <td class="productsTable__cell"><a href="index.php?action=rellenarEditadoProducto&id=<?= $producto['id']?>" class="productsTable__actionProduct productsTable__actionProduct--edit">Editar</a></td>
                    <td class="productsTable__cell"><a href="index.php?action=eliminarProducto&id=<?= $producto['id']?>" class="productsTable__actionProduct productsTable__actionProduct--delete">Borrar</a></td>
                </tr>
            <?php endforeach; ?>

        <?php }?>
    </tbody>
</table>
<?php require_once("layouts/footer.php")?>
