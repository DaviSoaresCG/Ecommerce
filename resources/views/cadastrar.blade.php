@extends('layout')
@section('scriptjs')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            // ao carregar a pagina - ONLOAD
            $('#cpf').mask("000.000.000-00") //pega o elemto com ID CPF
            $('#cep').mask("00000-000")
        })
    </script>
@endsection
@section('conteudo')
    <div class="w-76 sm:w-sm md:w-lg flex flex-col  p-4 mx-auto">
        <form action="{{ route('cadastrar_cliente') }}" method="post">
            @csrf
            <div class="text-center">
                <h1 class="font-bold text-4xl ">Cadastrar</h1>
            </div>
            <br>
            <section class="space-y-4 bg-gray-100  rounded-2xl w-full h-full shadow-lg px-8 py-10 mb-10">
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
                    <label for="nome" class="ml-1 ">Nome</label>
                    <input type="text" name="nome" required value="{{ old('nome') }}"
                        class="border-2  border-gray-500 rounded-2xl py-2 px-2 {{ $errors->has('nome') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}">
                    @if (count($errors->get('nome')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('nome') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('nome') }}</p>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="cpf" class="ml-1 ">Cpf (Apenas números)</label>
                    <input type="text" required name="cpf" id="cpf" value="{{ old('cpf') }}"
                        class="border-2  border-gray-500 rounded-2xl py-2 px-2 {{ $errors->has('cpf') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}">
                    @if (count($errors->get('cpf')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('cpf') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('cpf') }}</p>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="endereco" class="ml-1 ">Endereço</label>
                    <input type="text" required name="endereco" value="{{ old('endereco') }}"
                        class="border-2  border-gray-500 rounded-2xl py-2 px-2 {{ $errors->has('endereco') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}">
                    @if (count($errors->get('endereco')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('endereco') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('endereco') }}</p>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="cep" class="ml-1 ">Cep</label>
                    <input type="text" name="cep" required id="cep" value="{{ old('cep') }}"
                        class="border-2  border-gray-500 rounded-2xl {{ $errors->has('cep') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }} py-2 px-2 ">
                    @if (count($errors->get('cep')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('cep') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('cep') }}</p>
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
                <div class="flex flex-col">
                    <label for="confirme_senha" class="ml-1 ">Confirme sua senha</label>
                    <input type="password" name="c_senha" required
                        class="border-2 {{ $errors->has('c_senha') ? 'border-red-500 bg-red-50 focus:border-red-500' : '' }}  border-gray-500 rounded-2xl py-2 px-2">
                    @if (count($errors->get('c_senha')) > 1)
                        <p class="text-sm text-red-500 ml-1">
                            @foreach ($errors->get('cep') as $erro)
                                {{ $erro }}
                            @endforeach
                        </p>
                    @else
                        <p class="text-sm text-red-500 ml-1">{{ $errors->first('c_senha') }}</p>
                    @endif
                </div>
                <div class="flex gap-2 flex-col">
                    <p>Ja tem uma conta?
                        <a href="{{ route('login') }}"
                            class=" hover:text-orange-500 text-orange-500 md:text-black transition-all duration-100 ease-in-out">
                            Clique aqui
                        </a>
                    </p>
                    <button
                        class="cursor-pointer text-lg text-white bg-orange-500 w-full rounded-2xl px-4 py-2 hover:bg-orange-600 
                        transition-all duration-300 ease mt-2">Cadastrar
                    </button>
                </div>
        </form>
    </div>
@endsection
