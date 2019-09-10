@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">History</div>
                        <div class="col-md-6 text-right">
                            {{-- <a href="" class="btn btn-outline-primary btn-sm">Download Excel</a> --}}
                            {{-- <a href="{{route('pdf')}}" class="btn btn-outline-primary btn-sm">Download PDF</a> --}}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <table id="report" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>QrCode / Barcode</th>
                                        <th>Scan Date and Time</th>
                                        <th>Status</th>
                                        <th>Part Number</th>
                                        <th>Scan By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- data --}}
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td>{{$report->qrcode}}</td>
                                            <td>{{$report->created_at->format('d/m/Y H:i:s')}}</td>
                                            <td>{{$report->status}}</td>
                                            <td>{{$report->code->sn == 'INVALID' ? $report->code->sn .' OR NO PART' : $report->code->sn}}</td>
                                            <td>{{$report->user->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>QrCode / Barcode</th>
                                        <th>Scan Date and Time</th>
                                        <th>Status</th>
                                        <th>Part Number</th>
                                        <th>Scan By</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')

<script type="text/javascript">
    $(document).ready(function() {
        $('#report').DataTable({
            "order": [[ 1, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    } );
</script>

@endsection
