@extends('layout')
@section('conteudo')
    <div class="w-full">
        {{-- @if (session('sucesso'))
            <div class="bg-green-100 border flex items-center justify-center -mt-15 mb-15 mx-auto w-78 border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('sucesso') }}</span>
            </div>
        @endif --}}
        @include('_produtos', ['data' => $data['listaProduto']])
    </div>
@endsection
