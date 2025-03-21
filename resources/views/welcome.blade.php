<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CopyWave - Reproduza Páginas de Vendas em Segundos</title>
  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#9d4edd',
          }
        }
      }
    }
  </script>
  <!-- Font Awesome para ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="flex min-h-screen flex-col">
  <!-- Navbar -->
  <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/logo.svg-N1dsNZnxE9ulqvlyk6TCPzrvM1wkfA.png" alt="CopyWave Logo" class="w-10 h-10 mr-2">
        <span class="text-xl font-bold text-primary">CopyWave</span>
      </div>
      
      <div class="hidden md:flex items-center space-x-6">
        <a href="#features" class="text-gray-700 hover:text-primary transition">Recursos</a>
        <a href="#how-it-works" class="text-gray-700 hover:text-primary transition">Como Funciona</a>
        <a href="#pricing" class="text-gray-700 hover:text-primary transition">Preços</a>
        <a href="#testimonials" class="text-gray-700 hover:text-primary transition">Depoimentos</a>
        <a href="#" class="bg-primary hover:bg-opacity-90 text-white px-4 py-2 rounded-md">Começar Agora</a>
      </div>
      
      <button class="md:hidden text-gray-700" id="mobile-menu-button">
        <div class="space-y-1">
          <div class="w-6 h-0.5 bg-gray-700"></div>
          <div class="w-6 h-0.5 bg-gray-700"></div>
          <div class="w-6 h-0.5 bg-gray-700"></div>
        </div>
      </button>
    </div>
    
    <!-- Mobile menu (hidden by default) -->
    <div class="md:hidden bg-white border-b border-gray-200 py-4 hidden" id="mobile-menu">
      <div class="container mx-auto px-4 flex flex-col space-y-3">
        <a href="#features" class="text-gray-700 hover:text-primary transition py-2">Recursos</a>
        <a href="#how-it-works" class="text-gray-700 hover:text-primary transition py-2">Como Funciona</a>
        <a href="#pricing" class="text-gray-700 hover:text-primary transition py-2">Preços</a>
        <a href="#testimonials" class="text-gray-700 hover:text-primary transition py-2">Depoimentos</a>
        <a href=" {{ route('login')}}" class="bg-primary hover:bg-opacity-90 text-white py-2 px-4 rounded-md text-center">Login</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative overflow-hidden bg-gradient-to-br from-purple-900 via-purple-800 to-purple-700 text-white py-20 md:py-32">
    <!-- Background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
      <div class="absolute top-10 left-10 w-40 h-40 rounded-full bg-purple-400"></div>
      <div class="absolute bottom-10 right-10 w-60 h-60 rounded-full bg-purple-300"></div>
      <div class="absolute top-1/3 right-1/4 w-20 h-20 rounded-full bg-purple-200"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2 mb-10 lg:mb-0">
          <span class="bg-purple-300 text-purple-900 mb-4 py-1.5 px-3 rounded-full text-sm font-medium inline-block">
            NOVO: Reproduza páginas em 1 clique!
          </span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight mt-4">
            Reproduza Páginas de Vendas em <span class="text-purple-300">Segundos</span>, Não em Horas
          </h1>
          <p class="text-xl mb-8 text-purple-100">
            O CopyWave revoluciona o trabalho dos afiliados, permitindo que você reproduza páginas de venda
            instantaneamente e comece a vender mais rápido que seus concorrentes.
          </p>
          
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#" class="bg-purple-300 text-purple-900 hover:bg-purple-200 font-bold px-6 py-3 rounded-md inline-flex items-center justify-center">
              Começar Gratuitamente <i class="fas fa-arrow-right ml-2"></i>
            </a>
            <a href="#" class="border border-purple-300 text-purple-300 hover:bg-white/10 px-6 py-3 rounded-md inline-flex items-center justify-center">
              Ver Demonstração
            </a>
          </div>
          
          <div class="flex items-center mt-8 text-purple-200">
            <div class="flex -space-x-2 mr-3">
              <div class="w-8 h-8 rounded-full bg-purple-400 border-2 border-purple-700"></div>
              <div class="w-8 h-8 rounded-full bg-purple-400 border-2 border-purple-700"></div>
              <div class="w-8 h-8 rounded-full bg-purple-400 border-2 border-purple-700"></div>
              <div class="w-8 h-8 rounded-full bg-purple-400 border-2 border-purple-700"></div>
            </div>
            <p>+1,500 afiliados já economizam tempo com o CopyWave</p>
          </div>
        </div>
        
        <div class="lg:w-1/2 flex justify-center">
          <div class="relative">
            <div class="absolute -inset-0.5 bg-purple-300 rounded-lg blur opacity-50"></div>
            <div class="relative bg-white rounded-lg shadow-xl overflow-hidden">
              <img src="/images/dashboard.png" alt="CopyWave Dashboard" class="w-full h-auto">
            </div>
            
            <!-- Floating elements -->
            <div class="absolute -top-4 -right-4 bg-purple-300 text-purple-900 rounded-full px-3 py-1 text-sm font-bold shadow-lg">
              10x mais rápido!
            </div>
            <div class="absolute top-4 left-4 z-10">
              <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/logo.svg-N1dsNZnxE9ulqvlyk6TCPzrvM1wkfA.png" alt="CopyWave Logo" class="w-20 h-20 drop-shadow-lg">
            </div>
            <div class="absolute -bottom-4 -left-4 bg-white text-purple-900 rounded-full px-3 py-1 text-sm font-bold shadow-lg flex items-center">
              <i class="fas fa-clock mr-1 text-xs"></i> Economize 5h por página
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-10 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div>
          <p class="text-3xl md:text-4xl font-bold text-primary mb-1" id="counter1">10x</p>
          <p class="text-gray-600">Mais Rápido</p>
        </div>
        <div>
          <p class="text-3xl md:text-4xl font-bold text-primary mb-1" id="counter2">1500+</p>
          <p class="text-gray-600">Afiliados Ativos</p>
        </div>
        <div>
          <p class="text-3xl md:text-4xl font-bold text-primary mb-1" id="counter3">25000+</p>
          <p class="text-gray-600">Páginas Reproduzidas</p>
        </div>
        <div>
          <p class="text-3xl md:text-4xl font-bold text-primary mb-1" id="counter4">97%</p>
          <p class="text-gray-600">Satisfação</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Profit Calculator Section -->
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="bg-purple-100 text-primary mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">CALCULADORA</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 mt-4">
          Quanto Dinheiro Você Está <span class="text-primary">Deixando Passar?</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Use nossa calculadora para descobrir quanto dinheiro você está deixando na mesa por não usar o CopyWave
          para reproduzir páginas de vendas rapidamente.
        </p>
      </div>
      
      <!-- Calculator Tabs -->
      <div class="max-w-4xl mx-auto">
        <div class="mb-8 bg-white rounded-lg p-1 inline-flex w-full">
          <button class="w-1/2 py-2 px-4 rounded-lg bg-primary text-white" id="money-tab">
            <i class="fas fa-dollar-sign mr-2"></i> Calculadora de Dinheiro
          </button>
          <button class="w-1/2 py-2 px-4 rounded-lg" id="time-tab">
            <i class="fas fa-clock mr-2"></i> Calculadora de Tempo
          </button>
        </div>
        
        <!-- Money Calculator (visible by default) -->
        <div id="money-calculator" class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="border border-gray-200 rounded-lg bg-white">
            <div class="p-6">
              <h3 class="text-2xl font-bold mb-6 text-gray-800">Insira seus dados:</h3>
              
              <div class="space-y-6">
                <div>
                  <label for="hours" class="text-gray-700 mb-2 block">Horas gastas criando páginas por semana:</label>
                  <input type="range" id="hours" min="1" max="40" value="5" class="w-full">
                  <div class="flex justify-between">
                    <span class="text-sm text-gray-500">1 hora</span>
                    <span class="text-lg font-bold text-primary" id="hours-value">5 horas</span>
                    <span class="text-sm text-gray-500">40 horas</span>
                  </div>
                </div>
                
                <div>
                  <label for="hourlyRate" class="text-gray-700 mb-2 block">Quanto vale sua hora (R$):</label>
                  <input type="number" id="hourlyRate" min="10" value="50" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md">
                </div>
                
                <div>
                  <label for="commissionRate" class="text-gray-700 mb-2 block">Taxa de comissão média (%):</label>
                  <input type="number" id="commissionRate" min="1" max="100" value="30" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md">
                </div>
                
                <div>
                  <label for="averagePrice" class="text-gray-700 mb-2 block">Preço médio dos produtos (R$):</label>
                  <input type="number" id="averagePrice" min="1" value="197" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md">
                </div>
              </div>
            </div>
          </div>
          
          <div class="border-2 border-primary rounded-lg bg-purple-50">
            <div class="p-6">
              <h3 class="text-2xl font-bold mb-6 text-gray-800">Seu prejuízo semanal:</h3>
              
              <div class="space-y-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Valor do seu tempo perdido:</p>
                  <p class="text-3xl font-bold text-red-500" id="money-lost">R$ 250</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Vendas potenciais perdidas:</p>
                  <p class="text-3xl font-bold text-primary" id="potential-sales">3 vendas</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Comissões não recebidas:</p>
                  <p class="text-3xl font-bold text-green-600" id="potential-commission">R$ 177</p>
                </div>
                
                <div class="bg-purple-100 p-4 rounded-lg border border-primary">
                  <p class="text-gray-800 font-medium">Prejuízo total estimado:</p>
                  <p class="text-4xl font-bold text-red-600" id="total-loss">R$ 427</p>
                  <p class="text-sm text-gray-600 mt-2">
                    Este é o valor que você está perdendo toda semana por não usar o CopyWave para reproduzir páginas
                    de vendas rapidamente.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Time Calculator (hidden by default) -->
        <div id="time-calculator" class="grid grid-cols-1 md:grid-cols-2 gap-8 hidden">
          <div class="border border-gray-200 rounded-lg bg-white">
            <div class="p-6">
              <h3 class="text-2xl font-bold mb-6 text-gray-800">Insira seus dados:</h3>
              
              <div class="space-y-6">
                <div>
                  <label for="pagesPerMonth" class="text-gray-700 mb-2 block">Quantas páginas você cria por mês:</label>
                  <input type="range" id="pagesPerMonth" min="1" max="30" value="5" class="w-full">
                  <div class="flex justify-between">
                    <span class="text-sm text-gray-500">1 página</span>
                    <span class="text-lg font-bold text-primary" id="pages-value">5 páginas</span>
                    <span class="text-sm text-gray-500">30 páginas</span>
                  </div>
                </div>
                
                <div>
                  <label for="hoursPerPage" class="text-gray-700 mb-2 block">Horas gastas para criar cada página:</label>
                  <input type="range" id="hoursPerPage" min="1" max="10" value="3" step="0.5" class="w-full">
                  <div class="flex justify-between">
                    <span class="text-sm text-gray-500">1 hora</span>
                    <span class="text-lg font-bold text-primary" id="hours-per-page-value">3 horas</span>
                    <span class="text-sm text-gray-500">10 horas</span>
                  </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                  <p class="text-gray-700">
                    Com o CopyWave, você pode criar a mesma página em apenas
                    <span class="font-bold text-primary">10 minutos</span> em média!
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="border-2 border-primary rounded-lg bg-purple-50">
            <div class="p-6">
              <h3 class="text-2xl font-bold mb-6 text-gray-800">Tempo que você economizaria:</h3>
              
              <div class="space-y-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Horas gastas atualmente por mês:</p>
                  <p class="text-3xl font-bold text-red-500" id="hours-per-month">15 horas</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Horas economizadas por mês com CopyWave:</p>
                  <p class="text-3xl font-bold text-primary" id="hours-saved">14.2 horas</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                  <p class="text-gray-600 mb-1">Dias de trabalho economizados por ano:</p>
                  <p class="text-3xl font-bold text-green-600" id="days-per-year">21 dias</p>
                </div>
                
                <div class="bg-purple-100 p-4 rounded-lg border border-primary">
                  <p class="text-gray-800 font-medium">O que você poderia fazer com esse tempo extra?</p>
                  <ul class="mt-2 space-y-1 text-gray-700">
                    <li class="flex items-center">
                      <i class="fas fa-chart-line text-primary mr-2"></i>
                      Promover mais produtos
                    </li>
                    <li class="flex items-center">
                      <i class="fas fa-chart-line text-primary mr-2"></i>
                      Criar estratégias de marketing
                    </li>
                    <li class="flex items-center">
                      <i class="fas fa-chart-line text-primary mr-2"></i>
                      Estudar novas técnicas de vendas
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="mt-8 text-center">
          <a href="#" class="bg-primary hover:bg-opacity-90 text-white px-6 py-3 rounded-md inline-block font-medium">
            Comece a Economizar Agora
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <span class="bg-purple-100 text-primary mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">RECURSOS</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 mt-4">
          Recursos que <span class="text-primary">Revolucionam</span> seu Trabalho
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          O CopyWave foi desenvolvido pensando nas necessidades reais dos afiliados. Nossa plataforma oferece
          ferramentas poderosas que economizam seu tempo e aumentam seus resultados.
        </p>
      </div>
      
      <!-- Feature Tabs -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div>
          <div class="grid grid-cols-2 w-full mb-8 bg-gray-100 rounded-lg p-1">
            <button class="flex items-center justify-center py-6 bg-white rounded-lg shadow" id="clone-tab">
              <i class="fas fa-copy mr-2"></i> Reprodução
            </button>
            <button class="flex items-center justify-center py-6" id="edit-tab">
              <i class="fas fa-edit mr-2"></i> Edição
            </button>
          </div>
          
          <div class="grid grid-cols-2 w-full bg-gray-100 rounded-lg p-1">
            <button class="flex items-center justify-center py-6" id="track-tab">
              <i class="fas fa-chart-bar mr-2"></i> Rastreamento
            </button>
            <button class="flex items-center justify-center py-6" id="speed-tab">
              <i class="fas fa-clock mr-2"></i> Tempo
            </button>
          </div>
        </div>
        
        <div class="space-y-4">
          <!-- Clone Feature (visible by default) -->
          <div id="clone-content" class="border-2 border-primary rounded-lg">
            <div class="p-6">
              <div class="flex items-start mb-4">
                <div class="mr-4 bg-primary/10 p-3 rounded-lg">
                  <i class="fas fa-copy text-4xl text-primary"></i>
                </div>
                <div>
                  <h3 class="text-2xl font-bold text-gray-800">Reproduza em Segundos</h3>
                  <p class="text-gray-600">Duplique páginas de vendas, funis e typebots com apenas um clique, sem conhecimento técnico necessário</p>
                </div>
              </div>
              
              <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h4 class="font-bold text-gray-800 mb-2">Benefícios:</h4>
                <ul class="space-y-2">
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Aumente sua produtividade em até 10x</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Elimine a necessidade de contratar designers</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Comece a vender novos produtos em minutos, não dias</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Edit Feature (hidden by default) -->
          <div id="edit-content" class="border-2 border-primary rounded-lg hidden">
            <div class="p-6">
              <div class="flex items-start mb-4">
                <div class="mr-4 bg-primary/10 p-3 rounded-lg">
                  <i class="fas fa-edit text-4xl text-primary"></i>
                </div>
                <div>
                  <h3 class="text-2xl font-bold text-gray-800">Edição Simplificada</h3>
                  <p class="text-gray-600">Interface intuitiva que permite alterar textos, imagens e links sem conhecimento técnico</p>
                </div>
              </div>
              
              <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h4 class="font-bold text-gray-800 mb-2">Benefícios:</h4>
                <ul class="space-y-2">
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Personalize páginas sem conhecer código</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Editor visual intuitivo e fácil de usar</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Adapte as páginas para seu público específico</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Track Feature (hidden by default) -->
          <div id="track-content" class="border-2 border-primary rounded-lg hidden">
            <div class="p-6">
              <div class="flex items-start mb-4">
                <div class="mr-4 bg-primary/10 p-3 rounded-lg">
                  <i class="fas fa-chart-bar text-4xl text-primary"></i>
                </div>
                <div>
                  <h3 class="text-2xl font-bold text-gray-800">Rastreamento de Conversões</h3>
                  <p class="text-gray-600">Acompanhe o desempenho das suas páginas reproduzidas com métricas detalhadas em tempo real</p>
                </div>
              </div>
              
              <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h4 class="font-bold text-gray-800 mb-2">Benefícios:</h4>
                <ul class="space-y-2">
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Monitore taxas de conversão em tempo real</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Identifique quais páginas geram mais vendas</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Otimize suas campanhas com dados precisos</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Speed Feature (hidden by default) -->
          <div id="speed-content" class="border-2 border-primary rounded-lg hidden">
            <div class="p-6">
              <div class="flex items-start mb-4">
                <div class="mr-4 bg-primary/10 p-3 rounded-lg">
                  <i class="fas fa-clock text-4xl text-primary"></i>
                </div>
                <div>
                  <h3 class="text-2xl font-bold text-gray-800">Economize Tempo</h3>
                  <p class="text-gray-600">O que levaria horas para recriar, agora leva apenas segundos. Foque no que realmente importa: vender!</p>
                </div>
              </div>
              
              <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h4 class="font-bold text-gray-800 mb-2">Benefícios:</h4>
                <ul class="space-y-2">
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Reduza o tempo de criação em até 90%</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Lance campanhas mais rapidamente que seus concorrentes</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-sparkles text-primary mr-2 mt-1"></i>
                    <span class="text-gray-700">Dedique mais tempo às estratégias de marketing</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Feature Images -->
      <div id="feature-images">
        <div id="clone-image" class="relative rounded-lg overflow-hidden shadow-xl border-2 border-primary">
          <img src="/images/clone-process.png" alt="Processo de Reprodução" class="w-full h-auto">
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h3 class="text-2xl font-bold text-white">Reproduza em Segundos</h3>
            <p class="text-white/90">Duplique páginas de vendas, funis e typebots com apenas um clique, sem conhecimento técnico necessário</p>
          </div>
        </div>
        
        <div id="edit-image" class="relative rounded-lg overflow-hidden shadow-xl border-2 border-primary hidden">
          <img src="/images/dashboard.png" alt="Edição Simplificada" class="w-full h-auto">
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h3 class="text-2xl font-bold text-white">Edição Simplificada</h3>
            <p class="text-white/90">Interface intuitiva que permite alterar textos, imagens e links sem conhecimento técnico</p>
          </div>
        </div>
        
        <div id="track-image" class="relative rounded-lg overflow-hidden shadow-xl border-2 border-primary hidden">
          <img src="/images/affiliate-marketing.png" alt="Rastreamento de Conversões" class="w-full h-auto">
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h3 class="text-2xl font-bold text-white">Rastreamento de Conversões</h3>
            <p class="text-white/90">Acompanhe o desempenho das suas páginas reproduzidas com métricas detalhadas em tempo real</p>
          </div>
        </div>
        
        <div id="speed-image" class="relative rounded-lg overflow-hidden shadow-xl border-2 border-primary hidden">
          <img src="/images/dashboard.png" alt="Economize Tempo" class="w-full h-auto">
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
            <h3 class="text-2xl font-bold text-white">Economize Tempo</h3>
            <p class="text-white/90">O que levaria horas para recriar, agora leva apenas segundos. Foque no que realmente importa: vender!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section id="how-it-works" class="py-20 bg-gray-50 relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-5">
      <div class="absolute top-10 left-10 w-40 h-40 rounded-full bg-primary"></div>
      <div class="absolute bottom-10 right-10 w-60 h-60 rounded-full bg-primary"></div>
      <div class="absolute top-1/3 right-1/4 w-20 h-20 rounded-full bg-primary"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
      <div class="text-center mb-16">
        <span class="bg-purple-100 text-primary mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">PROCESSO SIMPLES</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 mt-4">
          Como o <span class="text-primary">CopyWave</span> Funciona
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Um processo simples e eficiente que transforma horas de trabalho em apenas alguns cliques. Veja como é
          fácil usar nossa plataforma:
        </p>
      </div>
      
      <div class="max-w-5xl mx-auto">
        <div class="relative">
          <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2 z-0"></div>
          
          <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
            <div class="flex flex-col items-center">
              <div class="relative mb-4">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shadow-lg">
                  <i class="fas fa-mouse-pointer text-white text-2xl"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center font-bold text-sm">
                  1
                </div>
              </div>
              <h3 class="text-xl font-bold mb-2 text-gray-800">Cole a URL</h3>
              <p class="text-gray-600 text-center">Insira a URL da página que deseja reproduzir</p>
            </div>
            
            <div class="flex flex-col items-center">
              <div class="relative mb-4">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shadow-lg">
                  <i class="fas fa-copy text-white text-2xl"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center font-bold text-sm">
                  2
                </div>
              </div>
              <h3 class="text-xl font-bold mb-2 text-gray-800">Reproduza com 1 Clique</h3>
              <p class="text-gray-600 text-center">Nosso sistema espelha toda a página automaticamente</p>
            </div>
            
            <div class="flex flex-col items-center">
              <div class="relative mb-4">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shadow-lg">
                  <i class="fas fa-magic text-white text-2xl"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center font-bold text-sm">
                  3
                </div>
              </div>
              <h3 class="text-xl font-bold mb-2 text-gray-800">Personalize</h3>
              <p class="text-gray-600 text-center">Edite textos, imagens e links conforme necessário</p>
            </div>
            
            <div class="flex flex-col items-center">
              <div class="relative mb-4">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shadow-lg">
                  <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center font-bold text-sm">
                  4
                </div>
              </div>
              <h3 class="text-xl font-bold mb-2 text-gray-800">Publique & Venda</h3>
              <p class="text-gray-600 text-center">Comece a promover e gerar comissões</p>
            </div>
          </div>
        </div>
        
        <div class="mt-16 text-center">
          <a href="#" class="bg-primary hover:bg-opacity-90 text-white px-6 py-3 rounded-md inline-flex items-center justify-center">
            Experimente Agora <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Demo Video Section -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="bg-purple-100 text-primary mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">DEMONSTRAÇÃO</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 mt-4">
          Veja o CopyWave em <span class="text-primary">Ação</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Assista como é fácil reproduzir uma página de vendas completa em menos de 60 segundos
          e começar a promover como afiliado imediatamente.
        </p>
      </div>
      
      <div class="max-w-5xl mx-auto">
        <div class="relative rounded-xl overflow-hidden shadow-2xl border-2 border-primary">
          <img src="/images/dashboard.png" alt="CopyWave Demo" class="w-full h-auto">
          <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <button class="w-20 h-20 rounded-full bg-primary/90 hover:bg-primary text-white flex items-center justify-center">
              <i class="fas fa-play text-3xl"></i>
            </button>
          </div>
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
            <h3 class="text-2xl font-bold text-white">Reproduza uma Página em 60 Segundos</h3>
            <p class="text-white/90">Veja como é fácil usar o CopyWave para duplicar e personalizar páginas</p>
          </div>
        </div>
        
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="p-4 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all cursor-pointer">
            <h3 class="font-bold text-gray-800">Reproduza Qualquer Página</h3>
            <p class="text-gray-600 text-sm">Veja como é fácil duplicar qualquer página da web com apenas um clique</p>
          </div>
          <div class="p-4 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all cursor-pointer">
            <h3 class="font-bold text-gray-800">Edição Simplificada</h3>
            <p class="text-gray-600 text-sm">Aprenda a personalizar textos, imagens e links sem conhecimento técnico</p>
          </div>
          <div class="p-4 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all cursor-pointer">
            <h3 class="font-bold text-gray-800">Publicação Instantânea</h3>
            <p class="text-gray-600 text-sm">Descubra como publicar sua página e começar a promover em segundos</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="py-20 bg-purple-900 text-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="bg-purple-300 text-purple-900 mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">DEPOIMENTOS</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 mt-4">
          O Que Nossos <span class="text-purple-300">Usuários</span> Dizem
        </h2>
        <p class="text-lg text-purple-100 max-w-3xl mx-auto">
          Centenas de afiliados já transformaram seu trabalho com o CopyWave. Veja o que eles têm a dizer:
        </p>
      </div>
      
      <div class="relative max-w-5xl mx-auto">
        <div class="overflow-hidden">
          <div class="flex">
            <div class="w-full flex-shrink-0 px-4">
              <div class="bg-purple-800 border-purple-700 shadow-xl rounded-lg">
                <div class="p-8">
                  <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                    <div class="md:w-1/4 flex flex-col items-center">
                      <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-purple-300 mb-3">
                        <img src="/images/testimonial-1.png" alt="Carlos Silva" class="w-full h-full object-cover">
                      </div>
                      <h3 class="font-bold text-lg text-white text-center">Carlos Silva</h3>
                      <p class="text-purple-300 text-sm text-center">Afiliado Profissional</p>
                      <div class="flex mt-2">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                      </div>
                    </div>
                    
                    <div class="md:w-3/4">
                      <p class="text-xl text-white italic">
                        "O CopyWave revolucionou meu trabalho como afiliado. Antes eu gastava 3-4 horas recriando cada página de vendas, agora faço isso em minutos. Minha produtividade aumentou 10x e meus ganhos triplicaram no último mês!"
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="flex justify-center mt-6 space-x-2">
          <button class="w-3 h-3 rounded-full bg-primary" aria-label="Go to testimonial 1"></button>
          <button class="w-3 h-3 rounded-full bg-purple-300" aria-label="Go to testimonial 2"></button>
          <button class="w-3 h-3 rounded-full bg-purple-300" aria-label="Go to testimonial 3"></button>
        </div>
        
        <button class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 bg-white text-primary border-primary hover:bg-primary hover:text-white md:-translate-x-6 w-10 h-10 rounded-full flex items-center justify-center">
          <i class="fas fa-chevron-left"></i>
        </button>
        
        <button class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 bg-white text-primary border-primary hover:bg-primary hover:text-white md:translate-x-6 w-10 h-10 rounded-full flex items-center justify-center">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section id="pricing" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="bg-purple-100 text-primary mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">PREÇOS</span>
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 mt-4">
          Planos <span class="text-primary">Poderosos</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Escolha o plano ideal para suas necessidades e comece a economizar tempo hoje mesmo. Todos os planos
          incluem nossa garantia de satisfação de 7 dias.
        </p>
      </div>
      
      <div class="flex justify-center mb-8">
        <div class="flex items-center space-x-2 bg-gray-100 p-1 rounded-full">
          <span class="px-4 py-2 rounded-full bg-white shadow-sm">Mensal</span>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer" id="billing-toggle">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
          </label>
          <span class="px-4 py-2 rounded-full">Anual <span class="text-xs text-primary font-bold">Economize 20%</span></span>
        </div>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Basic Plan -->
        <div class="relative overflow-hidden border border-gray-200 rounded-lg">
          <div class="p-6">
            <h3 class="text-2xl font-bold">Básico</h3>
            <p class="text-gray-500">Ideal para iniciantes</p>
          </div>
          
          <div class="px-6 pt-6">
            <div class="mb-6">
              <span class="text-4xl font-bold">R$49,90</span>
              <span class="text-gray-500">/mês</span>
            </div>
            
            <ul class="space-y-3">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Modele até 5 páginas/mês</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Suporte por email</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Acesso à biblioteca básica</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Edição de links e textos</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Sem marca d'água</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-times text-gray-300 mr-2"></i>
                <span class="text-gray-400">Hospedagem incluída</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-times text-gray-300 mr-2"></i>
                <span class="text-gray-400">Rastreamento de conversões</span>
              </li>
            </ul>
          </div>
          
          <div class="p-6 mt-6">
            <a href="https://pay.kiwify.com.br/vZAOcpa" class="w-full block text-center bg-purple-100 text-purple-900 hover:bg-purple-200 px-4 py-2 rounded-md">
              Começar Agora
            </a>
          </div>
        </div>
        
        <!-- Premium Plan -->
        <div class="relative overflow-hidden border-primary shadow-lg shadow-primary/20 scale-105 md:scale-110 z-10 border-2 rounded-lg">
          <div class="absolute top-0 right-0 bg-primary text-white px-4 py-1 text-sm font-medium rounded-bl-lg">
            Mais Popular
          </div>
          
          <div class="p-6 bg-primary/10">
            <h3 class="text-2xl font-bold">Premium</h3>
            <p class="text-gray-500">Nossa escolha popular</p>
          </div>
          
          <div class="px-6 pt-6">
            <div class="mb-6">
              <span class="text-4xl font-bold">R$69,90</span>
              <span class="text-gray-500">/mês</span>
            </div>
            
            <ul class="space-y-3">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Páginas ILIMITADAS</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Suporte prioritário 24/7</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Acesso completo à biblioteca</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Edição avançada de elementos</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Sem marca d'água</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Hospedagem incluída</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Rastreamento de conversões</span>
              </li>
            </ul>
          </div>
          
          <div class="p-6 mt-6">
            <a href="https://pay.kiwify.com.br/DHUXcYF" class="w-full block text-center bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-md">
              Escolher Premium
            </a>
          </div>
        </div>
        
        <!-- Medium Plan -->
        <div class="relative overflow-hidden border border-gray-200 rounded-lg">
          <div class="p-6">
            <h3 class="text-2xl font-bold">Médio</h3>
            <p class="text-gray-500">Para afiliados em crescimento</p>
          </div>
          
          <div class="px-6 pt-6">
            <div class="mb-6">
              <span class="text-4xl font-bold">R$59,90</span>
              <span class="text-gray-500">/mês</span>
            </div>
            
            <ul class="space-y-3">
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Modele até 10 páginas/mês</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Suporte por chat</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Acesso à biblioteca ampliada</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Edição de imagens e vídeos</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Sem marca d'água</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-green-500 mr-2"></i>
                <span class="text-gray-700">Hospedagem incluída</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-times text-gray-300 mr-2"></i>
                <span class="text-gray-400">Rastreamento de conversões</span>
              </li>
            </ul>
          </div>
          
          <div class="p-6 mt-6">
            <a href="https://pay.kiwify.com.br/iGoqB0J" class="w-full block text-center bg-purple-100 text-purple-900 hover:bg-purple-200 px-4 py-2 rounded-md">
              Selecionar Plano
            </a>
          </div>
        </div>
      </div>
      
      <div class="mt-8 text-center text-gray-600">
        <p>Todos os planos incluem garantia de 7 dias ou seu dinheiro de volta.</p>
      </div>
    </div>
  </section>

  <!-- Anti-Plagiarism Section -->
  <section class="py-20 bg-purple-900 text-white">
    <div class="container mx-auto px-4 text-center">
      <span class="bg-purple-300 text-purple-900 mb-4 py-1 px-3 rounded-full text-sm font-medium inline-block">IMPORTANTE</span>
      <h2 class="text-3xl md:text-4xl font-bold mb-8 mt-4">Somos a Favor do Uso Responsável</h2>
      <div class="max-w-3xl mx-auto">
        <p class="text-xl mb-6">
          O CopyWave foi criado para facilitar a vida dos produtores e afiliados, não para promover o uso indevido.
          Somos a favor da eficiência e da produtividade, permitindo que você foque no que realmente importa: suas
          estratégias de marketing e vendas.
        </p>
        <p class="text-xl mb-8">
          Nossa ferramenta incentiva o uso ético, mantendo os créditos originais e respeitando o trabalho dos
          criadores. O objetivo é otimizar processos e facilitar o trabalho dos afiliados autorizados.
        </p>
        <a href="#" class="bg-purple-300 text-purple-900 hover:bg-purple-200 px-6 py-3 rounded-md inline-block">
          Conheça Nossas Diretrizes de Uso
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-gradient-to-r from-purple-800 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">Pronto para Revolucionar seu Trabalho?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Junte-se a milhares de afiliados que economizam horas todos os dias com o CopyWave. Comece agora e veja a
        diferença em seus resultados!
      </p>
      <a href="#" class="bg-purple-300 text-purple-900 hover:bg-purple-200 px-8 py-6 text-lg rounded-md inline-flex items-center">
        Começar Agora <i class="fas fa-chevron-right ml-2"></i>
      </a>
      <p class="mt-6 text-purple-200">
        Experimente sem compromisso. Garantia de 7 dias ou seu dinheiro de volta.
      </p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-16">
  <div class="container mx-auto px-4">
    <!-- Top footer with logo and social media -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 pb-8 border-b border-gray-800">
      <div class="flex items-center mb-6 md:mb-0">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/logo.svg-N1dsNZnxE9ulqvlyk6TCPzrvM1wkfA.png" alt="CopyWave Logo" class="w-12 h-12 mr-3">
        <div>
          <span class="text-2xl font-bold text-white">CopyWave</span>
          <p class="text-gray-400 text-sm">Facilitando a vida dos afiliados desde 2025</p>
        </div>
      </div>
      
      <div class="flex space-x-6">
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-primary">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-primary">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-primary">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-primary">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>
    
    <!-- Main footer content -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
      <div>
        <h3 class="text-xl font-bold mb-6 relative pl-3 before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 before:bg-primary">Sobre Nós</h3>
        <p class="text-gray-400 mb-4">
          O CopyWave é uma plataforma inovadora que permite aos afiliados reproduzir páginas de vendas em segundos, aumentando sua produtividade e resultados.
        </p>
        <a href="#" class="text-primary hover:text-primary/80 inline-flex items-center">
          Saiba mais <i class="fas fa-arrow-right ml-2 text-xs"></i>
        </a>
      </div>
      
      <div>
        <h3 class="text-xl font-bold mb-6 relative pl-3 before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 before:bg-primary">Links Rápidos</h3>
        <ul class="space-y-3">
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Início</a></li>
          <li><a href="#features" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Recursos</a></li>
          <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Preços</a></li>
          <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Depoimentos</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Blog</a></li>
        </ul>
      </div>
      
      <div>
        <h3 class="text-xl font-bold mb-6 relative pl-3 before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 before:bg-primary">Legal</h3>
        <ul class="space-y-3">
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Termos de Uso</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Política de Privacidade</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Política de Uso Responsável</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-primary"></i> Suporte</a></li>
        </ul>
      </div>
      
      <div>
        <h3 class="text-xl font-bold mb-6 relative pl-3 before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 before:bg-primary">Contato</h3>
        <ul class="space-y-4">
          <li class="flex items-start">
            <i class="fas fa-envelope text-primary mt-1.5 mr-3"></i>
            <span class="text-gray-400">suporte@copywave.com</span>
          </li>
          <li class="flex items-start">
            <i class="fas fa-phone-alt text-primary mt-1.5 mr-3"></i>
            <span class="text-gray-400">(11) 99999-9999</span>
          </li>
          <li class="flex items-start">
            <i class="fas fa-map-marker-alt text-primary mt-1.5 mr-3"></i>
            <span class="text-gray-400">Av. Paulista, 1000<br>São Paulo, SP - Brasil</span>
          </li>
        </ul>
        
        <div class="mt-6">
          <a href="#" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-md inline-flex items-center">
            <i class="fas fa-headset mr-2"></i> Fale Conosco
          </a>
        </div>
      </div>
    </div>
    
    <!-- Bottom footer with copyright -->
    <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
      <p class="text-gray-400 mb-4 md:mb-0">© 2025 CopyWave. Todos os direitos reservados.</p>
      <div class="flex space-x-6">
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 text-sm">Termos</a>
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 text-sm">Privacidade</a>
        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 text-sm">Cookies</a>
      </div>
    </div>
  </div>
