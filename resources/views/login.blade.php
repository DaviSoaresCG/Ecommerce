@extends('layout')
@section('conteudo')
    <div class="w-76 sm:w-sm md:w-md flex flex-col  p-4 mx-auto ">
        <form action="{{ route('autenticar') }}" method="post">
            @csrf
            <div class="text-center">
                <h1 class="font-bold text-4xl ">Logar</h1>
            </div>
            <br>
            <section class="space-y-4 bg-gray-100  rounded-2xl w-full h-full shadow-2xl px-8 py-10 mb-10">
                <div class="flex flex-col">
                    <label for="email" class="ml-1 ">Email</label>
                    <input type="text" name="email" id="email" required value="{{ old('email') }}"
                        class=" border-2 border-gray-500 rounded-2xl py-2 px-2 {{ $errors->has('email') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}) ">
                    @if (count($errors->get('email')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('email') as $erro)
                                {{ $erro }}
                                <br>
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="flex flex-col">
                    <label for="senha" class="ml-1 ">Senha</label>
                    <input type="password" name="senha" required value="{{ old('senha') }}"
                        class="border-2 {{ $errors->has('c_senha') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}  border-gray-500 rounded-2xl py-2 px-2">
                    @if (count($errors->get('cep')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('c_senha') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('c_senha') }}</p>
                    @endif
                </div>
                <div class="flex gap-2 flex-col">
                    <p>Não tem uma conta?
                        <a href="{{ route('cadastrar') }}"
                            class=" hover:text-orange-500 text-orange-500 md:text-black transition-all duration-100 ease-in-out">
                            Cadastre aqui
                        </a>
                    </p>
                    <button
                        class="cursor-pointer text-lg text-white bg-orange-500 w-full rounded-2xl px-4 py-2 hover:bg-orange-600 
                    transition-all duration-300 ease mt-2">Logar
                    </button>
                </div>
        </form>
    </div>
@endsection
