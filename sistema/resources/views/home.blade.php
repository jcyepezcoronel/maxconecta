@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="overflow-y: scroll;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Component Vue -->
                    <List />
                </div>
            </div>
@endsection
