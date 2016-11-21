<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // TODO : smashed both function to one; since both are doing repeated code
    protected function formatBandsByCountry($res)
    {
        $output = array();

        $output['data'] = array();
        $output['meta'] = array();

        $data_map = json_decode($res, true);

        $top_artists = $data_map['topartists']['artist'];
        $attr_map = $data_map['topartists']['@attr'];

        // Build artist data
        foreach ($top_artists as $top_artist) {
            $artist = array();
            $small_image = reset($top_artist['image']);


            $artist['name'] = $top_artist['name'];
            $artist['mbid'] = $top_artist['mbid'];
            $artist['url'] = $top_artist['url'];
            $artist['image'] = array();
            $artist['image']['small'] = $small_image['#text'];

            array_push($output['data'], $artist);
        }

        // Build meta information
        $output['meta']['search_country'] = $attr_map['country'];
        $output['meta']['current_page'] = $attr_map['page'];
        $output['meta']['total_pages'] = $attr_map['totalPages'];
        $output['meta']['total'] = $attr_map['total'];

        return $output;
    }

    protected function formatTopTracksByArtist($res)
    {
        $output = array();

        $output['data'] = array();
        $output['meta'] = array();

        $data_map = json_decode($res, true);

        $top_artists = $data_map['toptracks']['track'];
        $attr_map = $data_map['toptracks']['@attr'];

        // Build artist data
        foreach ($top_artists as $top_artist) {
            $artist = array();
            $small_image = reset($top_artist['image']);


            $artist['name'] = $top_artist['name'];
            $artist['url'] = $top_artist['url'];
            $artist['image'] = array();
            $artist['image']['small'] = $small_image['#text'];

            array_push($output['data'], $artist);
        }

        // Build meta information
        $output['meta']['artist'] = $attr_map['artist'];
        $output['meta']['current_page'] = $attr_map['page'];
        $output['meta']['total_pages'] = $attr_map['totalPages'];
        $output['meta']['total'] = $attr_map['total'];

        return $output;
    }
}
