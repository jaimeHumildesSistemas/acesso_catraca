@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Abrir Caixa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('caixa_header.abrir.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="idfilial" class="form-label">Filial</label>
            <select name="idfilial" id="idfilial" class="form-control" required>
                @foreach($filiais as $filial)
                    <option value="{{ $filial->id }}" {{ $filial->id == old('idfilial', $filialDefault) ? 'selected' : '' }}>
                        {{ $filial->nomedafilial }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_abertura" class="form-label">Valor de Abertura</label>
            <input type="number" name="valor_abertura" id="valor_abertura" class="form-control" value="{{ old('valor_abertura', 0) }}" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Abrir Caixa</button>
    </form>
</div>
@endsection
