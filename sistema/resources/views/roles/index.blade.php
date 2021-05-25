@extends('layouts.app')
@section('title', 'Roles')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Roles</h1>
                    </div>
                    <a href="{{route('roles.create')}}">Crear roles</a>
                    <a href="{{route('roles.assign')}}">Asignar Roles</a>
                </div>
            </div>
            <div class="content">
                <!-- Full Table -->
                <div class="block block-rounded block-bordered">
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">
                                            #
                                        </th>
                                        <th>Nombre</th>
                                        <th>Permisos</th>
                                        <th style="width: 15%;">Creado</th>
                                        <th class="text-center" style="width: 100px;">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">
                                            {{$role->id - 1}}
                                        </td>
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        @if ($role->permissions->count() > 0)
                                            <td class="d-none d-sm-table-cell">
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge badge-success">{{$permission->title}}</span>
                                                @endforeach
                                            </td>
                                        @else
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-danger">No posee permisos</span>
                                            </td>
                                        @endif
                                        <td>
                                            {{$role->created_at->diffForHumans()}}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Editar Rol {{$role->name}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Borrar Rol {{$role->name}}" onclick="">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Full Table -->
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
