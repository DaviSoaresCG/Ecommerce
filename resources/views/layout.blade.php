<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @yield('scriptjs')
</head>

<body class="text-black">
    <header class="bg-gray-100 p-7">
        <nav class="flex flex-row space-x-5">
            <a href="#" class="text-2xl text-orange-500">Myshop</a>
            <ul class="flex flex-row flex-wrap space-x-3 items-center justify-center text-sm md:text-base lg:text-lg">
                <li class="mb-0">
                    <a href="{{ route('home') }}"
                        class="hover:text-orange-500 transition-all duration-100 ease-in-out">Home</a>
                </li>
                <li>
                    <a href="{{ route('categoria') }}"
                        class="hover:text-orange-500 transition-all duration-100 ease-in-out">Categorias</a>
                </li>
                @if (!Auth::user())
                    <li>
                        <a href="{{ route('cadastrar') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Cadastrar</a>
                    </li>
                @endif

                @if (!Auth::user())
                    <li>
                        <a href="{{ route('login') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Login</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('historico')}}" class="hover:text-orange-500 transition-all duration-100 ease-in-out">Minhas
                            Compras</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Sair</a>
                    </li>
                @endif

            </ul>

            <div class="ml-auto flex flex-row gap-x-10 justify-center items-center">
                @if (Auth::user())
                    <p>Olá, {{ Auth::user()->nome }}</p>
                @endif
                <a href="{{ route('ver_carrinho') }}" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 hover:text-orange-500 transition-all duration-200 ease">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>
            </div>

        </nav>
    </header>
    @if (session('sucesso'))
        <div class="bg-green-100 border flex items-center justify-center mt-10 -mb-17 mx-auto w-78 border-green-400 text-green-700 px-4 py-3 rounded"
            role="alert">
            <span class="block sm:inline">{{ session('sucesso') }}</span>
        </div>
    @elseif(session('erro'))
        <div class="bg-red-100 border flex items-center justify-center mt-10 -mb-17 mx-auto w-78 border-red-400 text-black px-4 py-3 rounded"
            role="alert">
            <span class="block sm:inline">{{ session('erro') }}</span>
        </div>
    @endif
    <main class="flex flex-col md:flex-row mt-26 items-center space-x-8 w-full">
        @yield('conteudo')
    </main>
</body>

</html>
