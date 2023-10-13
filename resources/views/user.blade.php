@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-3 col-lg-1 col-md-2" id="name">Name</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="name" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-3 col-lg-1 col-md-2" id="email">Email</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="email" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-3 col-lg-1 col-md-2" id="chip">Role</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="chip" 
                        @if (Auth::user()->id_role === 1 ) value="admin" @else value="player" @endif   disabled>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-3 col-lg-1 col-md-2" id="chip">Chip</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="chip" value="{{Auth::user()->chip}} $" disabled>
                    </div>
                      
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
