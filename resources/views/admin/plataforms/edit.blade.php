@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Actualizar Plataforma</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.plataforms.update', $plataform->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group d-flex flex-column">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Nombre de la Plataforma" value="{{ $plataform->nombre }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group d-flex flex-column">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        placeholder="Descripcion de la Plataforma" value="{{ $plataform->descripcion }}">
                    @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex flex-column">
                    <label for="capacidad">Capacidad</label>
                    <input type="number" step="1" name="capacidad" id="capacidad" class="form-control"
                        placeholder="Capacidad de la Plataforma" value="{{ $plataform->capacidad }}">
                    @error('capacidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex flex-column">
                    <label for="suscripcion">Suscripcion</label>
                    <input type="number" step="0.01" name="suscripcion" id="suscripcion" class="form-control"
                        placeholder="Precio mensual de la Suscripcion" value="{{ $plataform->suscripcion }}">
                    @error('suscripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group d-flex flex-column">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                        <option value="-1">Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if ($categoria->id == $plataform->category_id) selected @endif>
                            {{ $categoria->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- SOLUCIONAR IMAGEN URGENTE --}}
                <div class="form-group d-flex flex-column">
                    <label for="imagen">Imagen (PNG)</label>
                    <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/png"
                        onchange="previsualizarImagen(event)">
                    <img id="imagen-previa" src="{{ Storage::url($plataform->logo)}}" alt="Vista previa de la imagen" class="img-fluid rounded mx-auto d-block"
                        style=" max-width: 400px; max-height: 400px; margin-top: 10px;">
                    @error('imagen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-success">Actualizar Plataforma</button>
            </form>





        </div>
    </div>
@stop

{{-- SCRIPT PARA PREVISUALIZAR LA IMAGEN --}}
<script>
    function previsualizarImagen(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var img = document.getElementById("imagen-previa");
            img.src = reader.result;
            img.style.display = "block";
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>
