@extends('admin.layout')
@section('content')
    <br>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Transaksi : <b>{{ $data[0]->name }}</b></h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-transaksi.update', $data[0]->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Obat"
                                    value="{{ $data[0]->name }}" disabled />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Nama Obat"
                                    value="{{ $data[0]->email }}" disabled />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="" class="form-control">
                                    <option disabled selected>-- Pilih Status --</option>
                                    <option value="PENDING"{{ $data[0]->status == 'PENDING' ? 'selected' : '' }}>PENDING
                                    </option>
                                    <option value="SUCCESS" {{ $data[0]->status == 'SUCCESS' ? 'selected' : '' }}>SUCCESS
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <a href="{{ route('admin-transaksi.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
