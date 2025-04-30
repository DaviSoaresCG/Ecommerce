<div class="flex flex-row flex-wrap items-center justify-center gap-5 m-auto mb-4">
    @foreach ($data as $produto)
        <section class="max-w-76 min-w-56 p-6 border-2 border-gray-300 rounded-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset($produto->foto) }}" alt="" class="max-h-46">
            </div>
            <div class="mt-4 space-y-4">
                <div>
                    <h6 class="font-semibold">{{ $produto->nome }}</h6>
                    <h6 class="font-semibold">R${{ $produto->valor }}</h6>
                </div>
                <a href="{{ route('adicionar_carrinho', ['idproduto' => $produto->id]) }}"
                    class="bg-orange-500 p-2 text-white rounded">Adicionar item</a>
            </div>
        </section>
    @endforeach

</div>
<div class="flex flex-col  items-center justify-center">
    {{ $data->links() }}

</div>
