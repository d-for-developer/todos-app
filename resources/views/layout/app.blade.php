<html>
<head>
<title>Todos App</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">



</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Home</a>
  <a class="navbar-brand" href="/todos">Todos</a>
  <a class="navbar-brand" href="/create-todo">Create Todos</a>


</nav>
<div class="container">

@if(session()-> has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
@endif

@yield('content')
</body>
</html>
