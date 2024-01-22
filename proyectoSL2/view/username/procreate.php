<?php
        //require_once("c://xampp/htdocs/proyectoSL2/view/head/head.php");
        require_once(__DIR__ . '/../head/head.php');
?>              

    <form action="prostore.php" method="POST" autocomplete="off">
        <h2 class=" text-center">Registro de productos</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre producto</label>
            <input type="text" name="Nombre" required class="form-control" id="nombre" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="Precio" step="0.01" required class="form-control" id="precio" aria-describedby="preciohelp">
        </div>

        <div class="mb-3">
            <label for="Cantidad" class="form-label2">Cantidad</label>
            <input type="number" name="Cantidad" required class="form-control" id="cantidad" aria-describedby="cantidadhelp">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Producto</label>
            <select name="Tipo" class="form-select" id="tipo" required>
                <option selected>Selecciona el tipo de producto</option>
                <option value="1">Motos</option>
                <option value="2">Accesorios para Motos</option>
                <option value="3">Ropa para Motociclistas</option>
                <option value="4">Accesorios para Motos</option>
            
            </select>
        </div>

      
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="proindex.php">Cancelar</a>
    </form>


<?php

//require_once("c://xampp/htdocs/proyectoSL2/view/head/footer.php");
require_once(__DIR__ . '/../head/footer.php');
?>