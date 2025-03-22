@extends('layout')
@section('conteudo')
    <div class="max-w-36 flex flex-row items-center justify-center m-0 ml-10">
        @if (isset($data['listaCategoria']))
            <ul class="w-36 rounded bg-gray-200 group  text-lg font-semibold">
                <li class="">
                    <a href="{{ route('categoria') }}"
                        class=" p-3 text-center w-full  inline-block @if ($data['idcategoria'] == 0) bg-orange-500 rounded text-white @endif">Geral</a>
                </li>
                @foreach ($data['listaCategoria'] as $cat)
                    <li class="">
                        <a href="{{ route('categoria_por_id', ['idcategoria' => $cat->id]) }}"
                            class="text-center p-3 w-full  inline-block @if ($data['idcategoria'] == $cat->id) bg-orange-500 text-white rounded @endif">{{ $cat->categoria }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @include('_produtos', ['data' => $data['listaProduto']])
@endsection
