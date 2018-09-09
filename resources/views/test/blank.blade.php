@extends('template.template')

@section('css')
@endsection()

@section('js')
@endsection()

@section('nav')
<li><a href="javascript:void(0);">Home</a></li>
<li><a href="javascript:void(0);">Library</a></li>
<li><a href="javascript:void(0);">Data</a></li>
@endsection()

@section('content')
blank
{{-- <div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>
                VERTICAL LAYOUT
            	<small>Description</small>
            </h2>
        </div>
        <div class="body">
            <form method="post" action="">
            	@csrf
                <label for="email_address">Email Address</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="email_address" class="form-control" placeholder="Enter your email address">
                    </div>
                </div>
                <label for="password">Password</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
            </form>
        </div>
    </div>
</div> --}}
@endsection()