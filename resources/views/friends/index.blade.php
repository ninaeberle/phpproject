@extends('friends.layout')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<!--Login, Logout and Registration-->
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- left side of the navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- right side of the navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- authentication links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<div class="container">
    <div class="laravelheader">
        <div class="row justify-content-center">
            <div class="col-md-8">

 <!-- 
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Du bist eingeloggt!') }}
                    </div>
                </div>
                -->
                

            </div>
        </div>
    </div>

    
    <!--The black header above the table in the browser-->
        <style>
            .headerblack {
                font-family: 'Futura';
                background: black;
            }
        </style>
        <div class="headerblack">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mx-auto" style="width: 200px;">
                        <h2 style="margin-top:50px; margin-left:10px; margin-bottom:80px; color:white" >Mein digitales <strong>FriendBOOK</strong> </h2>                
                        <h4 style="color:white; margin-left:10px">Dashboard</h4>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-warning"   style="margin-bottom: 20px; margin-right:40px"   href="{{ route('friends.create') }}"> Freund erstellen</a>
                    </div>
                </div>
            </div>
        </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- search bar to find specific friends in the application-->
    <div class="row " style="margin-top:20px">
        <div class="col-md-2">
        </div>
        <div class="col-md-8" style="margin-bottom:40px">

            <form action="friends-search"  method="get">
                <div class="input-group">
                    <input type="search"  style="width:400px" name="search" class="form-control" placeholder="Freunde suchen">
                    <div class="col-md-2">
                        <span class="input-group-append">
                            <button style="margin-top:10px" href="{{ url('/friends-search') }}" class="btn btn-dark">Suchen</button>
                        </span>
                    </div>
                    <button type="submit" style="margin-top:10px" href="{{ url('/friends') }}" class="btn btn-dark" >Alle anzeigen</button>
                </div> 
            </form>
        </div>
    </div>
    

    
    <!--The table which is seen in the browser -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col">Adresse</th>
                <th scope="col">Geburtstag</th>
                <th scope="col">Sternzeichen</th>
                <th scope="col">Hobbies</th>
                <th scope="col">Social Media</th>


                <th width="350px">Aktionen</th>
            </tr>
        </thead>
            @foreach ($friends as $friend)
        <tbody>
            <tr>
                <td>{{ $i ?? '' }}</td>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->detail }}</td>
                <td>{{ $friend->address }}</td>
                <td>{{ $friend->birthday }}</td>
                <td>{{ $friend->zodiacsign }}</td>
                <td>{{ $friend->hobbies }}</td>
                <td>{{ $friend->socialmedia }}</td>


                <td>
                    <form action="{{ route('friends.destroy',$friend->id) }}" method="POST">
    
                        <a class="btn btn-warning" href="{{ route('friends.show',$friend->id) }}">Zeigen</a>
        
                        <a class="btn btn-warning" href="{{ route('friends.edit',$friend->id) }}">Bearbeiten</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-warning">Löschen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    {!! $friends->links() !!}

</div>


