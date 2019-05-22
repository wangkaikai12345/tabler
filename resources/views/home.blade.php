@extends('layouts.app')
@section('styles')
    @parent
    <link href="{{ asset('assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />

@endsection

<style>
    @media (max-width: 600px) {
        tr, td, th, thead, tbody, table {
            display: block;
        }

        table {
            display: flex;
            overflow: hidden;
        }

        tr {
            margin: .2em 0;
        }

        thead {
            --cols: 5;
            --height: calc(1.4em * var(--cols));
            text-shadow: 0 var(--height),
            0 calc(var(--height) * 2),
            0 calc(var(--height) * 3),
            0 calc(var(--height) * 4); /* extra shadows are still ok */
        }

        th {
            text-align: left;
        }

        td:not(:first-child) {
            border-top: none;
        }
    }

    /* Just styling after this */
    body {
        font: 150%/1.6 Helvetica Neue, sans-serif;
    }

    table {
        border-spacing: 0;
        border-collapse: collapse;
    }

    td, th {
        padding: 0 .3em;
        white-space: nowrap;
    }

    td {
        border: 1px solid rgba(0,0,0,.1);
    }
</style>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                @component('tabler::components.alert',[
                    'type' => 'success'  //default type is success if you not declare the alert type
                  ])
                    @slot('text')
                        test
                    @endslot
                @endcomponent
            @endif

            @component('tabler::components.panel')
                @slot('title', '表格移动端响应式')
                @slot('body')
                    <div class="col-12">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>

                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>

                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>

                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>

                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Chart title</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-donut" style="height: 12rem;"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                @endslot

            @endcomponent

        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('assets/plugins/charts-c3/plugin.js') }}"></script>
    <script>
        require(['c3', 'jquery'], function(c3, $) {
            $(document).ready(function(){
                var chart = c3.generate({
                    bindto: '#chart-donut', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ['data1', 63],
                            ['data2', 37]
                        ],
                        type: 'donut', // default type of chart
                        colors: {
                            'data1': tabler.colors["green"],
                            'data2': tabler.colors["green-light"]
                        },
                        names: {
                            // name of each serie
                            'data1': 'Maximum',
                            'data2': 'Minimum'
                        }
                    },
                    axis: {
                    },
                    legend: {
                        show: false, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            });
        });
    </script>
@endsection



