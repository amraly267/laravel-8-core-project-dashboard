@extends('landpage::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('landpage.name') !!}
    </p>

    <form action="{{route('landpage.store')}}" method="POST">
        @csrf @method('post')
        <input type="text" name="project_name" placeholder="project name"/>
        <input type="text" name="db_name" placeholder="db name"/>
        <input type="text" name="db_username" placeholder="db username"/>
        <input type="password" name="db_password" placeholder="db password"/>
        <input type="text" name="email" placeholder="admin email"/>
        <input type="text" name="name" placeholder="admin name"/>
        <input type="password" name="password" placeholder="admin password"/>
        <input type="submit"/>
    </form>



@endsection
