<div>
    <div class="card bg-medio max-w-xs rounded-lg shadow p-4 border-amarillo border-2">
        <div class="card-header text-claro text-2xl font-bold text-center">
            Balance del Mes
        </div>
        <div class="card-body text-2xl font-bold text-center">
            @php
                $balanceClass = $balance > 0 ? 'text-green-400' : ($balance < 0 ? 'text-red-600' : 'text-white');
            @endphp
            <h5 class="card-title {{ $balanceClass }}">
                @if ($balance) 
                    {{ $balance }} <span class="text-amarillo"> € </span> 
                @else 
                    0 <span class="text-amarillo"> € </span> 
                @endif 
            </h5>
        </div>
    </div>
    
</div>
