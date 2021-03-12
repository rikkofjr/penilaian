@extends('layouts.dashboard')
@section('CustomCSS')
<link rel="styleheet" href="{{asset('sb-bootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('Content')
    
<h1 class="h3 mb-4 text-gray-800">Course</h1>
<table class="table" id="myTable">
    <thead>
        <tr>
            <td>Course</td>
            <td>User Enroll</td>
        </tr>
    </thead>
    
    
    <tbody>
        @foreach($user as $userEnrolled)
        <tr>
            <td><a href="{{route('getEnrolledUsers',$userEnrolled['id']) }}">{{$userEnrolled['fullname']}}</a></td>
            <td>10</td>
        </tr>
        @endforeach
    </tbody>
   
</table>
@endsection

@section('CustomJavascript')
<script src="{{asset('sb-bootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('sb-bootstrap/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection