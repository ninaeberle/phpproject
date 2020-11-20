@extends('friends.layout')
  
@section('content')

    <style>
        .showfriendsblack {
            font-family: 'Futura';
            background: black;
        }
    </style>

    <div class="showfriendsblack">
        <div class="row">
            <div class="col-lg-12 margin-tb" style="margin-top:20px; margin-bottom:20px; margin-left:10px">
                <div class="pull-left">
                    <h2 style="color:white"> Zeige Freunde</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-warning" style="margin-right:20px" href="{{ route('friends.index') }}"> Zurück</a>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $friend->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $friend->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse:</strong>
                {{ $friend->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Geburtstag:</strong>
                {{ $friend->birthday }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sternzeichen:</strong>
                {{ $friend->zodiacsign }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hobbies:</strong>
                {{ $friend->hobbies }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Social Media:</strong>
                {{ $friend->socialmedia }}
            </div>
        </div>
    </div>
@endsection


