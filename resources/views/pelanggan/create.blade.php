@extends('admin-theme._master')

@section('judul', 'create data')

@section('isi')


    <div class="row mt-4">
        <div class="col-10">
            <div class="card-header">
                INPUT DATA TRAVELER
                <a class="btn btn-warning float-right"
                   href="{{ url ('customer')}}">
                    <i class="fas fa-backward"></i>back
                </a>
            </div>
            <div class="card-body" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url ('customer/store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama"class="form-control" value="{{old('nama')}}">

                        <div class="form-group">
                            <label >PHONE</label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                        </div>

                        <div class="form-group">
                            <label >EMAIL</label>
                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label >ALAMAT</label>
                            <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}">
                        </div>
                        <div class="form-group">
                            <label>DURASI</label>
                            <select class="form-control" name="durasi" value="{{old('durasi')}}">
                                <option>- DURASI -</option>
                                <option>2 HARI</option>
                                <option>3 HARI</option>
                                <option>4 HARI</option>
                                <option>5 HARI</option>
                                <option>6 HARI</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >HARGA</label>
                            <input type="text" name="harga" class="form-control"value="{{old('harga')}}">
                        </div>
                        <div class="form-group">
                            <label>PAKET</label>
                            <select class="form-control" name="id_paket" value="{{old('id_paket')}}">
                                <option>- PAKET -</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>TUJUAN</label>
                            <select class="form-control" name="id_tujuan" value="{{old('id_tujuan')}}">
                                <option>- TUJUAN -</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" name="submit" value="save ">
                        <a class="btn btn-warning float-right"
                           href="{{ url ('customer') }}">
                            <i class="fas fa-backward"></i> cancel </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
