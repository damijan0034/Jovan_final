@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>All Messages</h2>
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
                                    <th>Title</th>
                                    <th>From</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($messages as $message)
                                   <tr>
                                    <td>{{ $message->title }}</td>
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ $message->user->email }}</td>

                                    <td>
                                       {{ $message->product->name }}
                                    </td>
                                   <td>
                                    <a href="/admin/single_message/{{ $message->id }}" class="btn btn-info">Show</a>
                                   </td>

                                      

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
