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

                            @php
                                echo '<pre>', print_r($results, true), '</pre>';
                            @endphp


                            <table class="table table-success table-hover"
                                id="table-operations">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($results as $desc => $total)
                                        @if ($desc == 'general')
                                            <tr>
                                                <td>
                                                    Todas operações
                                                </td>
                                                <td>
                                                    {{ $total }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    @php
                                        $entradas = $results['type_entries'] ?? 0;
                                        $despesas = $results['type_expenses'] ?? 0;
                                        $resultado = $entradas - $despesas;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ \App\Enums\Operation::getValue('entries') }}
                                        </td>
                                        <td>
                                            {{ $entradas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ \App\Enums\Operation::getValue('expenses') }}
                                        </td>
                                        <td>
                                            {{ $despesas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Resultado
                                        </td>
                                        <td>
                                            {{ $resultado }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    @foreach ($results as $desc => $total)
                                        @if (substr($desc, 0, 9) == 'category_')
                                            <tr>
                                                <td>
                                                    {{ $operation = \App\Enums\Category::getValue(str_replace('category_', '', $desc)) }}
                                                </td>
                                                <td>
                                                    {{ $total }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>

                            <div class="mt-5">
                                <form action="{{ route('download.csv') }}"
                                    method="post"
                                    target="_blank">
                                    @csrf

                                    <input id="name_file"
                                        name="name_file"
                                        type="hidden"
                                        value="{{ $name_file }}">

                                    <textarea id="content_file_csv"
                                        name="content_file_csv"
                                        style="visibility:hidden;">{{ $contentFile }}</textarea>

                                    <button class="btn btn-primary"
                                        type="submit">Salvar Arquivo</button>
                                </form>
                            </div>

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
