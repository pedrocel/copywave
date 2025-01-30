<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Plano
        </h2>
    </x-slot>

    <!-- Estrutura com fundo escuro e modo escuro ativo -->
    <div class="min-h-screen bg-gray-900 p-6">
        <div class="text-center p-4 mb-6">
            <h1 class="font-bold text-xl text-white">Selecione um Plano</h1>
            <span class="text-md text-gray-300">Escolha o plano que funciona para você.</span>
        </div>

        <!-- Filtro para Mês / Ano -->
        <div class="text-center mb-10 flex gap-4 justify-center">
            <button onclick="showStep('month')" id="monthlyBtn" class="rounded-3xl font-bold p-1.5 w-30 text-white hover:bg-gray-700">
                Mês
            </button>
            <button onclick="showStep('year')" id="yearlyBtn" class="rounded-3xl font-bold p-1.5 w-30 text-white hover:bg-gray-700">
                Ano -20% off
            </button>
        </div>

        <!-- Cards de Planos -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Plano Simples -->
            <div class="bg-gray-800 rounded-3xl p-4 shadow-md">
                <div class="text-center">
                    <h3 class="font-bold text-lg text-white">Simples</h3>
                    <h3 id="simplesPrice" class="font-extrabold text-lg text-white">R$ 939,84</h3>
                    <div id="simplesText" class="text-primary-400">
                        <span>cobrança anual</span>
                    </div>
                </div>
                <ul class="text-left font-bold my-5 text-white">
                    <li>✅ Até 5 ofertas clonadas /mês</li>
                    <li>✅ Ofertas/Páginas clonadas com 1 clique</li>
                    <li>✅ Clonagem Simples</li>
                    <li>❌ Clonagem Manual</li>
                    <li>❌ Espionar Anúncios</li>
                    <li>❌ Múltiplos Domínios</li>
                    <li>❌ Camuflagem de Links (Clocker)</li>
                    <li>❌ Suporte via whatsapp</li>
                </ul>
                <button class="w-full p-1 text-sm font-semibold bg-gradient-to-r from-custom-purple-start to-custom-purple-end rounded-md text-white hover:bg-purple-600">
                    SELECIONAR PLANO
                </button>
            </div>

            <!-- Plano Standart -->
            <div class="bg-gradient-to-r from-custom-purple-start to-custom-purple-end rounded-3xl p-4 shadow-md">
                <div class="text-center">
                    <h3 class="font-bold text-lg text-white">Standart</h3>
                    <p class="font-bold text-md text-white bg-gradient-to-r from-custom-purple-start to-purple-700 rounded-3xl px-4">
                        Mais escolhido por nossos usuários!
                    </p>
                    <h3 id="standartPrice" class="font-extrabold text-lg text-white">R$ 1227,84</h3>
                    <div id="standartText" class="text-white">
                        <span>cobrança anual</span>
                    </div>
                </div>
                <ul class="text-left font-bold text-white my-5">
                    <li>✅ Até 30 ofertas clonadas /mês</li>
                    <li>✅ Ofertas/Páginas clonadas com 1 clique</li>
                    <li>✅ Clonagem Simples</li>
                    <li>❌ Clonagem Manual</li>
                    <li>✅ Espionar Anúncios</li>
                    <li>❌ Múltiplos Domínios</li>
                    <li>❌ Camuflagem de Links (Clocker)</li>
                    <li>❌ Suporte via whatsapp</li>
                </ul>
                <button class="w-full p-1 text-sm font-semibold bg-white text-primary rounded-md hover:bg-gray-700">
                    SELECIONAR PLANO
                </button>
            </div>

            <!-- Plano Premium -->
            <div class="bg-gray-800 rounded-3xl p-4 shadow-md">
                <div class="text-center">
                    <h3 class="font-bold text-lg text-white">Premium</h3>
                    <h3 id="premiumPrice" class="font-extrabold text-lg text-white">R$ 1419,84</h3>
                    <div id="premiumText" class="text-primary-400">
                        <span>cobrança anual</span>
                    </div>
                </div>
                <ul class="text-left font-bold my-5 text-white">
                    <li>✅ Até 50 ofertas clonadas /mês</li>
                    <li>✅ Ofertas/Páginas clonadas com 1 clique</li>
                    <li>✅ Clonagem Manual</li>
                    <li>✅ Espionar Anúncios</li>
                    <li>✅ Múltiplos Domínios</li>
                    <li>✅ Camuflagem de Links (Clocker)</li>
                    <li>✅ Suporte via whatsapp</li>
                </ul>
                <button class="w-full p-1 text-sm font-semibold bg-gradient-to-r from-custom-purple-start to-custom-purple-end rounded-md text-white hover:bg-purple-600">
                    SELECIONAR PLANO
                </button>
            </div>
        </div>
    </div>

    <script>
        // Função para alternar entre planos mensais e anuais
        let isAnnual = false;

        function showStep(option) {
            isAnnual = option === 'year'; // Se for 'year', usamos os preços anuais

            // Atualiza os preços de acordo com a opção escolhida
            const simplesPrice = document.getElementById('simplesPrice');
            const simplesText = document.getElementById('simplesText');
            const standartPrice = document.getElementById('standartPrice');
            const standartText = document.getElementById('standartText');
            const premiumPrice = document.getElementById('premiumPrice');
            const premiumText = document.getElementById('premiumText');

            if (isAnnual) {
                simplesPrice.textContent = "R$ 939,84";
                simplesText.innerHTML = "<span>cobrança anual</span>";

                standartPrice.textContent = "R$ 1227,84";
                standartText.innerHTML = "<span>cobrança anual</span>";

                premiumPrice.textContent = "R$ 1419,84";
                premiumText.innerHTML = "<span>cobrança anual</span>";
            } else {
                simplesPrice.textContent = "R$ 99,99";
                simplesText.innerHTML = "<span>cobrança mensal</span>";

                standartPrice.textContent = "R$ 129,99";
                standartText.innerHTML = "<span>cobrança mensal</span>";

                premiumPrice.textContent = "R$ 159,99";
                premiumText.innerHTML = "<span>cobrança mensal</span>";
            }
        }
    </script>
</x-app-layout>
