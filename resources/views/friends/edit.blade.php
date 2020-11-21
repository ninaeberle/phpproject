@extends('friends.layout')
   
@section('content')

<!-- The blade for the "bearbeiten" function -->

    <style>
        .editfriendsblack {
            font-family: 'Futura';
            background: black;
        }
    </style>

    <div class="editfriendsblack">
        <div class="row">
            <div class="col-lg-12 margin-tb" style="margin-top:20px; margin-bottom:20px; margin-left:10px">
                <div class="pull-left">
                    <h2 style="color:white">Freund bearbeiten</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-warning" style="margin-right:20px" href="{{ route('friends.index') }}"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hier gab es Probleme mit der Eingabe.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('friends.update',$friend->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $friend->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $friend->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse:</strong>
                    <input type="text" name="address" value="{{ $friend->address }}" class="form-control" placeholder="Adresse">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Geburtstag</strong>
                    <input type="date" name="birthday" value="{{ $friend->birthday }}" class="form-control" placeholder="Geburstag">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sternzeichen</strong>
                    <input type="string" name="zodiacsign" value="{{ $friend->zodiacsign }}" class="form-control" placeholder="Sternzeichen">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hobbies</strong>
                    <input type="string" name="hobbies" value="{{ $friend->hobbies }}" class="form-control" placeholder="Hobbies">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Social Media</strong>
                    <input type="text" name="socialmedia" value="{{ $friend->socialmedia }}" class="form-control" placeholder="Social Media">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-warning" style="margin:20px">Fertig!</button>
            </div>
        </div>
   
    </form>

    


    
@endsection




