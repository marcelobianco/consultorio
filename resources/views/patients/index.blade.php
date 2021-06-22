@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard - Pacientes') }}</div><br />
                <div class="col-md-2">
                <a href="patients/create" class="edit btn btn-success btn-sm">Novo</a>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
