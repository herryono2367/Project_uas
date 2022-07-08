@extends('admin-theme._master')

@section('judul', 'Data Pelanggan')

@section('isi')


    <div class="row mt-4">
        <div class="col-13">
            <div class="card-header">
                DATA CUSTOMER TRAVEL
                <a class="btn btn-primary float-right"
                   href="{{ url ('customer/create')}}"> <i class="fas fa-plus-square"></i>tambah data </a></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background-color: #00f5ff;">
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>PHONE</th>
                        <th>E-MAIL</th>
                        <th>ALAMAT</th>
                        <th>DURASI</th>
                        <th>HARGA </th>
                        <th>PAKET </th>
                        <th>TUJUAN </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$customer->nama}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->alamat}}</td>
                            <td>{{$customer->durasi}}</td>
                            <td>{{$customer->harga}}</td>
                            <td>{{$customer->paket->paket}}</td>
                            <td>{{$customer->tujuan->tujuan}}</td>
                            <td >
                                <a href="{{url('customer/edit')}}/{{$customer->id}}" class="btn btn-warning">update</a>
                            </td>
                            <td>
                                <form action="{{ url("customers/{$customer->id}")}}" method="post"  >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
