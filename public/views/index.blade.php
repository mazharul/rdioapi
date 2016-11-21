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
    <input type="hidden" id="current_page">
    <div class="row">
        <div class="col-md-12">
            <h1>Rdio App</h1>
        </div>
    </div>
    <div>
        <div class="typeahead__container">
            <div class="typeahead__field">

            <span class="typeahead__query">
                <input class="js-typeahead" name="country_v1[query]" type="search" placeholder="Search" autocomplete="off" id="searchText">
            </span>
                <span class="typeahead__button">
                <button type="submit" id="search">
                    <i class="typeahead__search-icon"></i>
                </button>
            </span>

            </div>
        </div>
    </div>

    <div class="col-md-12" id="meta">

    </div>

    <div class="row marketing col-md-12 panel" id="searchData">

    </div>

    <div id="ResultsPaging">
        <button data-action="prev" class="nav-button pure-button">Previous</button>
        <button data-action="next" class="nav-button pure-button">Next</button>
    </div>
</div>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.typeahead.min.js') }}"></script>
<script src="{{ URL::asset('js/index.js') }}"></script>
<script src="{{ URL::asset('js/topArtists.js') }}"></script>
<script src="{{ URL::asset('js/typeahead.js') }}"></script>
</body>
</html>