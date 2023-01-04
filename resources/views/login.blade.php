@extends("layout")
@section("content")

    <div class="col-12">
        <h2 class="mb-3">Acessar o sistema</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                Login:
                <input type="text" name="login" class="form-control">
            </div>
            <div class="form-group">
                Senha:
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Entrar" class="btn btn-lg btn-primary">
        </form>
    </div>

@endsection