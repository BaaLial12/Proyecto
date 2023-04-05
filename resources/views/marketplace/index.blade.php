<x-app-layout>

<div class="owl-carousel owl-theme mx-auto"> <!-- Agregar clase "mx-auto" -->
    @foreach ($categorias as $categoria)
        <div class="card text-center mb-4 mx-auto"> <!-- Agregar clase "text-center" y "mx-auto" -->
            <div class="card-header"><strong>{{ $categoria->nombre }}</strong></div>
            <div class="card-body text-center">
                <div class="row">
                    @foreach ($plataformas->where('category_id', $categoria->id) as $plataforma)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $plataforma->nombre }}</strong></h5>
                                    <p class="card-text">Apartir de : {{round($plataforma->suscripcion/$plataforma->capacidad, 2) }}€</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>





<style>
    .card {
    min-height: 300px;
}

.owl-carousel .owl-item .card {
    height: auto;
    width: 100%;
}

.owl-carousel .owl-item .card-body {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>




</x-app-layout>
