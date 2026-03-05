<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cateclass - Sobre Nós</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-b from-blue-200 via-white to-blue-100">

  <header class="w-full py-6 px-6 flex justify-between items-center bg-blue-300">
    <a href="{{ route('inicio') }}"><h1 class="text-3xl font-bold text-blue-900">Cateclass</h1></a>
  </header>

  <section class="w-full py-14 px-6">
    <h2 class="text-4xl font-bold text-center text-blue-900 mb-8">
      Sobre Nós
    </h2>

    <p class="text-center text-lg max-w-3xl mx-auto mb-10 text-gray-700">
      O Cateclass foi desenvolvido com o objetivo de melhorar a gestão catequética,
      trazendo organização, tecnologia e simplicidade para paróquias e coordenadores.
      Este projeto foi criado por três estudantes empenhados em transformar a forma
      como a catequese se conecta, comunica e gerencia seu conteúdo.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">


      <div class="flex flex-col items-center bg-white p-6 rounded-2xl shadow-lg">
        <img src="{{ asset('img/matheus.paschuinio.jpg') }}"
              class="w-32 h-32 rounded-full object-cover border-4 border-blue-400">
        <h3 class="text-xl font-semibold mt-4">Matheus Paschuino</h3>
        <p class="text-gray-600 text-center text-sm mt-2">
            Desenvolvimento, documentação e organização geral da aplicação.
        </p>
        <div class="mt-4 space-y-1 text-center">
          <a href="https://www.linkedin.com/in/matheus-paschuinio-7630aa336/"
              class="text-blue-700 underline">LinkedIn</a><br>
          <a href="mailto:paschuiniomatheus@gmail.com"
              class="text-blue-700 underline">E-mail</a>
        </div>
      </div>

      <div class="flex flex-col items-center bg-white p-6 rounded-2xl shadow-lg">
        <img src="{{ asset('img/Pedropaulo.jpg') }}"
              class="w-32 h-32 rounded-full object-cover border-4 border-blue-400">
        <h3 class="text-xl font-semibold mt-4">Pedro Paulo</h3>
        <p class="text-gray-600 text-center text-sm mt-2">
          Desenvolvimento, documentação e organização geral da aplicação.
        </p>
        <div class="mt-4 space-y-1 text-center">
          <a href="https://www.linkedin.com/in/pedro-paulo-00114a256/"
              class="text-blue-700 underline">LinkedIn</a><br>
          <a href="mailto:pedropaulogoncalves58@gmail.com"
              class="text-blue-700 underline">E-mail</a>
        </div>
      </div>

    </div>
  </section>

  <footer class="w-full text-center py-6 bg-blue-300 mt-10">
    <p class="text-blue-900 font-semibold">
      © 2025 Cateclass — Todos os direitos reservados
    </p>
  </footer>

</body>
</html>