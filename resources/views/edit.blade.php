@extends('layout')
@section('content')

<div class="content-sign">
    <div class="d-flex flex row g-0">
        <div class="col-lg-6">
            <div class="card card1 p-3">
                <h2 class="title">Edit Plant</h2>
                <p> <a class="text-decoration-none" href="/" style="color: #19C078;" >Lihat Data Disini!</a></p>
                <div class="row">
                    <div class="d-flex flex-column mt-3 col-6"> 
                        <form action="/edit/{{ $tanaman->id }}" method="POST">
                            @method('patch')
                            @csrf
                        <div class="input-field">
                            <label>Code Tanaman</label> 
                            <span class="fa-solid fa-code"></span>
                            <input class="form-control" type="text" placeholder="B0001" name="code" value="{{ $tanaman['code'] }}" > 
                        </div>
                        <div class="input-field" style="margin-top: 30px">
                            <label>Jenis Tanaman</label> 
                            <span class="fa-solid fa-leaf"></span>
                            <select class="form-select" type="select" name="type"> 
                                <option selected hidden disabled>Pilih Jenis Tanaman    </option>
                                <option value="Obat" @if($tanaman['type'] == 'Obat') selected @endif>Obat</option>
                                <option value="Buah" @if($tanaman['type'] == 'Buah') selected @endif>Buah</option>
                                <option value="Hias" @if($tanaman['type'] == 'Hias') selected @endif>Hias</option>
                            </select>
                        </div>
                        <div class="input-field" style="margin-top: 30px; width: 520px;">
                            <label>Pertumbuhan</label> 
                            <span class="fa-solid fa-spa"></span>
                            <select class="form-select" type="select" name="pertumbuhan"> 
                                <option selected hidden disabled>Perkembangan Tanaman</option>
                                <option value="Tunas" @if($tanaman['growth'] == 'Tunas') selected @endif>Tunas</option>
                                <option value="Berbatang"@if($tanaman['growth'] == 'Berbatang') selected @endif>Berbatang</option>
                                <option value="Berbuah"@if($tanaman['growth'] == 'Berbuah') selected @endif>Berbuah</option>
                            </select>
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-between align-items-center pt-3">
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-3 col-6"> 
                        <div class="input-field">
                            <label>Nama Tanaman</label> 
                            <span class="fa-sharp fa-solid fa-seedling p-2"></span>
                            <input class="form-control" placeholder="Jahe" name="name" value="{{ $tanaman['name'] }}">
                        </div>
                        <div class="input-field password">
                            <label>Note</label> 
                            <span class="fa-solid fa-comments"></span>
                            <input class="form-control password-field"  placeholder="Masukan Notes" name="note" value="{{ $tanaman['note'] }}">
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-between align-items-center pt-3 mt-5 ">
                        </div>
                        <button class="mt-5 btn btn-success gradient sign d-flex justify-content-center align-items-center">Masukan Data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="edit-image d-flex">
        <img src="{{asset("assets/img/plant.png")}}">
        </div>
    </div>
    
    
    
</div>

@endsection