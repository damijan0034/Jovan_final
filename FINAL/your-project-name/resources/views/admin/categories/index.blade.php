@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>All Categories</h2>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>

               

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($categories as $category)
                                   <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <img width="100" height="60" src="{{ asset('storage/'.$category->image) }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit',[$category->slug]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        
                                      <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Delete
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Category: {{ $category->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Are you really delete this category?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">NO</button>
                                           
                                             <form action="{{ route('admin.categories.destroy',[$category->slug]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                        </form> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
