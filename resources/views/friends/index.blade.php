@extends('friends.layout')
 
@section('content')


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
                    <h2 style="margin-top:50px; margin-left:10px; margin-bottom:80px; color:white" >Dein digitales <strong>FriendBOOK</strong> </h2>                
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

                <th width="350px">Aktionen</th>
            </tr>
        </thead>
            @foreach ($friends as $friend)
        <tbody>
            <tr>

                <td>{{ ++$i }}</td>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->detail }}</td>
                <td>{{ $friend->address }}</td>
                <td>{{ $friend->birthday }}</td>
                <td>{{ $friend->zodiacsign }}</td>
                <td>{{ $friend->hobbies }}</td>



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
      
@endsection