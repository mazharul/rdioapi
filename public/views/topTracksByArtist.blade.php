<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rdio App</title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery.typeahead.min.css') }}" rel="stylesheet">

    <style type="text/css">
        #ResultsPaging {
            display : none;
        }
    </style>
</head>

<body>
<div class="container">
    <input type="hidden" id="base_uri" value="{{ url('/') }}">
    <input type="hidden" id="mbid_data" value="{{ $mbid }}">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/') }}"> <h1>Rdio App</h1></a>
        </div>
    </div>

    <div class="col-md-12" id="meta">

    </div>

    <div class="row marketing col-md-12 panel" id="topTracks">

    </div>

</div>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/index.js') }}"></script>
<script src="{{ URL::asset('js/topTracks.js') }}"></script>
</body>
</html>