<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plastictecnic Sdn. Bhd. Daikin - {{ \Carbon\Carbon::now()->format('dmYHis') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
    </style>
</head>
<body>
    <div class="p-4">
        <div class="row">
            <div class="col-md-6">
                <h3><img style="width: 54px;" src="{{ asset('images/logo.png') }}" alt="Plastictecnic Sdn. Bhd."> <span>Plastictecnic Sdn. Bhd.</span></h3>
            </div>

            <div class="col-md-6 text-right">
                <p>Scaned data history for Daikin</p>
                <p>Data/Time : {{ \Carbon\Carbon::now()->format('d\m\Y - H:i:s') }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">QrCode / Barcode</th>
                            <th scope="col">Scan Date and Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Part Number</th>
                            <th scope="col">Scan By</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- data --}}
                        @foreach ($data as $report)
                            <tr>
                                <td>{{$report->qrcode}}</td>
                                <td>{{$report->created_at->format('d/m/Y H:i:s')}}</td>
                                <td class="text-center {{ $report->status == 'FAIL' ? 'bg-danger' : '' }}">{{$report->status}}</td>
                                <td>{{$report->code->sn == 'INVALID' ? $report->code->sn .' OR NO PART' : $report->code->sn}}</td>
                                <td>{{$report->user->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
