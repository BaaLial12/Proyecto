<x-app-layout>

<div class="owl-carousel owl-theme mx-auto"> <!-- Agregar clase "mx-auto" -->
    @foreach ($categorias as $categoria)
        <div class="card text-center mb-4 mx-auto"> <!-- Agregar clase "text-center" y "mx-auto" -->
            <div class="card-header" style="background-color: violet"><strong>{{ $categoria->nombre }}</strong></div>
            <div class="card-body text-center" style="background-color: red">
                <div class="slider">

                    <div class="row">
                        {{-- Aqui basicamente lo que haremos sera recorrer la coleccion de objetos $plataformas , y filtramos los objetos que en la propiedad category_id coincidde con $categoria->id , pintando el nombre y el precio que le costaria al usuario en funcion de la gente que se puede unir a la plataforma --}}
                        @foreach ($plataformas->where('category_id', $categoria->id) as $plataforma)
                            <div class="col-md-4">
                                <div class="card mb-4" style="background-color: brown">
                                    <div class="card-body" >
                                        <h5 class="card-title"><strong>{{ $plataforma->nombre }}</strong></h5>
                                        <p class="card-text" style="margin-top: 30px">Apartir de : {{round($plataforma->suscripcion/$plataforma->capacidad, 2) }}€</p>
                                        <a href="{{route('groups.show' , $plataforma->id)}}">Ver grupos</a>
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



<script>
    $('.slider').carousel({
    interval: 5000, // tiempo en milisegundos entre transiciones
    keyboard: true, // habilita la navegación con el teclado
    ride: true, // habilita la navegación automática
    wrap: true // habilita la navegación circular
});
</script>




</x-app-layout>
