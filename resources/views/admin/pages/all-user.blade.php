@extends('admin.layouts.default')
@section('content')
    
<div class="container pt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Links</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('detaiUser', ['detai_user' => $user->id]) }}" role="button">Show</a>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
         </table>
        
    </div>

@stop