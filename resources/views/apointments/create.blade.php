@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agendamento') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('apointments.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Médico') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2 @error('doctor') is-invalid @enderror" id="doctor" name="doctor" value="{{ old('doctor', @$apointment->doctor_id) }}" required>
                                    <option value="">Selecione..</option>
                                    @forelse ($doctors as $dtr)
                                        @if (@$apointment->doctor_id == $dtr->id || old('doctor') == $dtr->id)
                                            <option selected='selected' value="{{ $dtr->id }}">{{ $dtr->name }}</option>
                                        @else
                                            <option value="{{ $dtr->id }}">{{ $dtr->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>

                                @error('doctor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Paciente') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2 @error('patient') is-invalid @enderror" id="patient" name="patient" value="{{ old('patient', @$apointment->patient_id) }}" required>
                                    <option value="">Selecione..</option>
                                    @forelse ($patients as $pts)
                                        @if (@$apointment->patient_id == $pts->id || old('dpatientr') == $pts->id)
                                            <option selected='selected' value="{{ $pts->id }}">{{ $pts->name }}</option>
                                        @else
                                            <option value="{{ $pts->id }}">{{ $pts->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>

                                @error('patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Dia e Hora') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agendar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
