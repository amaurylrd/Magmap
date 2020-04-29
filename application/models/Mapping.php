<?php
class Mapping extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public static function distance($lat1, $lng1, $lat2, $lng2) {
        $earth_radius = 6378137;
        $rla1 = deg2rad($lat1); $rla2 = deg2rad($lat2);
        $dlo = (deg2rad($lng2) - deg2rad($lng1))/2;
        $dla = ($rla2 - $rla1)/2;
        $a = (sin($dla)*sin($dla)) + cos($rla1)*cos($rla2)*(sin($dlo)*sin($dlo));
        $d = 2*atan2(sqrt($a), sqrt(1 - $a));
        return round(($earth_radius*$d)/1000, 3);
    }

    public static function reverse($lng, $lat) {
        $api = 'https://api-adresse.data.gouv.fr/reverse/?lon='.$lng.'&lat='.$lat;
        return substr(json_decode(file_get_contents($api), true)['features'][0]['properties']['postcode'], 0, 2);
    }

    public static function search($query) {
        $api = 'https://api-adresse.data.gouv.fr/search/?q='.str_replace(" ", "+", $query);
        return json_decode(file_get_contents($api), true)['features'][0]['geometry']['coordinates'];
    }
}
?>
