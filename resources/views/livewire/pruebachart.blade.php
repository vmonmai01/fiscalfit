<div>
    <input type="date" wire:model="startDate" wire:change="updateChartData">
    <input type="date" wire:model="endDate" wire:change="updateChartData">

    <!-- Canvas donde se dibujará el gráfico -->
    <div class="w-64">
        <canvas id="myPieChartExpenses" width="400" height="400"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const CANVAS_ID = 'myPieChartExpenses';
    
        // Inicializa el gráfico con los datos proporcionados
        const initChart = (chartData) => {
            const ctx = document.getElementById(CANVAS_ID).getContext('2d');
            if (window.myPieChartExpenses !== undefined) {
                window.myPieChartExpenses.destroy();
            }
            window.myPieChartExpenses = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chartData.map(data => data.category),
                    datasets: [{
                        label: 'Total Amount',
                        data: chartData.map(data => data.total_amount),
                        backgroundColor: chartData.map(() => getRandomColorWithOpacity()),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        };
    
        // Genera colores aleatorios con opacidad
        // const getRandomColorWithOpacity = () => {
        //     const opacity = 0.6; // Puedes ajustar este valor según lo desees (0 = transparente, 1 = opaco)
        //     let color = 'rgba(';
        //     for (let i = 0; i < 3; i++) {
        //         color += Math.floor(Math.random() * 256) + ', ';
        //     }
        //     color += opacity + ')';
        //     return color;
        // };
    
        // Escucha el evento personalizado 'chartDataUpdated' y actualiza el gráfico
        document.addEventListener('chartDataUpdated', (event) => {
            const chartData = event.detail.chartData;
            initChart(chartData);
        });
    </script>
    
</div>
