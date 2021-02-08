<INDEX>
    @section("contenido")
        <div class="row">
            @foreach($animales as $clave => $animal)
                <div class="card m-1 bg-light border-secondary" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset("storage/img")}}/{{$animal->imagen}}"
                         alt="Imagen de {{$animal->especie}}">
                    <div class="card-body">
                        <h3 class="card-title">{{$animal->especie}}</h3>
                        <h5>Nº Revisiones: {{count($animal->revisiones)}}</h5>
                        <h5>Cuidadores:</h5>
                        <ul>
                            @foreach($animal->cuidadores as $cuidador)
                                <li>{{$cuidador->nombre}}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('animales.show' , $animal) }}" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
</INDEX>

<SHOW>

    @section("contenido")
        <div class="row container">

            <div class="col-sm-3"><img class="img-fluid rounded-circle"
                                       src="{{asset("storage/img")}}/{{$animal->imagen}}"
                                       alt="imagen de {{$animal->especie}}"></div>
            <div class="col-sm-9">
                <div class="row">
                    @if(session("mensaje"))
                        <h3>{{session("mensaje")}}</h3>
                    @endif
                    <h1>{{$animal->especie}} ({{$animal->getedad()}} años)</h1>
                </div>
                <div class="row">
                    <h5>Peso:</h5>
                    <p>{{$animal->peso}} kg</p>
                </div>
                <div class="row">
                    <h5>Altura:</h5>
                    <p>{{$animal->altura}} cm</p>
                </div>
                <div class="row">
                    <h5>Descripción:</h5>
                    <p>{{$animal->descripcion}}</p>
                </div>
                <div class="row">
                    <h5>Revisiones:</h5>
                    <ul>
                        @foreach($animal->revisiones as $revision)
                            <li>{{$revision->fecha}}: {{$revision->descripcion}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="row d-inline">
                    <a href="{{route('animales.edit' , $animal)}}"><input class="btn btn-danger" type="button"
                                                                          value="Editar"></a>
                    <a href="{{route('revisiones.create' , $animal)}}"><input class="btn btn-success" type="button"
                                                                              value="Añadir Revision"></a>
                    <a href="{{route('animales.index')}}"><input class="btn btn-dark" type="button"
                                                                 value="Volver al listado"></a>
                </div>
            </div>
        </div>
    @endsection
</SHOW>

<EDIT>
    @section("contenido")
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <div class="card">
                    <div class="card-header text-center">Editar animal</div>
                    <div class="card-body"
                         style="padding:30px">
                        <form action="{{route("animales.update", $animal)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="especie">Especie</label>
                                <input type="text" name="especie" id="especie" class="form-control" required
                                       value="{{$animal->especie}}">
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso: </label>
                                <input type="number" step="any" class="form-control" name="peso"
                                       value="{{$animal->peso}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="altura">Altura: </label>
                                <input type="number" step="any" class="form-control" name="altura"
                                       value="{{$animal->altura}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" name="fechaNacimiento"
                                       value="{{$animal->fechaNacimiento}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="alimentacion">Tipo de alimentación: </label>
                                <input type="text" class="form-control" name="alimentacion"
                                       value="{{$animal->alimentacion}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion"
                                          id="descripcion"
                                          class="form-control"
                                          rows="3">{{$animal->descripcion}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" class="form-control" name="imagen">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success"
                                        style="padding:8px 100px;margin-top:25px;">
                                    Editar
                                    animal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</EDIT>

<CREATE>
    @section("contenido")
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <div class="card">
                    <div class="card-header text-center">Añadir animal</div>
                    <div class="card-body"
                         style="padding:30px">
                        <form action="{{route("animales.store")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="especie">Especie</label>
                                <input type="text" name="especie" id="especie" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso: </label>
                                <input type="number" step="any" class="form-control" name="peso" required>
                            </div>
                            <div class="form-group">
                                <label for="altura">Altura: </label>
                                <input type="number" step="any" class="form-control" name="altura" required>
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" name="fechaNacimiento" required>
                            </div>
                            <div class="form-group">
                                <label for="alimentacion">Tipo de alimentación: </label>
                                <input type="text" class="form-control" name="alimentacion" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion"
                                          id="descripcion"
                                          class="form-control"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" class="form-control" name="imagen">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="padding:8px 100px;margin-top:25px;">
                                    Añadir
                                    animal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</CREATE>