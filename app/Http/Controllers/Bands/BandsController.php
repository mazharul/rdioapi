<?php

namespace App\Http\Controllers\Bands;


use App\Http\Controllers\Controller;
use App\Rdioapp\Repositories\BandsInterface;
use Illuminate\Http\Request;

/**
 * Class BandsController
 * @package App\Http\Controllers\Bands
 */
class BandsController extends Controller
{

    protected $bands_repo;

    /**
     * BandsController constructor.
     * @param BandsInterface $bands_class
     */
    public function __construct(BandsInterface $bands_class)
    {
        $this->bands_repo = $bands_class;
        // Do nothing now
        // add api key auth middleware at some point
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getBands(Request $request)
    {
        $country = $request->input('country');
        $page_no = $request->input('page');

        $page = ($page_no > 1) ? $page_no : 1;

        $res = $this->bands_repo->getBandsByCountry($country, $page);

        // TODO : formatter needs to be a separate entity to handle all the formatting
        // it should follow a certain standard of HAL or JSON API

        $formatted_response = $this->formatBandsByCountry($res);
        return response($formatted_response)
            ->header('content-Type', 'json');

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getTopTracks(Request $request, $mbid)
    {
        $page_no = $request->input('page');

        $page = ($page_no > 1) ? $page_no : 1;

        $res = $this->bands_repo->getTopTracksByArtist($mbid, $page);

        // TODO : formatter needs to be a separate entity to handle all the formatting
        // it should follow a certain standard of HAL or JSON API

        $formatted_response = $this->formatTopTracksByArtist($res);

        return response($formatted_response)
            ->header('content-Type', 'json');
    }
}