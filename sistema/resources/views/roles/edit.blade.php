@extends('layouts.app')
@section('title', "Edit Role {$role->id}")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="content">
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <form action="{{route('roles.update', $role->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <!-- Input States -->
                                <h2 class="content-heading">Rol: {{$role->name}}</h2>
                                <div class="row">
                                    <div class="col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control is-valid @error('name') is-invalid @enderror" name="name" value="{{$role->name}}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Roles Disponibles</label>
                                            @foreach ($permissions as $key => $permission)
                                                @if ($key == 4 || $key == 9 || $key == 10)
                                                    <hr>
                                                @endif
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="{{$permission->id}}"
                                                        id="checkbox-{{$permission->id}}"
                                                        name="permissions[]"
                                                        @if($role->permissions->contains($permission))
                                                            checked
                                                        @endif>
                                                    <label class="form-check-label" for="checkbox-{{$permission->id}}">
                                                        {{$permission->title}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
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
        </div>
    </div>
</div>
@endsection
