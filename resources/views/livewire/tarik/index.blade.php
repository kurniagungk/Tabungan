<div class="col-xl col-lg">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->

        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tarik Dana</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        <!-- search -->


        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12">

                    @if (session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form wire:submit.prevent="cari">
                                <div class="input-group">
                                    <input wire:model.lazy="search" autofocus type="text" id="cari" class="form-control " placeholder="Search for...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="sumbit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                @if($tarik)
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Rekening : </label>
                                <label for="staticEmail" class="col-sm-8 col-form-label">{{$santri->nis}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama : </label>
                                <label for="staticEmail" class="col-sm-8 col-form-label">{{$santri->nama}}</label>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Sekolah : </label>
                                <label for="staticEmail" class="col-sm-8 col-form-label">{{$santri->sekolah}}</label>
                            </div> -->
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Saldo : </label>
                                <label for="staticEmail" class="col-sm-8 col-form-label">{{$santri->saldo}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">ID.Trx : </label>
                                <label for="staticEmail" class="col-sm-8 col-form-label">{{substr($transaksi_id,0,8)}}</label>
                            </div>

                            <form wire:submit.prevent="cek">


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input wire:model.lazy="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" autocomplete="off">
                                    @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <center>
                                    <button class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-Download"></i>
                                        </span>
                                        <span class="text">Tarik</span>
                                    </button>
                                </center>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-8">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Setor</th>
                                        <th scope="col">Tarik</th>
                                        <th scope="col">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> Saldo Awal </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td>{{$saldo}}</td>
                                    </tr>
                                    @foreach($transaksi as $t)
                                    <tr>
                                        <td>{{$loop->index +2}}</td>

                                        <td>{{$t['tanggal']}}</td>
                                        <td>{{$t['setor']}}</td>
                                        <td>{{$t['tarik']}}</td>
                                        <td>{{$t['total']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>

    </div>
</div>

<livewire:tarik.modal>

    @push('scripts')
    <script type="text/javascript">
        window.livewire.on('cari', () => {
            setTimeout(function() {
                document.getElementById("jumlah").focus();
            }, 200);
        });

        window.livewire.on('succes', () => {
            setTimeout(function() {
                $('#cek').modal('hide')
                document.getElementById("cari").focus();
            }, 200);

            setTimeout(function() {
                document.getElementById("cari").focus();
            }, 300);

        });

        window.livewire.on('cek', () => {
            console.log('modal show')
            setTimeout(function() {
                $('#cek').modal('show');

            }, 200);
        });

        $('#cek').on('shown.bs.modal', function() {
            $('#paswordcek').trigger('focus')
        });
    </script>
    @endpush
