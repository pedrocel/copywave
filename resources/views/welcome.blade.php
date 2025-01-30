<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CopyWave - Ferramenta de Clonagem de Páginas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link id="favicon" rel="icon" href="/img/copywave.png" type="image/x-icon"/>
  <style>
    .bg-gradient {
      background: linear-gradient(90deg, #CC54F4, #AB66FF);
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-gradient text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">CopyWave</h1>
        <!-- Menu de Navegação Responsivo -->
        <nav class="hidden md:flex items-center space-x-4">
            <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
            <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
            <a href="#pricing" class="px-4 hover:underline">Planos</a>

            <!-- Botões de Login e Cadastro -->
            <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white rounded-full hover:bg-gradient-to-l hover:from-[#AB66FF] hover:to-[#CC54F4] transition duration-300">
                Login
            </a>
            <a href="{{ route('register') }}" class="hidden lg:inline-block px-6 py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] transition duration-300">
                Cadastro
            </a>
        </nav>

        <!-- Hamburguer Menu para Mobile -->
        <div class="md:hidden">
            <button id="hamburger" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobileMenu" class="md:hidden hidden bg-gradient text-white py-4">
        <nav class="flex flex-col items-center space-y-4">
            <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
            <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
            <a href="#pricing" class="px-4 hover:underline">Planos</a>

            <!-- Botões de Login e Cadastro -->
            <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white rounded-full hover:bg-gradient-to-l hover:from-[#AB66FF] hover:to-[#CC54F4] transition duration-300">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-6 py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] transition duration-300">
                Cadastro
            </a>
        </nav>
    </div>
</header>

 <!-- Hero Section -->
<section class="bg-gradient text-white py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
    <!-- Left Column (Copy, Headline, CTA) -->
    <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0">
      <h2 class="text-5xl font-bold">Clone Páginas com Facilidade</h2>
      <p class="mt-4 text-lg">
        Apresente-se ao CopyWave, a ferramenta inteligente que permite clonar páginas da web com facilidade e precisão. Ideal para profissionais de marketing e desenvolvedores.
      </p>
      <a href="#pricing" class="mt-6 inline-block bg-gradient text-white px-6 py-3 rounded shadow hover:bg-gray-200">
        Comece agora e aumente sua produtividade
      </a>
    </div>
    <!-- Right Column (Image) -->
    <div class="md:w-1/2 text-center">
      <img src="/img/foguete.png" alt="Imagem Promocional" class="cursor-pointer transition-transform transform hover:scale-110 duration-300 rounded-lg shadow-lg">
    </div>
  </div>
</section>

  <!-- Benefits Section -->
  <section id="benefits" class="py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Por que escolher o CopyWave?</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Tecnologia de Ponta</h4>
          <p class="mt-2 text-gray-600">Nossa ferramenta clona páginas com precisão e rapidez.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Fácil de Usar</h4>
          <p class="mt-2 text-gray-600">Interface intuitiva que facilita o processo de clonagem.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Resultados Garantidos</h4>
          <p class="mt-2 text-gray-600">Economize tempo e foque no que realmente importa.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section id="how-it-works" class="bg-gray-200 py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Como o CopyWave Funciona?</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">1</div>
          <h4 class="font-bold mt-4">Acesse a Plataforma</h4>
          <p class="mt-2 text-gray-600">Registre-se e tenha acesso instantâneo ao painel intuitivo.</p>
        </div>
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">2</div>
          <h4 class="font-bold mt-4">Escolha a Página</h4>
          <p class="mt-2 text-gray-600">Selecione a página que deseja clonar e inicie o processo.</p>
        </div>
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">3</div>
          <h4 class="font-bold mt-4">Clone com Precisão</h4>
          <p class="mt-2 text-gray-600">Nossa ferramenta faz o trabalho pesado para você.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section id="pricing" class="py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Planos que Impulsionam Seus Resultados</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Básico</h4>
          <p class="mt-4 text-gray-600">Clone até 5 páginas.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$97/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Profissional</h4>
          <p class="mt-4 text-gray-600">Clone até 20 páginas.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$197/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Premium</h4>
          <p class="mt-4 text-gray-600">Clone até 50 páginas.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$297/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p>© 2025 CopyWave. Todos os direitos reservados.</p>
    </div>
  </footer>

</body>
</html>