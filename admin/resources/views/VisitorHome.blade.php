@extends('Layout.app')

@section('content')


<div class="page-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">NO</th>
                        <th class="th-sm">IP</th>
                        <th class="th-sm">Date & Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitors as $visitor)
                    <tr>
                        <th class="th-sm">{{$loop->iteration}}</th>
                        <th class="th-sm">{{$visitor->ip_address}}</th>
                        <th class="th-sm">{{$visitor->visit_time}}</th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#VisitorDt').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
