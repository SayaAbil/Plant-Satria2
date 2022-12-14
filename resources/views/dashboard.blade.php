            @extends('layout')
            @section('content')


            @if (session('addPlant'))
  <script>
  Swal.fire({
  icon: 'success',
  title: 'Wohoo..',
  text: 'Kamu berhasil menambahkan data!',
  })
</script>
                @endif
            @if (session('deletePlant'))
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Wohoo..',
                text: 'Kamu berhasil Mengahpus data!',
              })
              </script>
                @endif
                @if (session('editPlant'))
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Wohoo..',
                text: 'Kamu berhasil Mengedit data!',
              })
              </script>
                @endif
            <div class="content-sign">
                <div class="d-flex flex row g-0">
                    <div class="col-lg-6">
                        <div class="card card1 p-3">
                            <h2 class="title">Add Plant</h2>
                            <div class="row">
                            <div class="d-flex flex-column mt-3 col-6"> 
                                <form action="/create" method="POST">
                                    @csrf
                                    <div class="input-field">
                                        <label>Code Tanaman</label> 
                                        <span class="fa-solid fa-code"></span>
                                        <input class="form-control" type="text" placeholder="B0001" name="code"> 
                                        @error('code')
                                        <p class="text-danger mt-2">
                                          {{$message}}
                                        </p>
                                            
                                        @enderror
                                    </div>
                                    <div class="input-field" style="margin-top: 30px">
                                        <label>Jenis Tanaman</label> 
                                        <span class="fa-solid fa-leaf"></span>
                                        <select class="form-select" type="select" name="type"> 
                                            <option selected hidden disabled>Pilih Jenis Tanaman</option>
                                            <option value="Obat">Obat</option>
                                            <option value="Buah">Buah</option>
                                            <option value="Hias">Hias</option>
                                        </select>
                                        @error('type')
                                        <p class="text-danger  mt-2">
                                          {{$message}}
                                        </p>
                                            
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-check d-flex justify-content-between align-items-center pt-3">
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-3 col-6"> 
                                    <div class="input-field">
                                        <label>Nama Tanaman</label> 
                                        <span class="fa-sharp fa-solid fa-seedling p-2"></span>
                                        <input class="form-control" placeholder="Jahe" name="name">
                                        @error('name')
                                        <p class="text-danger  mt-2">
                                          {{$message}}
                                        </p>
                                            
                                        @enderror
                                    </div>
                                    <div class="input-field password">
                                        <label>Note</label> 
                                        <span class="fa-solid fa-comments"></span>
                                        <input class="form-control password-field"  placeholder="Masukan Notes" name="note">
                                        @error('note')
                                        <p class="text-danger  mt-2">
                                          {{$message}}
                                        </p>
                                            
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-check d-flex justify-content-between align-items-center pt-3 ">
                                    </div>
                                    <button class="mt-4 btn btn-success gradient sign d-flex justify-content-center align-items-center">Masukan Data</button>
                                </div>
                                </div>
                            </div>
                        </div>
                           </form>
                    <div class="carding">
                        <div class="card" style="width: 35rem">
                            <div>
                              <div class="card-header d-flex">
                                <h5>Total Tanaman</h5>
                                <h5 class="ms-3 text-success">
                                  {{ $tanaman->where('id', '!=', null )->count() }}
                                </h5>
                              </div>
                            <div class="card-body">
                                <h5 class="card-title">Tanaman</h5>
                                <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Nama Tanaman</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Pertumbuhan</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    @foreach ($tanaman as $item)
                                        
                                   
                                    <tbody class="table-group-divider">
                                      <tr>
                                        <th class="btn btn-light " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item['code'] }}">{{ $item['code'] }}</th>
                                        <div class="modal fade" id="exampleModal{{ $item['code'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item['code'] }}</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Nama Tanaman: {{ $item['name'] }}</p>
                                                  <p>Jenis: {{ $item['type'] }}</p>
                                                  <p>Pertumbuhan: {{ $item['growth'] }}</p>
                                                  <p>Note: {{ $item['note'] }}</p>

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary btn2" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
                                        <td style="max-width:100px">{{ $item['name'] }}<br><p class="text-secondary text-truncate small">{{ $item['note'] }}</p></td>
                                        <td>{{ $item['type'] }}</td>
                                        @if ( $item['growth'] == null)
                                        <td>-</td>
                                        @else <td>{{ $item['growth'] }}</td>
                                        @endif

                                        <td class="d-flex mt-2" >
                                        <a href="{{route('edit.index',$item['id'])}}" class="btn btn-primary me-2 btn2"><i class="fa-solid fa-pen-to-square"></i></a> 
                                            <form action="{{route('delete',$item['id'])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn2"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                        </td>
                                    
                                      </tr>
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

            @endsection