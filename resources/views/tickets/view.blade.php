@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    View Ticket Details
                </div>
                <div class="float-end">
                    <a href="{{ route('tickets') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('send-response') }}" method="post">
                    @csrf
                    @method("POST")
                    <input type="hidden" value="{{$ticket->id}}" name="ticketId">

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Ticket ID</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control diabled @error('code') is-invalid @enderror" disabled value="{{ $ticket->id }}">
                            
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" disabled id="name" name="name" value="{{ $ticket->title }}">
                           
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" disabled id="description" name="description">{{ $ticket->description }}</textarea>
                       
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Ticket Created By</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" disabled  value="{{ $ticket->user->name }}">
                           
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Staff Remarks</label>
                        <div class="col-md-6">
                            <textarea class="form-control"  id="remarks" name="remarks"></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Send Notification">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection