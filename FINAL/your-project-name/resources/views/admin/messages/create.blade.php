@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Message</h2>
                    <a href="" class="btn btn-sm btn-primary float-end">Add New</a>
                </div>

               

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                               
                                    {{ $error }}
                               
                               
                            @endforeach
                        </div>    
                    @endif
                     <form action="{{ route('send_message') }}" method="post" ">
                        @csrf
                        
                        <div class="mb-3">
                            <label  class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           
                          </div>
                          <div class="mb-3">

                            <div class="mb-3">
                                <label for="">Body</label>
                                <textarea   class="form-control" name="body"  rows="4"> {{ old('small_description','') }}</textarea>
                            </div>
                            <div class="mb-3">
                               
                                <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
                               
                              </div>
                              <div class="mb-3">
                                
                                <input type="hidden" value="1" name="recever_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               
                              </div>

                              <div class="mb-3">
                               
                                <input type="hidden" name="product_id" class="form-control" value="{{ $product->id }}">
                               
                              </div>
                     
                          
                         
                              
                      
                        <button type="submit" class="btn btn-success">Send</button>
                      
                    </form> 
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
