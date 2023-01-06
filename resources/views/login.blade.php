@extends("layout")

@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $("#cpf").mask("000.000.000-00")
    })
</script>
@endsection

@section("content")

    <div class="col-12">
        <h2 class="mb-3">Acessar o sistema</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                Login:
                <input type="text" name="login" class="form-control" id="cpf">
            </div>
            <div class="form-group">
                Senha:
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Entrar" class="btn btn-lg btn-primary">
        </form>
    </div>

@endsection