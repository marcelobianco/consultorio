@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard - Usuários') }}</div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9">{{ $user->name }}</dd>

                        <dt class="col-sm-3">E-mail</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>

                        <dt class="col-sm-3">Inserido em</dt>
                        <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s')  }}</dd>
                    </dl>
                    <hr/>
                    <div class="row justify-content-center">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                        </form>
                        <a type="submit" class="btn btn-success" href="{{ route('users.edit',$user->id) }}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
