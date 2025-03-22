@extends('layout')
@section('conteudo')
    @php $total = 0; @endphp
    @foreach ($carrinho as $item)
        @php
            $total += $item->valor;
        @endphp
    @endforeach
    <div class="w-full">
        @if (isset($carrinho) && $carrinho > 0)
            <div class="container w-full mx-auto p-4 flex flex-col items-center justify-center">
                <div class="flex flex-row w-full">
                    <h3 class="text-3xl font-semibold mb-4 mr-auto">Total: R${{ $total }}</h3>
                    @if (!empty($carrinho))
                        <form action="{{ route('historico') }}" method="post">
                            @csrf
                            <input type="submit" value="Finalizar Compra"
                                class="px-3 py-2 bg-orange-500 text-white text-lg rounded cursor-pointer">
                        </form>
                    @endif
                </div>
                <table class="w-full bg-white border border-gray-300 shadow-lg rounded-lg overflow-hidden">
                    <!-- Cabeçalho da tabela -->
                    <thead class="bg-gray-100">
                        <tr class="">
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Nome</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Descrição</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Valor</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Foto</th>
                            <th class="py-4 px-5 border-b text-left text-lg font-semibold text-gray-900">Ações</th>
                        </tr>
                    </thead>
                    <!-- Corpo da tabela -->
                    <tbody>
                        <!-- Linha 1 -->
                        @foreach ($carrinho as $indice => $item)
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $item->nome }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">{{ $item->descricao }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">R$: {{ $item->valor }}</td>
                                <td class="py-4 px-5 border-b text-base text-gray-900"><img class="h-14"
                                        src="{{ asset($item->foto) }}" alt=""></td>
                                <td class="py-4 px-5 border-b text-base text-gray-900">
                                    <div class="w-10 rounded-md p-1  bg-red-500">
                                        <a href="{{ route('remover_carrinho', ['indice' => $indice]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-8 cursor-pointer text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
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
