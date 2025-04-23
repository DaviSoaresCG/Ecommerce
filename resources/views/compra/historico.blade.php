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
                                    <div class="w-6">
                                        <a href="#" onclick="toggleModal()" class="cursor-pointer"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black/60 hidden z-50">
                <div class="bg-white rounded-lg shadow-xl p-6 w-96 relative">
                    <button onclick="toggleModal()"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                    <h2 class="text-xl font-bold mb-4">Título do Modal</h2>
                    <p class="mb-4">Esse é o conteúdo do modal. Pode colocar o que quiser aqui.</p>
                    <button onclick="toggleModal()" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Fechar
                    </button>
                </div>
            </div>
        @else
            <div>Nenhum item no carrinho</div>
        @endif
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById("modal");
            modal.classList.toggle("hidden");
        }
    </script>
@endsection
