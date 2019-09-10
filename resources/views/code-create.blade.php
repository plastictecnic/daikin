@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Part Code</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{route('code.store')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <input required type="text" name="sn" class="form-control" placeholder="Part Number">
                                    </div>
                                    <div class="col">
                                        <input required type="text" name="description" class="form-control" placeholder="Description">
                                    </div>
                                    <div class="col">
                                        <input type="submit" class="btn btn-primary" value="Add Part">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($codes as $code)
                                <tr>
                                    <th scope="row">{{$counter++}}</th>
                                    <td>{{$code->sn}}</td>
                                    <td>{{$code->description}}</td>
                                    <td>{{$code->created_at->format('d/m/Y H:i:s')}}</td>
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
