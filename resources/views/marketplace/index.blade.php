<x-app-layout>

<div class="owl-carousel owl-theme mx-auto"> <!-- Agregar clase "mx-auto" -->
    @foreach ($categorias as $categoria)
        <div class="card text-center mb-4 mx-auto"> <!-- Agregar clase "text-center" y "mx-auto" -->
            <div class="card-header" style="background-color: #5B5EA6"><strong>{{ $categoria->nombre }}</strong></div>
            <div class="card-body text-center" style="background-color: #F9AFAF">
                <div class="slider">

                    <div class="row">
                        {{-- Aqui basicamente lo que haremos sera recorrer la coleccion de objetos $plataformas , y filtramos los objetos que en la propiedad category_id coincidde con $categoria->id , pintando el nombre y el precio que le costaria al usuario en funcion de la gente que se puede unir a la plataforma --}}
                        @foreach ($plataformas->where('category_id', $categoria->id) as $plataforma)
                            <div class="col-md-4">
                                <div class="card mb-4" style="background-color: #D8C3FF">
                                    <div class="card-body" >
                                        <h5 class="card-title" style="font-size: 1.5rem"><strong>{{ $plataforma->nombre }}</strong></h5>
                                        <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">Apartir de : {{round($plataforma->suscripcion/$plataforma->capacidad, 2) }}€</p>
                                        <a href="{{route('groups.showGroups' , $plataforma->id )}}" class="btn btn-outline-dark" style="background-color: #00CDD0">Ver grupos</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
