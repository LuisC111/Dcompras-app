
<?php
include "./modules/headerCliente.php";

include_once "../../../App/model/productosModel.php";
$productos = obtenerProductosEnCarrito();


require '../../../vendor/autoload.php';
require_once '../../../Config/payment-methods.php';

MercadoPago\SDK::setAccessToken($access_token);


if (count($productos) <= 0) {
?>


<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Carrito</h5>
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Tu carrito esta vacio!</strong></h3>
                        <h4>Agrega algo para hacerme feliz :)</h4> <a href="catalogoCompras" class="btn btn-gradient-success cart-btn-transform m-3" data-abc="true">Continuar comprando</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } else { ?>
    <?php 
        foreach ($productos as $producto) {
            $product = [
                'id' => $producto->idProducto,
                'title' => $producto->nombreProducto,
                'description' => $producto->especificacionProducto,
                'category' => $producto->idSubCategoria,
                'available_quantity' => 1,
                'price' => $producto->precioProducto,
                ];
            $preference = new MercadoPago\Preference();
            $item = new MercadoPago\Item();
            $item->title = $product['title'];
            $item->quantity = $product['available_quantity'];
            $item->unit_price = $product['price'];
            $item->currency_id = "COP";
            $preference->items = array($item);
            $preference->back_urls = array(
                    "success" => "http://localhost/Dcompras-app/Public/Views/carritoCompras/orderDetail.php",
                    "failure" => "",
                    "pending" => ""
                );
            $preference->save();
        }
    ?>
    <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Tu carrito de compras</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"><?php echo cantidadDeProductos()?> Producto(s)</div>
                </div>
            </div>

            <div class="row border-top border-bottom">
            <?php
                    $total = 0;                   
                    $uniques = [];
                    $numprod = cantidadDeProductos();

                    foreach ($productos as $producto) {
                        $total = $producto->precioProducto*$numprod;
                        $id = $producto->idProducto;
    
                        if(!in_array($producto->idProducto, $uniques)){
                        $uniques[] = $producto->idProducto;

            ?>
                <div class="row main align-items-center" style="margin-left: 2px; margin-right: 20px; ">
                    <div class="col-2"><img class="img-fluid" src="<?= APP_DIR_FILES; ?>assets/img/productos/<?php echo $producto->imgProducto ?>.jpg" style="border-radius: 40px;"></div>
                    <div class="col">
                        <div class="row text-muted"><?php echo $producto->nombreProducto ?></div>
                        <div class="row"><?php echo $producto->especificacionProducto ?></div>
                    </div>
                    <div class="col"> 
                    <form action="../../../App/controller/quitarUnProducto.php" method="post" style="display: inline;">
                    <input type="hidden" name="idProducto" value="<?php echo $producto->idProducto ?>">
                    <input type="hidden" name="redireccionar_carrito">

                    <button style="background-color: transparent; border-color: transparent; color: gray; display: inline;" >
                                    <i class="fas fa-minus fa-x1"></i>
                                    </button>
                                    </form>
                        <a href="#" class="border">
                            <?php echo obtenerIdsDeProductosEnCarritoUnico($id) ?>
                        </a>   
                       

                        <form action="../../../App/controller/agregarUnProducto.php" method="post" style="display: inline;">
                        <input type="hidden" name="idProducto" value="<?php echo $producto->idProducto ?>">
                    <input type="hidden" name="redireccionar_carrito">
                        <button style="background-color: transparent; border-color: transparent; color: gray; display: inline;">
                                    <i class="fas fa-plus fa-x1"></i>
                                    </button>

                        </form>
                    </div>
                    <div class="col">$<?php echo number_format($producto->precioProducto, 2) ?> c/u</div>
                    <form action="../../../App/controller/eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="idProducto" value="<?php echo $producto->idProducto ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button style="background-color: transparent; border-color: transparent; color: gray;">
                                    <i class="fas fa-times fa-lg"></i>
                                    </button>
                                </form>

                </div>
                
                <?php }} ?>

                
            </div>
            <div class="back-to-shop"><a href="catalogoCompras">&leftarrow;<span class="text-muted">Volver a la tienda</span></a></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Factura</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col"><b><?php echo cantidadDeProductos()?> Producto(s)</b></div>
                <div class="col text-right"><b> $ <?php echo number_format($total, 2) ?></b></div>
            </div>
            <form>
                <b><p>ENVÍO</p></b> <select>
                    <option class="text-muted">Envío gratis - $ 0.00</option>
                </select>
                <br><br>
                <b><p>CÓDIGO DE REGALO</p></b> <input id="code" placeholder="Ingresa tu código">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col"><b>PRECIO TOTAL</b></div>
                <div class="col text-right"> <b>$ <?php echo number_format($total, 2) ?></b></div>
            </div> <a class="btn btn-gradient-dark" href="<?php echo $preference->init_point; ?>">PAGAR</a>
        </div>
    </div>
</div>






<!--
    <div class="columns">
        <div class="column"><br>
            <h2 class="is-size-2">Mi carrito de compras</h2><br>
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th><h3>Nombre</h3></th>
                        <th><h3>Descripción</h3></th>
                        <th><h3>Precio</h3></th>
                        <th><h3>Quitar</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto->precioProducto;
                    ?>
                        <tr>
                            
                            <td><h5 class="subtitle"><?php echo $producto->nombreProducto ?></h5></td>
                            <td><h5 class="subtitle"><?php echo $producto->especificacionProducto ?></h5></td>
                            <td><h5 class="subtitle">$<?php echo number_format($producto->precioProducto, 2) ?></h5></td>
                            <td>
                                <form action="../../../App/controller/eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="idProducto" value="<?php echo $producto->idProducto ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><h4><strong>Total</strong></h4></td>
                        <td colspan="2" class="is-size-4"><h4>
                            
                            $<?php echo number_format($total, 2) ?>

                    </h4></td>
                    </tr>
                </tfoot>
            </table>

            <?php include 'paypalCheckout.php'; ?><br><br>

            <a href="./terminar_compra.php" class="button is-success is-large"><h2>✔️ Terminar compra</h2></a>

        </div>
    </div>


                    -->

<?php } ?>
<?php include_once "pie.php" ?>