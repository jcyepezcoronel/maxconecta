@extends('layouts.app')
@section('title', 'Crear Rol')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Crear Rol</h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <div class="content">
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <form action="{{route('roles.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control is-valid @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus name="name" placeholder="Nombre">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Permisos disponibles</label>
                                            @foreach ($permissions as $key => $permission)
                                                @if ($key == 5 || $key == 10 || $key == 11 || $key == 15)
                                                    <hr>
                                                @endif
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="checkbox-{{$permission->id}}" name="permissions[]">
                                                    <label class="form-check-label" for="checkbox-{{$permission->id}}">{{$permission->title}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Input States -->
                            </form>
                        </div>
                    </div>
                    <!-- END Elements -->
                </div>
                <!-- END Hero -->
            </div>
        </div>
    </div>
</div>
@endsection
