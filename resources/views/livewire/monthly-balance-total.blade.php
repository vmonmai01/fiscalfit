<div>
    <div class="card">
        <div class="card-header">
            Balance del Mes
        </div>
        <div class="card-body">
            <h5 class="card-title"> 
            @if ($currency = "euro")
            {{ $balance  }} €
            @else
            {{ $balance * 1.1 }}  $
            @endif
            </h5>

            {{$currency}}
        </div>
    </div>
</div>
