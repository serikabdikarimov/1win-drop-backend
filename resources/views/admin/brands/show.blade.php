@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Brand {{ $brand->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/brands') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/brands/' . $brand->id . '/edit') }}" title="Edit Brand"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/brands' . '/' . $brand->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Brand" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $brand->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $brand->name }} </td></tr><tr><th> Description </th><td> {{ $brand->description }} </td></tr><tr><th> Url </th><td> {{ $brand->url }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
