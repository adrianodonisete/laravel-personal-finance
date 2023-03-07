@extends('layout.main', ['page' => 'entry.second'])

@section('title', $title)

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">{{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Operação</th>
                                            <th>Categoria</th>
                                            <th>Estabelecimento</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($array_operations as $key => $line)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $line[0] }}</td>
                                                <td>{{ $line[1] }}</td>
                                                <td>{{ $line[2] }}</td>
                                                <td>{{ $line[3] }}</td>
                                                <td>{{ $line[4] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Operação</th>
                                            <th>Categoria</th>
                                            <th>Estabelecimento</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                        </tr>
                                    </tfoot>
                                </table>


                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <a class="btn btn-primary btn-block" href="javascript:;">Calcular</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/sb-admin/first-step.js?vs=' . date('hi')) }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous" defer></script>
    <script src="{{ asset('assets/js/sb-admin/datatables-simple.js?vs=' . date('hi')) }}" defer></script>
@endsection
