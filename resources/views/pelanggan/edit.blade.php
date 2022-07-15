@extends('admin-theme._master')

@section('judul', 'update data')

@section('isi')

    <div class="row mt-4">
        <div class="col-10">
            <div class="card-header bg-primary text-white" >
                UPDATE DATA CUSTOMER
                <a href="{{ url ('customer')}}">
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
                <form action="{{route('customer.update', $customer->id)}}" method="post" >
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama"class="form-control" value="{{$customer->nama}}">

                        <div class="form-group">
                            <label >PHONE</label>
                            <input type="text" phone="kode" class="form-control" value="{{$customer->phone}}" >
                        </div>
                        <div class="form-group">
                            <label >E-MAIL</label>
                            <input type="text" name="email" class="form-control" value="{{$customer->email}}">
                        </div>
                        <div class="form-group">
                            <label >ALAMAT</label>
                            <input type="text" name="alamat" class="form-control" value="{{$customer->alamat}}">
                        </div>

                        <div class="form-group">
                            <label>DURASI</label>
                            <select class="form-control" name="durasi" value="{{$customer->durasi}}">
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
                            <input type="text" name="harga" class="form-control" value="{{$customer->harga}}">
                        </div>
                        <div class="form-group">
                            <label>PAKET</label>
                            <select class="form-control" name="id_paket" value="{{$customer-> id_paket}}">
                                <option>- PAKET -</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>TUJUAN</label>
                            <select class="form-control" name="id_tujuan" value="{{($customer-> id_tujuan)}}">
                                <option>- TUJUAN -</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" name="submit" value="save ">
                        <a class="btn btn-warning float-right"
                           href="{{ url ('customer') }}">
                            <i class="fas fa-backward"></i>cancel </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
