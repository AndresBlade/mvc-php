<?php require_once("layouts/header.php")?>
<form action="" method="get" class="productForm">
    <div class="productForm__inputData">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $producto["nombre"]?>" required>
    </div>
    <div class="productForm__inputData">
        <label for="precio">Precio</label>
        <input type="number" name="precio" value="<?= $producto["precio"]?>" required>
    </div>
    <div class="productForm__inputData">
        <label for="tipo">Tipo</label>
        <select name="tipo">
            <?php foreach($tipos as $tipo) {?>
                <option value="<?= $tipo["id"]?>" <?= $producto["tipo_id"] == $tipo["id"] ? "selected" : ""?>><?= $tipo["descripcion"]?></option>

            <?php }?>
        </select>
    </div>
    <div class="productForm__inputData">
        <label for="marca">Marca</label>
        <select name="marca">
            <?php foreach($marcas as $marca) {?>
                <option value="<?= $marca["id"]?>" <?= $producto["marca_id"] == $marca["id"] ? "selected" : ""?>><?= $marca["nombre"]?></option>

            <?php }?>
        </select>
    </div>
    
    
    
    



    <input type="submit" name="btn" value="Enviar" class="productForm__sendDataButton">
    <input type="hidden" name="action" value="guardarEditadoProducto">
    <input type="hidden" name="id" value="<?= $producto["id"]?>">
</form>
<?php require_once("layouts/footer.php")?>