<div>
    
    <div class="card bg-medio max-w-xs rounded-lg shadow p-4 border-amarillo border-2">
        <div class="card-header text-claro text-2xl font-bold text-center">
            Ingresos del Mes
        </div>
        <div class="card-body text-green-400 text-2xl font-bold text-center">
            <h5 class="card-title">@if( $totalIncome ) {{ $totalIncome }} <span class="text-amarillo"> € </span> @else 0  <span class="text-amarillo"> € </span> @endif </h5>
        </div>
    </div>
    
</div>
