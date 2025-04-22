@extends('layout')
@section('conteudo')

    <div class="w-full">
        @if (isset($data))
            <div class="container w-full mx-auto p-4 flex flex-col items-center justify-center">
                <div class="flex flex-row w-full">
                    <h3 class="text-3xl font-semibold mb-4 mr-auto">Histórico</h3>
                </div>
                <table class="w-full bg-white border border-gray-300 shadow-lg rounded-lg overflow-hidden">
                    <!-- Cabeçalho da tabela -->
                    <thead class="bg-gray-100">
                        <tr class="">
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Data da Compra</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Situação
                            </th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">
                                Total:
                            </th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">
                                Detalhes
                            </th>
                        </tr>
                    </thead>
                    <!-- Corpo da tabela !-->
                    <tbody>
                        <!-- Linha 1 -->
                        @foreach ($data['lista_pedido'] as $pedido)
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $pedido->data }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $pedido->status }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $pedido->total }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div>Nenhum item no carrinho</div>
        @endif
    </div>
    

@endsection
