<?php

/* intergrate someday: http://ipgeobase.ru/cgi-bin/Software.cgi */


class Geography {

    public function __construct() {
        global $DB;
        $this->DB = $DB;

        //get countries list
        $arrCountries = $this->DB->query("SELECT `country_id`, `name` FROM `GeoCountries` ORDER BY `name`")->fetchAll();
        foreach($arrCountries as $country) {
            $this->Countries[$country["country_id"]] = $country["name"];
        }

        $this->CitiesCache = array();
    }

    public function GetCitiesById ($ids) {
        if(!is_array($ids)) $ids[]=$ids;

        $arrReturn = array();

        for ($i = 0; $i < sizeof($ids); $i++) {
            if(isset($this->CitiesCache[$ids[$i]])) {
                $arrReturn[$ids[$i]] = $this->CitiesCache[$ids[$i]];
                unset($ids[$i]);
            }
        }

        $ids_list = implode(",", $ids);

        $arrCities = $this->DB->query("
            SELECT * FROM `GeoCities` WHERE `id` IN ({$ids_list}) ORDER BY `biggest_city` DESC, `city` ASC
        ")->fetchAll();

        if($arrCities !== false) {
            foreach($arrCities as $city) {
                $arrReturn[$city["id"]] = array(
                    "CityID" => $city["id"],
                    "CityName" => $city["city"],
                    "CountryID" => $city["country_id"],
                    "CountryName" => $this->Countries[$city["country_id"]],
                    "RegionName" => $city["region"]
                );
            }
            return $arrReturn;
        } else return false;
    }

}