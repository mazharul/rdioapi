<?php

namespace App\Rdioapp\Repositories;

Interface BandsInterface
{
    public function getBandsByCountry($country, $page = 1);
}