@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Main Page</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            @if (session('ok'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('ok') }}
                                </div>
                            @endif

                            <form action="{{route('set.code')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <select {{ Cookie::get('part_num') ? 'disabled' : ''}} required name="code" class="inputs">
                                            <option value="">Choose part</option>
                                            @foreach ($codes as $code)
                                                <option value="{{$code->id}}">{{$code->sn}} - {{$code->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input {{ Cookie::get('part_num') ? 'disabled' : ''}} type="submit" class="btn btn-primary btn-sm button" value="SET PART">
                                    </div>
                                </div>
                            </form>

                            <br>
                            <hr>
                            <br>

                            <form name="myform" action="{{ route('check') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4"><input class="inputs" type="text" name="qrcode" autofocus required onkeydown="this.my_no_focus = true;"></div>
                                    <div class="col-md-4"><input type="submit" class="btn btn-primary btn-sm button" value="VERIFY"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-center">
                            @if (session('alert'))
                                <div class="bahaya">
                                    {{ session('alert') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="terbaik">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>


                    <br>
                    <hr>
                    <br>
                    @if (Cookie::get('part_num'))
                        <h1 class="text-center">PART: <span style="color:red; font-weirght:bold;"> {{Cookie::get('part_num')}}</span></h1>
                    @endif
                    <br>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">QrCode</th>
                                <th scope="col">Scan Date/Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">By Who</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parts as $part)

                                <tr>
                                    <th scope="row">{{$counter++}}</th>
                                    <td>{{$part->qrcode}}</td>
                                    <td>{{$part->created_at->format('d/m/Y H:i:s')}}</td>
                                    <td>{{ $part->status }}</td>
                                    <td> {{ $part->user->name }} </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
