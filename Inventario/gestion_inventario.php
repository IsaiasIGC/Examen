<?php

include_once("Producto.php");

$datosDeEntrada = [
    ["id" => 1, "nombre" => "Portátil Gaming", "precio" => 1199.99, "stock" => 10, "categoria" => "Electrónica"],
    ["id" => 2, "nombre" => "Ratón Inalámbrico", "precio" => 45.50, "stock" => 3, "categoria" => "Electrónica"],
    ["id" => 3, "nombre" => "Teclado Mecánico", "precio" => 89.90, "stock" => 0, "categoria" => "Electrónica"],
    ["id" => 4, "nombre" => "Silla de Oficina", "precio" => 150.00, "stock" => 7, "categoria" => "Muebles"],
    ["id" => 5, "nombre" => "Cafetera Express", "precio" => 79.95, "stock" => 12, "categoria" => "Electrodomésticos"]
];

function rellenarProductos($datos) {
    $productos = [];

    foreach ($datos as $key) {
        $producto = new Producto(
            $key["id"],
            $key["nombre"],
            $key["precio"],
            $key["stock"],
            $key["categoria"]
        );
        array_push($productos, $producto);
    }

    return $productos;
}

function getProductosDisponibles($productos) {
    $productosDisponibles = [];

    foreach ($productos as $producto) {
        if($producto->getStock() > 0) {
            array_push($productosDisponibles, $producto);
        }
    }

    return $productosDisponibles;
}

function getValorTotalStock($productosDisponibles) {
    $valorTotal = 0;

    // Sacamos el subtotal de cada producto y lo acumulamos en valorTotal
    foreach ($productosDisponibles as $producto) {
        $subtotal = $producto->getPrecio() * $producto->getStock();
        $valorTotal += $subtotal;
    }

    return $valorTotal;
}

function getProductoById($productos, $id) {
    foreach ($productos as $producto) {
        if($producto->getId() == $id) {
            return $producto;
        }
    }

    return null;
}

function getNombresProductos($productos) {
    $nombres = [];

    foreach ($productos as $producto) {
        $nombres[] = [$producto];
    }

    return $nombres;
}

function getCategorias($productos) {
    $categorias = [];

    foreach ($productos as $producto) {
        // Si la categoria no esta en el array la ponemos, asi evitamos duplicados
        if(!in_array($producto->getCategoria(), $categorias)) {
            $categorias[] = $producto->getCategoria();
        }
    }

    return $categorias;
}

$productos = rellenarProductos($datosDeEntrada);

$productosDisponibles = getProductosDisponibles($productos);

$valorTotalStock = getValorTotalStock($productosDisponibles);

$nombresProductos = getNombresProductos($productos);

$categorias = getCategorias($productos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Panel de inventario</h1></header>
    <main>
        <section class="seccion1">
            <article class="tarjeta">
                <h3>Total Stock</h3>
                <p><?php echo $valorTotalStock."€"; ?></p>
            </article>
            <article class="tarjeta">
                <h3>Categorías</h3>
                <p><?php echo $categorias[0].", ".$categorias[1].", ".$categorias[2]?></p>
            </article>
        </section>
        <section class="tarjeta">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($productos as $producto) {
                        $disponibilidad = "";

                        if($producto->getStock() > 3) {
                            $disponibilidad = "Disponible";
                        } else if ($producto->getStock() > 0 && $producto->getStock() <= 3) {
                            $disponibilidad = "Stock Bajo";
                        } else {
                            $disponibilidad = "Agotado";
                        }

                        echo "<tr>";
                        echo "<td>".$producto->getId()."</td>";
                        echo "<td>".$producto->getNombre()."</td>";
                        echo "<td>".$producto->getCategoria()."</td>";
                        echo "<td>".$producto->getPrecio()."</td>";
                        echo "<td>".$producto->getStock()."</td>";
                        echo "<td>".$disponibilidad."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>