<script id="AJAX">
    $(document).ready(function () {
        $("#entregar").click(function () {
            let nombre = "{{$transportista->slug}}";
            $(".mensaje").empty();
            $.ajax({
                type : "GET",
                url : "{{url("transportistas/$transportista->slug/entregarAjax")}}",
                dataType : "json",
                data : {
                "_token" : "{{csrf_token()}}",
                    "transportista" : nombre,
            },
            success : function (json) {
                console.log(json);
                if (json.Estado === "OK") {
                    $(".textoEntregado").text("entregado");
                    $("#mensaje").text("Entregado con éxito");
                }
            },
            error : function () {
                alert("Error al añadir a la cesta")
            }
        })
        });
    })
</script>


<script id="BUSCADOR">
    $(document).ready(function () {
        $("#busqueda").autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    type: "POST",
                    url: "{{url("productos/busquedaAjax")}}",
                    dataType: "json",
                    data: {
                    "_token": "{{csrf_token()}}",
                        "busqueda": request.term
                },
                success: function( data ) {
                    response( data );
                }
            } );
            },
            position: {
                my: "left+0 top+8"
            },
            select: function (event, ui) {
                window.location = window.location.origin + "/prueba/public/productos/" + convertToSlug(ui.item.value);
            }
        } );
        function convertToSlug(Text)
        {
            return Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'')
                ;
        }
    })
</script>


<!--CESTA-->
<script id="CESTA">
    $(document).ready(function () {
        $("#{{$producto->id}}").click(function () {
            $.ajax({
                type : "POST",
                url : "{{url("productos/addCesta")}}",
                dataType : "json",
                data : {
                "_token" : "{{csrf_token()}}",
                    "producto" : this.id,

            },
            success : function (json) {
                $("#cantidadCesta").text(Object.keys(json.cart).length);
            },
            error : function () {
                alert("Error al añadir a la cesta")
            }
        })
        })
    })
</script>
</script>
<?php
class hola {
    public function addCesta(Request $request) {
        $id = $request->producto;
        $product = Producto::findOrFail($id);
        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['cantidad']++;
        } else {
            $cart[$product->id] = [
                'nombre' => $product->nombre,
                'cantidad' => 1,
            ];
        }
        session(['cart' => $cart]);


        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }

}
?>
