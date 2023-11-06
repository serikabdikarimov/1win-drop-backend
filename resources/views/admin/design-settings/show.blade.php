@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">DesignSetting {{ $designsetting->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/design-settings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/design-settings/' . $designsetting->id . '/edit') }}" title="Edit DesignSetting"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/designsettings' . '/' . $designsetting->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete DesignSetting" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $designsetting->id }}</td>
                                    </tr>
                                    <tr><th> Body Font Size </th><td> {{ $designsetting->body_font_size }} </td></tr><tr><th> Body Color </th><td> {{ $designsetting->body_color }} </td></tr><tr><th> Body Line Height </th><td> {{ $designsetting->body_line_height }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
