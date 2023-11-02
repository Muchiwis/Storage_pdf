@extends('ventas._partials.app')
@section('show')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 150px;">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Code product
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                   Total
                </th>
                <th scope="col" class="px-6 py-3">
                   Option
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $venta->codigo }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $venta->producto }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $venta->cantidad }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $venta->precio }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{ $venta->total }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ asset('storage/pdf_save/'.$venta->producto.'.pdf') }}" download class="font-medium text-blue-600 dark:text-blue-500 hover:underline">PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection