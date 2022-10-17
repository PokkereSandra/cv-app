@extends('layouts.cv-app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success success-message">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{asset('/add')}}">
                    <button type="submit" class="btn btn-outline-success add-button">Pievienot CV</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <table class="table table-light cv-table">
                    <thead>
                    <tr>
                        <th scope="col">Vārds</th>
                        <th scope="col">Uzvārds</th>
                        <th scope="col">Dzimšanas dati</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->birth_data}}</td>
                            <td>
                                <a href="{{asset('/cv/'. $user->id)}}">
                                    <button class="btn btn-outline-info">Skatīt</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{asset('/edit/'. $user->id)}}">
                                    <button class="btn btn-outline-warning">Labot</button>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{asset('/destroy')}}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                    <button class="btn btn-outline-danger" type="submit">Dzēst</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
