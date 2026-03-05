<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts - Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- W3Schools - Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- TailwindCSS CLI -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/png" href="{{ asset('img/logo-escolink.png') }}">

    <title>São Benedito | Início</title>

</head>

<body>

    <header 
        class="
            flex items-center justify-between p-[20px] px-[100px] border-b-1 border-black

            max-md:flex-col gap-[30px]
        " 
        id="inicio"
    >


        <img class="w-[261px]" src="{{ asset('img/logo-no-bg.png') }}" alt="Logo Paróquia São Benedito">

        <nav>

            <ul class="flex gap-[30px] uppercase font-bold">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Paróquia</a></li>
                <li><a href="#catequese">catequese</a></li>
                <li><a class="uppercase" href="{{ route('sobre') }}">Sobre Nós</a></li>
            </ul>

        </nav>

    </header>

    <section
        class="
        flex items-center justify-center 
        h-[calc(100vh_-_87px)] bg-cover bg-center relative mb-[200px]"
        style="background-image: url('{{ asset('img/igreja-interna.jpg') }}')"
      >
    </section>

    <main>

        <section id="sobre">

            <h1 class="text-[32px] text-center font-bold mb-[50px]">Sobre a Paróquia</h1>

            <div 
                class="
                    flex justify-center gap-[100px] mb-[200px]

                    max-lg:flex-col max-lg:items-center
                "
            >
                <div 
                    class="
                        w-[500px]

                        max-md:w-[300px]
                    "
                >
                    <p class="text-[18px] text-justify mb-[20px]">A Paróquia São Benedito de Jaú foi criada em 10 de março de 1972, pertencendo à Diocese de Jaú (SP). Desde então, é um lugar de fé, devoção e serviço, onde a comunidade se reúne para celebrar os sacramentos, viver a fraternidade e crescer na vida cristã.</p>

                    <p class="text-[18px] text-justify mb-[20px]">Inspirada no testemunho de São Benedito, o Santo da humildade e da caridade, a paróquia busca ser um espaço de acolhida e esperança, promovendo a evangelização, o amor ao próximo e o compromisso com a vida comunitária.</p>

                    <p class="text-[18px] text-justify mb-[20px]">Ao longo de sua história, a Paróquia São Benedito tem sido marcada pela presença ativa de leigos e leigas, pastorais e movimentos que, junto aos sacerdotes, trabalham com dedicação para anunciar o Evangelho e servir aos irmãos mais necessitados.</p>
                </div>
                <div>
                    <img class="w-[500px] rounded-[50%]" src="{{ asset('img/logotipo.jpg') }}" alt="">
                </div>
            </div>

            <div class="bg-[#33383C] py-[50px] text-[#fff] mb-[100px]">

                <h2 class="text-[32px] text-center font-bold mb-[50px]">Sobre o Pároco</h2>

                <div 
                    class="
                        flex justify-center items-center gap-[100px]
                        
                        max-lg:flex-col
                        "
                >

                    <div>
                        <img class="w-[600px] rounded-[20px]" src="{{ asset('img/pe_jose_reinaldo_vieira.jpg') }}" alt="">
                    </div>

                    <div 
                        class="
                            w-[500px]
                            
                            max-md:w-[300px]"
                    >
                        <p class="text-[18px] text-justify mb-[20px]">O Pe. José Reinaldo Vieira nasceu em 2 de agosto de 1974 e foi ordenado sacerdote em 22 de novembro de 2013, pela Diocese de Jaú. Desde então, vem exercendo seu ministério com grande zelo, simplicidade e amor à Igreja, servindo ao povo de Deus em diversas comunidades da diocese.</p>

                        <p class="text-[18px] text-justify mb-[20px]">Em 2025, foi nomeado pároco da Paróquia São Benedito de Jaú, assumindo a missão de conduzir esta comunidade com fé, caridade e espírito de serviço. Sua posse canônica ocorreu durante uma solene celebração presidida por Dom Francisco Carlos da Silva, bispo diocesano.</p>

                        <p class="text-[18px] text-justify mb-[20px]">Pe. José Reinaldo é conhecido por sua dedicação pastoral, espírito acolhedor e atenção às pessoas. Com simplicidade e firmeza, ele convida toda a comunidade a caminhar junto, fortalecendo a vida paroquial, a espiritualidade e o serviço aos irmãos, especialmente aos mais necessitados, seguindo o exemplo de São Benedito, padroeiro da paróquia.</p>
                    </div>
                </div>

            </div>

        </section>

        <!-- Catequese e Crisma -->
        <section 
            class="flex flex-col items-center px-[100px] mb-[100px]" id="catequese">

            <h2 class="text-center text-[32px] font-bold mb-[50px]">Eucaristia e Crisma</h2>

            <a class="bg-[#00ff00] px-[20px] py-[7px] rounded-[30px]" href="/cateclass-site/app/login">Log In</a>

        </section>

    </main>

    <footer class="text-[#fff]">

        <div 
            class="
                bg-[#33383C] py-[100px] px-[120px] relative bottom-0 flex justify-between
                items-center

                max-lg:px-[0px]
                max-md:flex-col max-md:gap-[70px]
                "
        >
            <div class="text-center w-[400px]">
                <p class="uppercase font-bold mb-[20px]">Localização</p>
                <p>R. Prudente de Morães, 569 <br> Vila Nova</p>
            </div>
            <div class="text-center w-[400px]">
                <p class="uppercase font-bold mb-[20px]">Redes sociais</p>
                <div class="flex justify-center gap-[20px]">

                    <a class="flex justify-center items-center w-[50px] h-[50px] border-1 p-[20px] rounded-[50%]"  href="https://www.instagram.com/saobeneditojau/" target="_blank">
                        <i class="fa fa-instagram" style="font-size: 30px;"></i>
                    </a>

                    <a class="flex justify-center items-center w-[50px] h-[50px] border-1 p-[20px] rounded-[50%]" href="https://www.facebook.com/benditobeneditojau/?locale=pt_BR" target="_blank">
                        <i class="fa fa-facebook" style="font-size: 30px;"></i>
                    </a>

                    <a class="flex justify-center items-center w-[50px] h-[50px] border-1 p-[20px] rounded-[50%]" href="https://www.youtube.com/c/paroquiasaobeneditojau" target="_blank">
                        <i class="fa fa-youtube-play" style="font-size: 30px;"></i>
                    </a>

                </div>
            </div>
            <div class="text-center w-[400px]">
                <p class="uppercase font-bold mb-[20px]">Páginas</p>
                <ul class="flex flex-col gap-[10px]">
                    <li><a class="uppercase" href="#inicio">Início</a></li>
                    <li><a class="uppercase" href="#sobre">Paróquia</a></li>                    
                    <li><a class="uppercase" href="#catequese">Catequese</a></li>
                    <li><a class="uppercase" href="{{ route('sobre') }}">Sobre Nós</a></li>
                </ul>
            </div>
        </div>

        <div class="relative bottom-0 py-[20px] flex justify-center bg-[#505050]">
            <p>2025 &copy; - Paróquia São Benedito</p>
        </div>

    </footer>

</body>

</html>