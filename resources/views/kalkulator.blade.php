@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pool') }}</div>

                <div class="card-body d-flex flex-column justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach ($data as $pot)
                        <h1 class="m-auto mb-4" >{{$pot->pot_amount}}</h1>
                    @endforeach
                    

                    <!-- Button trigger modal -->
                    @if (Auth::user()->id_role === 1 )
                    <div class="d-flex justify-content-center">
                   
                    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Winner
                    </button>

                    <a type="reset" class="btn btn-danger " value="" href="{{route('kalkulator.reset')}}">Reset</a>
                    </div>
                    @else 
                    <button type="button" class="btn btn-primary col-4 m-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: none">
                        Winner
                    </button>
                    @endif
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Pemenang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Id</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($winner as $win)
                                        <form action="{{route('kalkulator.update', ['kalkulator' => $win->id])}}" method="POST">
                                        @csrf
                                        {{@method_field('put')}}
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$win->id}}</td>
                                            <td>{{$win->name}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" type="submit" name="chip" value="{{$win->chip + $pot->pot_amount }}" >Win!</button>
                                            </td>
                                        </tr>
                                        </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
  </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Saldo') }} - {{Auth::user()->chip}}$</div>

                <div class="card-body d-flex justify-content-center" style="flex-direction: column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('kalkulator.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="input-group input-group-md mb-3">
                        <input type="hidden" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="user_id"  value="{{Auth::user()->id}}" >
                        <input type="number" class="form-control" id="input-bet" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="bet_amount" step="5"  >
                        <button class="btn btn-sm btn-success" >Bet!</button>
                    </div>
                    </form>
                    <div class="input-group input-group-sm mb-3">
                        
                        <div class="m-auto">
                        <button class="btn btn-sm btn-success mr-1" onclick="ubahNilaiInput(10)">10</button>
                        <button class="btn btn-sm btn-success mr-1" onclick="ubahNilaiInput(20)" >20</button>
                        <button class="btn btn-sm btn-success mr-1" onclick="ubahNilaiInput(30)">30</button>
                        <button class="btn btn-sm btn-success mr-1" onclick="ubahNilaiInput(50)">50</button>
                        <button class="btn btn-sm btn-success mr-1" onclick="ubahNilaiInput(80)">80</button>
                        <button class="btn btn-sm btn-success " onclick="ubahNilaiInput(100)">100</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ubahNilaiInput(number) {
    // Mengambil elemen input berdasarkan ID
    var inputElement = document.getElementById('input-bet');

    // Mengganti nilai input dengan nilai baru
    inputElement.value = number;
}

</script>
@endsection
