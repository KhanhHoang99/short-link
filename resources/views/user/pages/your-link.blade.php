@extends('user.layouts.default')
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
                <th scope="col">Id</th>
                <th scope="col">Original Link</th>
                <th scope="col">Short Link</th>
                <th scope="col">Create At</th>
                <th scope="col">Visit Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->original_link }}</td>
                        <td>{{ $link->short_link }}</td>
                        <td>{{ $link->created_at }}</td>
                        <td>{{ $link->visit_count }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('linkRedirect', ['short_link' => $link->short_link]) }}" role="button">Go To</a>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
         </table>
        
    </div>
@stop