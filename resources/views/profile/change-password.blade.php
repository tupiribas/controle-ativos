@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alterar Senha</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update-password') }}">
            @csrf

            <!-- Senha Atual -->
            <div class="mb-3">
                <label for="current_password" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <!-- Nova Senha -->
            <div class="mb-3">
                <label for="new_password" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <!-- Confirmação de Nova Senha -->
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirme a Nova Senha</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Alterar Senha</button>
        </form>
    </div>
@endsection
