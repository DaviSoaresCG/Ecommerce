<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @yield('scriptjs')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="text-black">
    
    <header class="bg-gray-100 p-7">
        <nav class="flex flex-row justify-between space-x-5">

            <a href="#" class="text-2xl text-orange-500">Davi S.A</a>
            <span class="cursor-pointer sm:hidden block m-0 p-0">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>

            <ul
                class="flex flex-col sm:flex-row z-[1] sm:z-auto sm:static absolute space-x-3 sm:items-center justify-center text-sm md:text-base lg:text-lg bg-gray-100 sm:left-auto left-0 sm:mt-auto p-4 sm:p-0 w-full sm:w-auto gap-3 sm:pl-0 pl-7 sm:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-300">
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
                    <li>
                        <a href="{{ route('ver_carrinho') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Ver Carrinho</a>
                    </li>
                @endif

                @if (!Auth::user())
                    <li>
                        <a href="{{ route('login') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Login</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('historico') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Minhas
                            Compras</a>
                    </li>

                    <li>
                        <a href="{{ route('ver_carrinho') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Ver Carrinho</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="hover:text-orange-500 transition-all duration-100 ease-in-out">Sair</a>
                    </li>
                @endif

            </ul>

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
<script>
    function Menu(e) {
        let list = document.querySelector('ul');

        if (e.name === 'menu') {
            e.name = "close";
            list.classList.remove('top-[-400px]');
            list.classList.add('top-[80px]');
            list.classList.add('opacity-100');
        } else {
            e.name = "menu";
            list.classList.remove('top-[80px]');
            list.classList.remove('opacity-100');
            list.classList.add('top-[-400px]');
        }
    }
</script>


</html>
