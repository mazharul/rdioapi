// Library code

var library = {

    getTopArtistsUri : 'api/artists?country=',

    getTopTracksByArtistsUri : '/api/artists/',

    getTopTracksByArtistsPostfixUri : '/top-tracks',


    initiateSearch : function (searchedCountry, page) {
        this.clearAll();
        var uri = this.getTopArtistsUri + searchedCountry;
        if (page > 1) {
            uri = uri + '&page=' + page;
        }
        this.callAjax(uri, this.successHandler);
    },

    initiateTopTracksPageLoad : function(mbid) {
        var base_uri = $("#base_uri").val();
        var uri = base_uri + this.getTopTracksByArtistsUri + mbid + this.getTopTracksByArtistsPostfixUri;
        this.callAjax(uri, this.successHandlerTopTracksByArtist);
    },

    clearAll : function () {
        $("#current_page").removeAttr('value');
    },

    callAjax : function (uri, callback) {
        $.ajax({
            url: uri,
            method: 'GET',
            dataType: 'json',
            success: callback,
            error: this.errorHandler
        });
    },

    successHandler : function (data) {
        if (data.data != '') {
            var content = '';
            $.each(data.data, function (i , elem) {
                var link = '/artists/' + elem.mbid + '/top-tracks';
                content += '<div class="panel panel-default"><div class="panel-body">';
                content += '<a href=' + link + '>';
                content += '<img src="' + elem.image.small + '" />';
                content += '</a>';
                content += '<span>' + elem.name + '</span>';
                content += '</div></div>';
             });

            $("#searchData").html(content);

            var curr_page = data.meta.current_page;
            $("#current_page").val(curr_page);

            // generate Meta
            var tx = "<span> Searching For :" + data.meta.search_country + "</span><span> Current page :"+ curr_page +"</span> <span> Total Pages : "+ data.meta.total_pages+"</span>";
            //$(tx).html("#meta");
            $("#meta").html(tx);

            if (curr_page <= 1) {
                $("[data-action='prev']").attr('disabled', 'disabled');
            } else {
                $("[data-action='prev']").removeAttr('disabled');
            }

            $("#ResultsPaging").css('display', 'block');

        } else {
            $("#searchData").html('No Data found!');
        }
    },

    successHandlerTopTracksByArtist : function (data) {
        if (data.data != '') {
            var content = '';
            $.each(data.data, function (i , elem) {
                content += '<div class="panel panel-default"><div class="panel-body">';
                content += '<img src="' + elem.image.small + '" />';
                content += '<span>' + elem.name + '</span>';
                content += '</div></div>';
            });

            $("#topTracks").html(content);

            // generate Meta
            var tx = "<span> Searching For :" + data.meta.search_country + "</span><span> Current page :"+ curr_page +"</span> <span> Total Pages : "+ data.meta.total_pages+"</span>";
            //$(tx).html("#meta");
            $("#meta").html(tx);
        } else {
            $("#topTracks").html("Nothing to show :(");
        }


    },

    errorHandler : function (req, status, err) {
        console.log('Error in ajax request', status, err);
    }


};
