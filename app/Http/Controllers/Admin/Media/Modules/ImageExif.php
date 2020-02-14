<?php
namespace App\Http\Controllers\Admin\Media\Modules;
use Image;

trait ImageExif{

    public function getExif($image){
        $image = Image::make($image);
        
        $data['exif'] = $image->exif();
        $data['iptc'] = $image->iptc();
        return $data;
    }

    public function getIPTC($image){
        $data = Image::make($image)->iptc();
        return $data;
    }
    public function getPlace($exif_data ){
        // "GPSVersion":"\u0002\u0002\u0000\u0000"
        // "GPSLatitudeRef":"N"
        // "GPSLatitude":["51/1","29/1","45/1"]
        // "GPSLongitudeRef":"W"
        // "GPSLongitude":["0/1","8/1","21/1"]
        // "GPSAltitudeRef":"\u0000","GPSAltitude":"52/1"
        // "GPSTimeStamp":["12/1","25/1","37/1"]
        // "GPSDateStamp":"2018:07:15"
        $data = [];
        if( array_key_exists('GPSVersion',$exif_data) ){

            //Latitude
            list($degrees, $minutes, $seconds) = $exif_data['GPSLatitude'];
            $direction                          = $exif_data['GPSLatitudeRef'];
            $data['Latitude'] = $this->ConvertDMSToDD($degrees, $minutes, $seconds, $direction);

            //Longitude
            list($degrees, $minutes, $seconds) = $exif_data['GPSLongitude'];
            $direction                          = $exif_data['GPSLongitudeRef'];
            $data['Longitude'] = $this->ConvertDMSToDD($degrees, $minutes, $seconds, $direction);
            $data['PlaceUrl']  = '<a href="http://www.google.com/maps/place/'.$data["Latitude"].','.$data['Longitude'].' target="_blank">Google Maps</a>';
                                   
            return $data;
        }
        return;
    }
    protected function ConvertDMSToDD($degrees, $minutes, $seconds, $direction) {
        $degrees = explode('/',$degrees)[0];
        $minutes = explode('/',$minutes)[0];
        $seconds = explode('/',$seconds)[0];

        $dd = $degrees + ($minutes/60) + ($seconds/3600);
        
        if ($direction == "S" || $direction == "W") {
            $dd = $dd * -1; 
        }
        
        return $dd;
    }

    
}