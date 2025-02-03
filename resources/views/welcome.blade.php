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
      <h1 class="text-2xl font-bold p-3">CopyWave</h1>
      
      <!-- Menu Desktop -->
      <nav class="hidden md:flex items-center space-x-4">
        <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
        <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
        <a href="#pricing" class="px-4 hover:underline">Planos</a>
        <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white rounded-full hover:bg-gradient-to-l hover:from-[#AB66FF] hover:to-[#CC54F4] transition duration-300">
          Login
        </a>
        <a href="{{ route('register') }}" class="hidden lg:inline-block px-6 py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] transition duration-300">
          Cadastro
        </a>
      </nav>

      <!-- Hamburguer Menu Mobile -->
      <div class="md:hidden">
        <button id="hamburger" class="text-white focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobileMenu" class="md:hidden hidden bg-gradient text-white py-4">
      <nav class="flex flex-col items-center space-y-6">
        <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
        <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
        <a href="#pricing" class="px-4 hover:underline">Planos</a>
        
        <!-- Botões Mobile -->
        <div class="w-full px-4 space-y-4">
          <a href="{{ route('login') }}" class="block w-full text-center bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white px-6 py-2 rounded-full hover:bg-gradient-to-l hover:from-[#AB66FF] hover:to-[#CC54F4] transition duration-300">
            Login
          </a>
          <a href="{{ route('register') }}" class="block w-full text-center border-2 border-white text-white px-6 py-2 rounded-full hover:bg-white hover:text-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] transition duration-300">
            Cadastro
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-gradient text-white py-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
      <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0">
        <h2 class="text-4xl md:text-5xl font-bold leading-tight">Clone Páginas com Facilidade</h2>
        <p class="mt-4 text-lg md:text-xl">
          Ferramenta inteligente para clonagem precisa de páginas web. Ideal para marketers e desenvolvedores.
        </p>
        <a href="#pricing" class="mt-8 inline-block bg-white text-[#CC54F4] px-8 py-3 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300">
          Comece Agora
        </a>
      </div>
      <div class="md:w-1/2">
        <img src="/img/foguete.png" alt="Foguete" class="mx-auto w-4/5 md:w-full animate-float">
      </div>
    </div>
  </section>

  <!-- Hero Section with Image -->
<section class="relative h-[500px] md:h-[600px] flex items-center justify-center overflow-hidden">
  <!-- Background Image -->
  <img 
    src="http://127.0.0.1:8000/img/copywave.png" 
    alt="CopyWave" 
    class="absolute inset-0 w-full h-full object-cover object-center"
  />

  <!-- Overlay Gradient -->
  <div class="absolute inset-0 bg-gradient-to-r from-[#CC54F4]/90 to-[#AB66FF]/90"></div>

  <!-- Content -->
  <div class="relative z-10 text-center px-4">
    <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in">
      Transforme Suas Ideias em Realidade
    </h2>
    <p class="text-lg md:text-xl text-white mb-8 max-w-2xl mx-auto animate-fade-in-up">
      Com o CopyWave, você tem a ferramenta perfeita para clonar páginas com precisão e eficiência. Ideal para marketers, desenvolvedores e empreendedores.
    </p>
    <a 
      href="#pricing" 
      class="inline-block bg-white text-[#CC54F4] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 animate-fade-in-up"
    >
      Comece Agora
    </a>
  </div>
</section>

  <!-- Benefits Section -->
  <section id="benefits" class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <h3 class="text-3xl font-bold text-center mb-12">Vantagens Exclusivas</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-6 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition-shadow">
          <div class="w-12 h-12 bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] rounded-lg mb-4 flex items-center justify-center text-white text-xl">🚀</div>
          <h4 class="text-xl font-semibold mb-2">Performance Otimizada</h4>
          <p class="text-gray-600">Clonagem rápida e eficiente mesmo em grandes projetos</p>
        </div>
        <!-- Adicione mais 2 cards seguindo o mesmo padrão -->
      </div>
    </div>
  </section>
  <!-- Pricing Section -->
  <section id="pricing" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-center mb-12">Nossos Planos</h3>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach($plans as $plan)
                <div class="w-full md:w-80 bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <h4 class="text-2xl font-bold mb-2">{{ $plan->name }}</h4>
                        <p class="text-gray-600 mb-6">{{ $plan->description }}</p>
                        <div class="text-4xl font-bold text-[#CC54F4] mb-6">R${{ number_format($plan->value, 2, ',', '.') }}</div>
                        <a href="{{ $plan->link_checkout_external }}" class="block w-full bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white py-3 rounded-lg hover:from-[#AB66FF] hover:to-[#CC54F4] transition">
                            Assinar Agora
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
      <p class="mb-4">© 2024 CopyWave. Todos os direitos reservados.</p>
      <div class="flex justify-center space-x-4">
        <a href="#" class="hover:text-[#CC54F4] transition">Termos de Uso</a>
        <a href="#" class="hover:text-[#CC54F4] transition">Política de Privacidade</a>
      </div>
    </div>
  </footer>

  <script>
    // Menu Mobile Toggle
    document.getElementById('hamburger').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>
</html>