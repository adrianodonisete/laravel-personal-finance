@extends('layout.main', ['page' => 'entry.first'])

@section('title', $title)

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">{{ $title }}</h3>
                        </div>

                        <div class="card-body">
                            <div id="show-error"
                                style="display:none;">
                                <h3 class="alert alert-danger">
                                    Preencha as entradas e saídas
                                </h3>
                            </div>

                            <form id="frm-entries"
                                action="{{ route('entry.second') }}"
                                method="post">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea class="form-control"
                                                id="list_operations"
                                                name="list_operations"
                                                style="height:500px;"></textarea>
                                            <label for="list_operations">Colar entradas e saídas</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-block"
                                            id="bt-submit"
                                            type="button">
                                            Seguir para o passo 2
                                        </button>
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

@section('javascript')
    <script src="{{ asset('assets/js/sb-admin/first-step.js?vs=' . config('assets.version')) }}"
        defer></script>
@endsection
