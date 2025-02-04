<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard de Assinaturas
        </h2>
    </x-slot>

    <div id="loading" class="fixed inset-0 flex items-center justify-center bg-white dark:bg-gray-900 text-xl font-bold text-[#CC54F4]">
        Carregando...
    </div>

    <div id="content" class="container mx-auto px-4 py-6 hidden">
        {{-- Primeira linha de Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Total de Assinaturas</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalAssinaturas }}</p>
            </div>
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Assinaturas Ativas</h3>
                <p class="text-3xl font-bold mt-2">{{ $assinaturasAtivas }}</p>
            </div>
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Assinaturas Canceladas</h3>
                <p class="text-3xl font-bold mt-2">{{ $assinaturasCanceladas }}</p>
            </div>
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Receita Total</h3>
                <p class="text-3xl font-bold mt-2">R$ {{ number_format($receitaTotal, 2, ',', '.') }}</p>
            </div>
        </div>

        {{-- Segunda linha: Gráfico e card de faturamento --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="md:col-span-3 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Assinaturas por Período</h3>
                <canvas id="assinaturasChart"></canvas>
            </div>
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Faturamento Diário</h3>
                <p class="text-3xl font-bold mt-2">R$ {{ number_format($faturamentoDiario, 2, ',', '.') }}</p>
            </div>
        </div>

        {{-- Última linha de cards de faturamento --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Faturamento Mensal</h3>
                <p class="text-3xl font-bold mt-2">R$ {{ number_format($faturamentoMensal, 2, ',', '.') }}</p>
            </div>
            <div class="bg-gradient-to-r from-[#CC54F4] to-[#000] text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h3 class="text-lg font-medium">Faturamento Total</h3>
                <p class="text-3xl font-bold mt-2">R$ {{ number_format($receitaTotal, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    setTimeout(() => {
        document.getElementById('loading').classList.add('hidden');
        document.getElementById('content').classList.remove('hidden');
    }, 3000);

    const ctx = document.getElementById('assinaturasChart').getContext('2d');
    const labels = @json($graficoLabels);
    const data = @json($graficoValores);
    
    const assinaturasChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Assinaturas',
                data: data,
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
