<?php

namespace App\Rdioapp\Repositories;

use Mazharul\Lastfm\Lastfm;

/**
 * Class BandsRepository
 * @package App\Rdioapp\Repositories
 */
class BandsRepository implements BandsInterface
{
    /**
     * @var Lastfm
     */
    private $_last_fm;

    /**
     * BandsRepository constructor.
     * @param Lastfm $last_fm
     */
    public function __construct(Lastfm $last_fm)
    {
        $this->_last_fm = $last_fm;
    }

    /**
     * @param $country
     * @param int $page
     * @return mixed
     */
    public function getBandsByCountry($country, $page = 1)
    {
        $res = $this->_last_fm->getGeoTopArtists($country, $page);

        return $res;
    }

    /**
     * @param $mbid
     * @param int $page
     * @return mixed
     */
    public function getTopTracksByArtist($mbid, $page = 1)
    {
        $res = $this->_last_fm->getArtistsTopTracks($mbid);

        return $res;
    }
}