</footer>

  <!-- Terms Modal (hidden by default) -->
  <div id="terms-modal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg max-w-lg w-full max-h-[90vh] overflow-auto mx-4">
      <div class="p-6">
        <div class="flex justify-between items-start">
          <div>
            <h2 class="text-2xl font-bold text-primary">Diretrizes de Uso do CopyWave</h2>
            <p class="text-gray-500">Por favor, leia e aceite nossos termos de uso antes de continuar.</p>
          </div>
          <button id="close-modal" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <div class="max-h-[300px] overflow-y-auto my-4 p-4 bg-gray-50 rounded-md text-sm">
          <h3 class="font-bold mb-2">1. Uso Responsável</h3>
          <p class="mb-4">
            O CopyWave é uma ferramenta projetada para facilitar o trabalho de afiliados e produtores, permitindo a
            reprodução rápida de páginas de vendas para modificação de links. Não incentivamos o uso indevido ou a cópia
            não autorizada de conteúdo.
          </p>

          <h3 class="font-bold mb-2">2. Responsabilidade do Usuário</h3>
          <p class="mb-4">
            Ao utilizar o CopyWave, você concorda em:
          </p>
          
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li>Obter permissão do proprietário original da página antes de reproduzi-la</li>
            <li>Utilizar a ferramenta apenas para fins legítimos de afiliação</li>
            <li>Não remover créditos, direitos autorais ou marcas registradas</li>
            <li>Assumir total responsabilidade pelo uso da ferramenta</li>
          </ul>

          <h3 class="font-bold mb-2">3. Limitação de Responsabilidade</h3>
          <p class="mb-4">
            O CopyWave não se responsabiliza por qualquer uso indevido da ferramenta, incluindo violações de direitos
            autorais, marcas registradas ou outras propriedades intelectuais.
          </p>

          <h3 class="font-bold mb-2">4. Política de Uso Responsável</h3>
          <p class="mb-4">
            Somos a favor do uso responsável e da facilidade na vida de cada um. Nossa ferramenta foi desenvolvida para
            otimizar o trabalho de afiliados legítimos, não para uso indevido do trabalho de terceiros.
          </p>

          <h3 class="font-bold mb-2">5. Cancelamento</h3>
          <p>
            Reservamo-nos o direito de cancelar contas que violem estes termos de uso ou que utilizem nossa plataforma
            para fins ilegais ou antiéticos.
          </p>
        </div>
        
        <div class="flex items-center space-x-2 my-2">
          <input type="checkbox" id="terms-checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
          <label for="terms-checkbox" class="text-sm">
            Eu li e aceito as diretrizes de uso e entendo a política de uso responsável do CopyWave
          </label>
        </div>
        
        <div class="mt-4">
          <button id="accept-terms" class="w-full bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-md disabled:opacity-50" disabled>
            Aceitar e Continuar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript for interactivity -->
  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
    
    // Calculator tabs
    const moneyTab = document.getElementById('money-tab');
    const timeTab = document.getElementById('time-tab');
    const moneyCalculator = document.getElementById('money-calculator');
    const timeCalculator = document.getElementById('time-calculator');
    
    moneyTab.addEventListener('click', () => {
      moneyTab.classList.add('bg-primary', 'text-white');
      timeTab.classList.remove('bg-primary', 'text-white');
      moneyCalculator.classList.remove('hidden');
      timeCalculator.classList.add('hidden');
    });
    
    timeTab.addEventListener('click', () => {
      timeTab.classList.add('bg-primary', 'text-white');
      moneyTab.classList.remove('bg-primary', 'text-white');
      timeCalculator.classList.remove('hidden');
      moneyCalculator.classList.add('hidden');
    });
    
    // Feature tabs
    const cloneTab = document.getElementById('clone-tab');
    const editTab = document.getElementById('edit-tab');
    const trackTab = document.getElementById('track-tab');
    const speedTab = document.getElementById('speed-tab');
    
    const cloneContent = document.getElementById('clone-content');
    const editContent = document.getElementById('edit-content');
    const trackContent = document.getElementById('track-content');
    const speedContent = document.getElementById('speed-content');
    
    const cloneImage = document.getElementById('clone-image');
    const editImage = document.getElementById('edit-image');
    const trackImage = document.getElementById('track-image');
    const speedImage = document.getElementById('speed-image');
    
    function setActiveTab(activeTab, activeContent, activeImage) {
      // Reset all tabs
      [cloneTab, editTab, trackTab, speedTab].forEach(tab => {
        tab.classList.remove('bg-white', 'rounded-lg', 'shadow');
      });
      
      // Reset all content
      [cloneContent, editContent, trackContent, speedContent].forEach(content => {
        content.classList.add('hidden');
      });
      
      // Reset all images
      [cloneImage, editImage, trackImage, speedImage].forEach(image => {
        image.classList.add('hidden');
      });
      
      // Set active tab, content and image
      activeTab.classList.add('bg-white', 'rounded-lg', 'shadow');
      activeContent.classList.remove('hidden');
      activeImage.classList.remove('hidden');
    }
    
    cloneTab.addEventListener('click', () => setActiveTab(cloneTab, cloneContent, cloneImage));
    editTab.addEventListener('click', () => setActiveTab(editTab, editContent, editImage));
    trackTab.addEventListener('click', () => setActiveTab(trackTab, trackContent, trackImage));
    speedTab.addEventListener('click', () => setActiveTab(speedTab, speedContent, speedImage));
    
    // Terms modal
    const termsModal = document.getElementById('terms-modal');
    const closeModal = document.getElementById('close-modal');
    const termsCheckbox = document.getElementById('terms-checkbox');
    const acceptTermsButton = document.getElementById('accept-terms');
    
    // Show modal on page load if terms not accepted
    if (!localStorage.getItem('termsAccepted')) {
      termsModal.classList.remove('hidden');
    }
    
    closeModal.addEventListener('click', () => {
      termsModal.classList.add('hidden');
    });
    
    termsCheckbox.addEventListener('change', () => {
      acceptTermsButton.disabled = !termsCheckbox.checked;
    });
    
    acceptTermsButton.addEventListener('click', () => {
      localStorage.setItem('termsAccepted', 'true');
      termsModal.classList.add('hidden');
    });
    
    // Range input updates
    const hoursInput = document.getElementById('hours');
    const hoursValue = document.getElementById('hours-value');
    const pagesInput = document.getElementById('pagesPerMonth');
    const pagesValue = document.getElementById('pages-value');
    const hoursPerPageInput = document.getElementById('hoursPerPage');
    const hoursPerPageValue = document.getElementById('hours-per-page-value');
    
    hoursInput.addEventListener('input', () => {
      hoursValue.textContent = `${hoursInput.value} horas`;
      updateMoneyCalculations();
    });
    
    pagesInput.addEventListener('input', () => {
      pagesValue.textContent = `${pagesInput.value} páginas`;
      updateTimeCalculations();
    });
    
    hoursPerPageInput.addEventListener('input', () => {
      hoursPerPageValue.textContent = `${hoursPerPageInput.value} horas`;
      updateTimeCalculations();
    });
    
    // Calculator functions
    function updateMoneyCalculations() {
      const hours = parseInt(hoursInput.value);
      const hourlyRate = parseInt(document.getElementById('hourlyRate').value);
      const commissionRate = parseInt(document.getElementById('commissionRate').value);
      const averagePrice = parseInt(document.getElementById('averagePrice').value);
      
      const moneyLost = hours * hourlyRate;
      const pagesCreated = hours * 10;
      const potentialSales = Math.round(pagesCreated * 0.05);
      const potentialCommission = Math.round(potentialSales * averagePrice * (commissionRate / 100));
      const totalLoss = moneyLost + potentialCommission;
      
      document.getElementById('money-lost').textContent = `R$ ${moneyLost.toLocaleString()}`;
      document.getElementById('potential-sales').textContent = `${potentialSales} vendas`;
      document.getElementById('potential-commission').textContent = `R$ ${potentialCommission.toLocaleString()}`;
      document.getElementById('total-loss').textContent = `R$ ${totalLoss.toLocaleString()}`;
    }
    
    function updateTimeCalculations() {
      const pagesPerMonth = parseInt(pagesInput.value);
      const hoursPerPage = parseFloat(hoursPerPageInput.value);
      
      const hoursPerMonth = pagesPerMonth * hoursPerPage;
      const hoursSaved = hoursPerMonth - (pagesPerMonth * (10/60));
      const daysPerYear = Math.round((hoursSaved * 12) / 8);
      
      document.getElementById('hours-per-month').textContent = `${hoursPerMonth} horas`;
      document.getElementById('hours-saved').textContent = `${hoursSaved.toFixed(1)} horas`;
      document.getElementById('days-per-year').textContent = `${daysPerYear} dias`;
    }
    
    // Initialize calculations
    updateMoneyCalculations();
    updateTimeCalculations();
    
    // Add event listeners to number inputs
    document.getElementById('hourlyRate').addEventListener('input', updateMoneyCalculations);
    document.getElementById('commissionRate').addEventListener('input', updateMoneyCalculations);
    document.getElementById('averagePrice').addEventListener('input', updateMoneyCalculations);
  </script>
</body>
</html>