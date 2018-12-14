@extends('layouts.main')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center">{{ $message }}</p>
    </div>
@endif

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 bg-light">

            <!--
                ===================
                Form Tambah Tags
                ===================
            -->
            <form action="{{ route('tag.store')}}" method="POST" role="form">
                {{-- {{ csrf_field() }} --}}
                @csrf
                <fieldset>
                    <legend>Tambah Tags</legend>
                    <div class="form-group">
                        <label for="tag">Nama Tag</label>
                        <input type="text" class="form-control {{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" id="tag" placeholder="Masukkan nama tag">                    

                        @if ($errors->has('tag'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tag') }}</strong>
                            </span>
                        @endif
                    </div>

                    <fieldset class="form-group">                    
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </fieldset>   
                </fieldset>
            </form>
            
        </div>
    </div>
</div>
@endsection
