<?php

use Illuminate\Database\Seeder;
Use App\Espece;
class EspecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especes =   json_decode('[
            {"espece":"SIAP","image":"http://hakimages.com/images/menu/SIAP.png","title":"Monkey, New World Monkey, Old World Monkey, Orang-Utan"},
            {"espece":"LESI","image":"http://hakimages.com/images/menu/LESI.png","title":"Lemur, Sifaka TMAM Cow, P., Sloth"},
            {"espece":"RODE","image":"http://hakimages.com/images/menu/RODE.png","title":"Capybara, Rock Hyrax, Rodent"},
            {"espece":"CADO","image":"http://hakimages.com/images/menu/CADO.png","title":"Cat, Dog"},
            {"espece":"SMAM","image":"http://hakimages.com/images/menu/SMAM.png","title":"Bat, Coatimundi, Raccoon, Tapir"},
            {"espece":"LMAM","image":"http://hakimages.com/images/menu/LMAM.png","title":"Large Mamals"},
            {"espece":"MARS","image":"http://hakimages.com/images/menu/MARS.png","title":"Bear, Kangaroo, Koala, tasmanian Devil, Wallaby"},
            {"espece":"BIG5","image":"http://hakimages.com/images/menu/BIG5.png","title":" Burfalo, Cheetah, Elephant, Lion, Rhinoceros"},
            {"espece":"SAFA","image":"http://hakimages.com/images/menu/SAFA.png","title":"Antelope, Bat-Eared Fox, Gazelle, Giraffe, Hippopotamus, Hyena, Leopard, Zebra"},
            {"espece":"LAND","image":"http://hakimages.com/images/menu/LAND.png","title":"Landscape"},
            {"espece":"LUND","image":"http://hakimages.com/images/menu/LUND.png","title":"Dolphin, Manatee"},
            {"espece":"FILI","image":"http://hakimages.com/images/menu/FILI.png","title":"Fish /  Underwater Life"},
            {"espece":"FLOR","image":"http://hakimages.com/images/menu/FLOR.png","title":"Flower, Forest, Leaves, Blant, Tree"},
            {"espece":"SPID","image":"http://hakimages.com/images/menu/SPID.png","title":"Spider"},
            {"espece":"INSE","image":"http://hakimages.com/images/menu/INSE.png","title":" Ant, Beetle, Ticket, Grasshopper, Praying Mantis, stick Insect, Tailless Whip Scorpion, Termite"},
            {"espece":"BUTT","image":"http://hakimages.com/images/menu/BUTT.png","title":"Butterfly, Moth"},
            {"espece":"FROG","image":"http://hakimages.com/images/menu/FROG.png","title":"Frog, And. Toad"},
            {"espece":"SREP","image":"http://hakimages.com/images/menu/SREP.png","title":"Gecko, Lizard, Skink"},
            {"espece":"CHAM","image":"http://hakimages.com/images/menu/CHAM.png","title":"Chameleon"},
            {"espece":"LREP","image":"http://hakimages.com/images/menu/LREP.png","title":"Large Reptiles"},
            {"espece":"SNAK","image":"http://hakimages.com/images/menu/SNAK.png","title":"Snakes"},
            {"espece":"SKIE","image":"http://hakimages.com/images/menu/SKIE.png","title":"Clouds, Sky, Sunrise, Sunset"},
            {"espece":"SBIR","image":"http://hakimages.com/images/menu/SBIR.png","title":"Crow, Hummingbird, Owl, Parrot, Pigeon, Seagull, Small Bird, Tropical Bird"},
            {"espece":"LBIR","image":"http://hakimages.com/images/menu/LBIR.png","title":"Bustard, Crested Crane, Emu, Flamingo, Ostrich, Pelican, Secretary Bird"},
            {"espece":"BUIL","image":"http://hakimages.com/images/menu/BUIL.png","title":"Building, City, House, Hut, Village"},
            {"espece":"PEOP","image":"http://hakimages.com/images/menu/PEOP.png","title":"People"},
            {"espece":"OTHE","image":"http://hakimages.com/images/menu/OTHE.png","title":"Miscellaneous"}]');

        foreach ($especes as $espece){
            Espece::create([
                'title'=> $espece->title,
                'espece'=> $espece->espece,
                'icon'=> $espece->image,
            ]);
        }
    }
}
