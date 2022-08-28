@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <h2>Audit Logs</h2>
            <span>{{ $audits->total() }} records found.</span>
            <table class="table">
                <thead>
                    <tr><th>Log ID</th><th>User ID</th><th>Action</th><th>Timestamp</th></tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                    <tr><td>{{ $audit->id }}</td><td>{{ $audit->user }}</td><td>{{ $audit->actions }}</td><td>{{ $audit->timestamp }}</td></tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr><td colspan="4">{{ $audits->links() }}</td></tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection



