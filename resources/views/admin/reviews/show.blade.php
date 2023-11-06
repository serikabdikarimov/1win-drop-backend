@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Review {{ $review->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/reviews') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/reviews/' . $review->id . '/edit') }}" title="Edit Review"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/reviews' . '/' . $review->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Review" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $review->id }}</td>
                                    </tr>
                                    <tr><th> Text </th><td> {{ $review->text }} </td></tr><tr><th> Rating </th><td> {{ $review->rating }} </td></tr><tr><th> Lang Id </th><td> {{ $review->lang_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
