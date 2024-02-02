@extends('user.layouts.default')
@section('content')
    <div class="container pt-5">
        <div class="col-6">
            <h2>Rút Gọn Link</h2>
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
            <form method="POST" action="{{ route('links.store') }}">
                @csrf
              <div class="mb-3">
                <label for="original_link" class="form-label">Nhập Link</label>
                <input type="text" class="form-control" id="original_link" name="original_link" value="{{ old('original_link') }}">
              </div>
              <div class="mb-3">
                <label for="short_link" class="form-label">Tùy Chỉnh Link</label>
                <input type="text" class="form-control" id="short_link" name="short_link">
              </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Chọn Danh Mục</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
              <button type="submit" class="btn btn-primary">Rut Gon</button>
            </form>
        </div>
        
    </div>
@stop