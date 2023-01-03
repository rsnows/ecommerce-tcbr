<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roberto Bagulhos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield("scriptjs")
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        <a href="#" class="navbar-brand">Roberto Bagulhos></a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-link">HOME</a>
                <a href="{{ route('category') }}" class="nav-link">Categorias</a>
                <a href="{{ route('register') }}" class="nav-link">Cadastrar</a>
            </div>
        </div>
        <a href="{{ route('showCart') }}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
    </nav>  
    
    <div class="container">
        <div class="row">
            @if($message = Session::get("err"))
                <div class="col-12">
                    <div class="alert alert-danger">{{ $message }}</div>
                </div>
            @endif
            @if($message = Session::get("ok"))
                <div class="col-12">
                    <div class="alert alert-success">{{ $message }}</div>
                </div>
            @endif
            @yield("content")
        </div>
    </div>
    
</body>
</html>