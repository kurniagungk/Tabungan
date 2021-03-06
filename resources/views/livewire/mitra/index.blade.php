<div class="row">

    <div class="col-xl col-lg">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Mitra</h5>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if (session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session('pesan') }}
                </div>
                @endif

                <a class="btn btn-primary btn-icon-split" href="{{route('mitra.create')}}">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Data</span>
                </a>
                <!-- <a class="btn btn-success btn-icon-split" href="#">
                    <span class="icon text-white-50">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="text">Import</span>
                </a>
                <a class="btn btn-warning btn-icon-split" href="#">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Export</span>
                </a> -->
                <div class="my-2"></div>
                <br>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Saldo</th>
                                <th>
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mitra as $m)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$m->email}}</td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->saldo}}</td>
                                <td>
                                    <center>
                                        <a href="{{route('mitra.edit', $m->id)}}" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @if($confirming == $m->id)
                                        <button wire:click="kill('{{ $m->id }}')" type="button" class="btn btn-danger btn-sm">Sure?</button>

                                        @else
                                        <button wire:click="confirmDelete( '{{ $m->id }}' )" type="button" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @endif

                                    </center>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>