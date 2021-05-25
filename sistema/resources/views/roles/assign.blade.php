@extends('layouts.app')
@section('title', 'Asignación Rol')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Asignación de Rol</h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <div class="content">
                    <div class="content">
                        <!-- Elements -->
                        <div class="block block-rounded block-bordered">
                            <div class="block-content">
                                <form action="{{route('roles.assign.store')}}" method="POST">
                                    @csrf
                                    <!-- Input States -->
                                    <div class="row">
                                        <div class="col-lg-5 col-xl-5">
                                            <div class="form-group">
                                                <label>Roles disponibles</label>
                                                @foreach ($roles as $role)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{$role->id}}" id="checkbox-{{$role->id}}" name="roles[]">
                                                        <label class="form-check-label" for="checkbox-{{$role->id}}">{{$role->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="example-select">Usuario</label>
                                                <select class="form-control" name="user_id">
                                                    <option value="0">Selecciona</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Asignar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Input States -->
                                </form>
                            </div>
                        </div>
                        <!-- END Elements -->
                    </div>
                </div>
                <!-- END Hero -->
            </div>
        </div>
    </div>
</div>
@endsection
