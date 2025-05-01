@extends('layout')
@section('conteudo')
    <div class="w-28 mb-10 md:mb-0 flex flex-col items-center justify-center m-0 md:ml-10">
        @if (isset($data['listaCategoria']))
            <ul class="w-28 sm:w-36 rounded bg-gray-200 group text-sm sm:text-lg font-semibold ">
                <li class="">
                    <a href="{{ route('categoria') }}"
                        class=" p-2 md:p-3 text-center w-full  inline-block @if ($data['idcategoria'] == 0) bg-orange-500 rounded text-white @endif">Geral</a>
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
    <div class="flex flex-col items-center justify-center m-auto">
        @include('_produtos', ['data' => $data['listaProduto']])
    </div>
@endsection
