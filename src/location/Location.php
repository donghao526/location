<?php
namespace Saltedfish\Location;
use Saltedfish\Util\Base;

class Location {

	private $longitude;
	private $latitude;

	public function __construct($longitude, $latitude)
	{
		$this->longitude = $longitude;
		$this->latitude  = $latitude;
	}

    /**
     * @brief transform the latitude and longitude to detailed address
     * @param string $format default json
     * @return array
     */
	public function transformToAddress($format = 'json')
	{
        $url = "http://api.map.baidu.com/geocoder/v2/?location=%s&output=%s&ak=%s&sn=%s";
        $uri = '/geocoder/v2/';
        $location = $this->latitude. ',' . $this->longitude;
        $output = $format;

        $queryStringArray = array (
            'location' => $location,
            'output'   => $output,
            'ak'       => Config::AK,
        );
        $sn = $this->calculateAKSN(Config::SK, $uri, $queryStringArray);
        $target = sprintf($url, urlencode($location), 'json', Config::AK, $sn);
        $address = $this->getAddressByBdMap($target);

        if (Errcode::ERR_SUCCESS !== $address['status']) {
            return Base::errRet(Errcode::ERR_GEO_LOCATION_FAIL);
        }
        return Base::errRet(Errcode::ERR_SUCCESS, '', $address['result']);
    }

    /**
     * @brief calculate the AKSN
     * @param $sk: security key of the application
     * @param $url: the api of the geolocation
     * @param $queryStringArray: array of query param
     * @param string $method
     * @return string : a url with the sign
     */
    private function calculateAKSN($sk, $url, $queryStringArray, $method = 'GET')
    {
        if ($method === 'POST'){
            ksort($queryStringArray);
        }
        $queryString = http_build_query($queryStringArray);
        return md5(urlencode($url . '?' . $queryString . $sk));
    }

    /**
     * @brief  get the detailed Address of the location by bdmap
     * @param  $url: api url
     * @return array of the corresponding address
     */
    private function getAddressByBdMap($url) {
        // init the resource
        $ch = curl_init($url);

        // set options
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // extract the resource and free it
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }
}