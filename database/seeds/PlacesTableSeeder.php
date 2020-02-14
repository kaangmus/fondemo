<?php

use Illuminate\Database\Seeder;
use App\Place;
class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $places =  json_decode('[{"name":"Germany","lat":52.51666,"lng":13.4},{"name":"Australia","lat":-35.35,"lng":149.16671},{"name":"Austria","lat":48.2,"lng":16.3666},{"name":"The Bahamas","lat":25.08333,"lng":-77.35},{"name":"Belgium","lat":50.764259,"lng":4.526367},{"name":"Botswana","lat":-22.350076,"lng":23.994141},{"name":"Brazil","lat":-10,"lng":-55},{"name":"Colombia","lat":4.521666,"lng":-74.091797},{"name":"Cambodia","lat":11.55,"lng":104.91666},{"name":"Burkina Faso","lat":12.350734,"lng":-1.516113},{"name":"China","lat":38.169114,"lng":110.742187},{"name":"Antigua and Barbuda","lat":17.064487,"lng":-61.787109},{"name":"Costa Rica","lat":9.95,"lng":-84.0832},{"name":"Croatia","lat":45.809402,"lng":15.974121},{"name":"Denmark","lat":55.66666,"lng":12.58333},{"name":"Egypt","lat":30,"lng":31.2833},{"name":"Ecuador","lat":-0.2166667,"lng":-78.5},{"name":"Spain","lat":40.41937,"lng":-3.69312},{"name":"Usa","lat":41.08333,"lng":-80.25167},{"name":"Polynesia","lat":-17.602139,"lng":-149.458008},{"name":"France","lat":48.86,"lng":2.33333},{"name":"Gabon","lat":-0.540519,"lng":11.381836},{"name":"Fiji","lat":-18.1333,"lng":178.4166},{"name":"India","lat":22.43134,"lng":78.925781},{"name":"Indonesia","lat":-7,"lng":106},{"name":"Ireland","lat":53.060585,"lng":-8.217773},{"name":"Italy","lat":41.9,"lng":12.48333},{"name":"Kenya","lat":-1.2,"lng":36},{"name":"Luxembourg","lat":49.664072,"lng":6.124878},{"name":"Madagascar","lat":-18.895893,"lng":47.548828},{"name":"Malaysia","lat":3.1666667,"lng":101.7},{"name":"Maldives","lat":4.1666667,"lng":73.5},{"name":"Morocco","lat":34.02,"lng":-6.83},{"name":"Mexico","lat":19.269665,"lng":-99.140625},{"name":"Mozambique","lat":-20.632784,"lng":33.881836},{"name":"Uganda","lat":0.395505,"lng":32.563477},{"name":"Panama","lat":8.9666667,"lng":-79.533333},{"name":"Netherlands","lat":52.35,"lng":4.91666},{"name":"Portugal","lat":39.707187,"lng":-8.217773},{"name":"Qatar","lat":25.313574,"lng":51.108398},{"name":"Czech republic","lat":50.0878,"lng":14.4241},{"name":"United Kingdom","lat":51.536086,"lng":-0.175781},{"name":"Seychelles","lat":-4.6166667,"lng":55.45},{"name":"Singapore","lat":1.309273,"lng":103.834534},{"name":"Sweden","lat":59.32946,"lng":18.06263},{"name":"Switzerland","lat":46.498392,"lng":7.36084},{"name":"Thailand","lat":13.8333,"lng":100.4833},{"name":"Venezuela","lat":8.450639,"lng":-66.225586},{"name":"Vietnam","lat":21.0333333,"lng":105.85},{"name":"Tanzania","lat":-6.18333,"lng":35.75},{"name":"Tajikistan","lat":39.057299,"lng":70.64209},{"name":"Guam","lat":13.368243,"lng":144.84375},{"name":"Hawaii","lat":20.75028,"lng":-156.50028},{"name":"Hong Kong","lat":22.28,"lng":114.15},{"name":"Micronesia","lat":6.9147118,"lng":158.16102739999997},{"name":"Zanzibar","lat":-6.140555,"lng":39.331055},{"name":"Trinidad and Tobago","lat":10.574222,"lng":-61.21582},{"name":"Sardinia","lat":40,"lng":9},{"name":"South Africa","lat":-33.906896,"lng":19.819336},{"name":"Ibiza","lat":39.943436,"lng":4.086914},{"name":"Saint Barths","lat":17.560247,"lng":-61.743164},{"name":"Syria","lat":33.468108,"lng":36.738281},{"name":"Canada","lat":53.540307,"lng":-113.510742},{"name":"Necker Island","lat":18.518679,"lng":-64.371643},{"name":"Mali","lat":18.687879,"lng":-1.845703},{"name":"Turkey","lat":41.01196,"lng":28.981934},{"name":"Guatemala","lat":14.593507,"lng":-90.571289},{"name":"Japan","lat":37.681502,"lng":139.21875},{"name":"Turks and Caicos","lat":21.769023,"lng":-71.982422},{"name":"Greece","lat":38.021555,"lng":23.686523},{"name":"Namibia","lat":-22.593726,"lng":17.050781},{"name":"Cuba","lat":21.849263,"lng":-78.881836},{"name":"Tonga","lat":-21.12,"lng":-175.12},{"name":"Papua New Guinea","lat":-9.441189,"lng":147.218598},{"name":"Solomon Islands","lat":-9.430833,"lng":160.046938},{"name":"Galapagos Islands","lat":-0.777259,"lng":-91.142578},{"name":"Dominica","lat":15.441910724050425,"lng":-61.342507814942024},{"name":"Philippines","lat":14.599512,"lng":120.984222}]');

        foreach( $places as $place ){
            Place::create([
                'name'=>$place->name,
                'latitude'=>$place->lat,
                'longtitude'=>$place->lng,
            ]);
        }
    }
}
