@inject('strHelper', \App\Helpers\StringHelper::class)

@extends('layout.main', ['page' => 'entry.second'])

@section('title', $title)

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div>
                        @php
                            //echo '<pre>', print_r(\App\Enums\Category::cases(), true), '</pre>';
                        @endphp
                    </div>

                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">{{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <form id="frm-entries" action="{{ route('entry.results') }}" method="post">
                                <table id="table-operations" class="table table-success table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Ação</th>
                                            <th class="text-center">#</th>
                                            <th>Operação</th>
                                            <th>Categoria</th>
                                            <th>Estabelecimento</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td colspan="7">
                                                <div class="mt-2 mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">
                                                        Nome do Arquivo
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="name_file"
                                                            id="name_file" value="{{ 'finance_month_' . date('Y_m_d') }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @foreach ($array_operations as $key => $operation)
                                            @php
                                                $showNumber = $key + 1;
                                            @endphp
                                            <tr id="tr_{{ $key }}">
                                                <td class="text-center v-middle">
                                                    <button class="btn btn-sm btn-danger" id="del_{{ $key }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                                <td class="text-center v-middle">
                                                    {{ $showNumber }}
                                                </td>
                                                <td>
                                                    <div class="w-100 p-1">

                                                        <select class="form-select" readonly="readonly" tabindex="-1"
                                                            aria-disabled="true"
                                                            aria-label="operation_type {{ $key }}"
                                                            id="operation_type_{{ $key }}"
                                                            name="operation_type[{{ $key }}]">
                                                            @foreach (\App\Enums\Operation::cases() as $status)
                                                                <option value="{{ $status->name }}"
                                                                    @if ($operation->operation_type == $status->name) selected @endif>
                                                                    {{ $status->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100 p-1">

                                                        <select class="form-select sel-category"
                                                            aria-label="category {{ $key }}"
                                                            id="category_{{ $key }}"
                                                            name="category[{{ $key }}]"
                                                            operation-type="operation_type_{{ $key }}">

                                                            <optgroup label="Entradas">
                                                                @foreach (\App\Enums\Category::cases() as $status)
                                                                    @if (strpos($status->name, 'entry') !== false)
                                                                        <option value="{{ $status->name }}"
                                                                            @if ($operation->category == $status->name) selected @endif>
                                                                            {{ $status->value }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>

                                                            <optgroup label="Saídas">
                                                                @foreach (\App\Enums\Category::cases() as $status)
                                                                    @if (strpos($status->name, 'expense') !== false)
                                                                        <option value="{{ $status->name }}"
                                                                            @if ($operation->category == $status->name) selected @endif>
                                                                            {{ $status->value }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        </select>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100 p-1">
                                                        <input type="text" class="form-control"
                                                            id="detail_{{ $key }}"
                                                            name="detail[{{ $key }}]"
                                                            value="{!! $strHelper::cleanInput($operation->detail) !!}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100 p-1">
                                                        <input type="date" class="form-control"
                                                            id="operation_date_{{ $key }}"
                                                            name="operation_date[{{ $key }}]" lang="pt-BR"
                                                            value="{!! $strHelper::cleanInput($operation->operation_date) !!}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100 p-1">
                                                        <input type="text" class="form-control"
                                                            id="operation_value_{{ $key }}"
                                                            name="operation_value[{{ $key }}]"
                                                            value="{!! $strHelper::cleanInput($operation->operation_value) !!}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Ação</th>
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
    <link href="{{ asset('assets/css/sb-admin/general.css?vs=' . config('assets.version')) }}" rel="stylesheet">
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/sb-admin/second-step.js?vs=' . config('assets.version')) }}" defer></script>
@endsection
