<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos disponibles') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product['provider']['name'] }}</th>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['brand']['name'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>
                                    <a  class="btn btn-primary" href="{{ route('product.show', ['id' => $product['id']]) }}" role="button">Ver</a>
                                    <a  class="btn btn-primary" onClick="addProductToCart($(this));" href="#" data-id="{{ $product['id'] }}" data-price ="{{ $product['price'] }}" role="button">Agregar al Carrito</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
<script type="text/javascript">
$(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
});
function addProductToCart(link) {

            let url = "{{ route('cart.store') }}";
            let product_id = link.data('id');
            let price = link.data('price');
            let quantity = 1;
            $.ajax({
            type: "post",
            url: url,
            data:{
                    "product_id" : product_id,
                    "price": price,
                    "quantity" : quantity,
                },
            success: function(data)
            {
                window.location = data.url;
            },
            error:function(error){
                alert(error.responseJSON.message);
            }
        });
    };
</script>
