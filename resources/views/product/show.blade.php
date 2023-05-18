<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datos de Producto') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Proveedor</th>
                                <td>{{ $product->provider->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Marca</th>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Descripción</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">SKU</th>
                                <td>{{ $product->sku }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Precio</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Cantidad</th>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
