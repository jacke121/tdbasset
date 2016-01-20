@extends('themes.default.layouts')

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/index.css">

<script src="../js/index.js"></script>
</head>
  @include('themes.default.top')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
        <div class="center">
            <ul class="control">
                <li style="width:334px;"><a href="/auth/register/publisher" class="current">注册发布方</a></li>
                <li style="width:333px;"><a href="/auth/register/handler">注册处置方</a></li>
            </ul>
            </div>
            </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
