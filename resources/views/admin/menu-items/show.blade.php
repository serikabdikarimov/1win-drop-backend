@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">MenuItem {{ $menuitem->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/menu-items') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/menu-items/' . $menuitem->id . '/edit') }}" title="Edit MenuItem"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/menuitems' . '/' . $menuitem->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete MenuItem" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $menuitem->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $menuitem->name }} </td></tr><tr><th> Code </th><td> {{ $menuitem->code }} </td></tr><tr><th> Is Active </th><td> {{ $menuitem->is_active }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
