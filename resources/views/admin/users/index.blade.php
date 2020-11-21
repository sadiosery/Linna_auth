@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">{{ __('Groupe utilisateur') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td scope="col">{{$user->name}}</td>
                                <td scope="col">{{$user->email}}</td>
                                <td scope="col">{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td scope="col">
                                    <a href="{{route('admin.users.edit', $user->id)}}"><button class="btn btn-primary"></button>Editer</a>
                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Supprimer</button>
                                    </form>


                                </td>

                        </tr>
                        @endforeach
                         </tbody>

                    </table>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
