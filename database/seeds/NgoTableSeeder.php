<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Ngoyear;
use App\Ngo;
use App\Year;
use App\Species;
use App\NgoPrice;
class NgoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
                $ngo = [
            [
               'id'=>1,
               'name'           => 'International League of Conservation',
               'description'          => "<p>Focused on Nature's $15,000 grant to the International League of Conservation Photographers for the Yucatan Rapid Assessment Visual Expedition facilitated 30 world-renowned photographers to produce a comprehensive visual library of the Yucatan Peninsula in Mexico and all the biological diversity it supports. Photographers included: Paul Nicklen, Brian Skerry, Christian Ziegler, Joe Riis, Klaus Nigge, and Daniel Beltra. In addition to producing the visual library, which was shared with local non-profit organisations across the Yucatan free of charge, the grant sparked four long-term conservation photography projects : one for Klaus Nigge, which resulted in a story in National Geographic Magazine on Flamingoes; two for Brian Skerry, one which resulted in a story in National Geographic Magazine on the Mesoamerican Reef, and another in Smithsonian Magazine on Whale Sharks; and one for Paul Nicklen, which resulted in a National Geographic Magazine story on Cenotes.&nbsp;</p>",
            

            ],
            [
               'id'=>2,
               'name'           => 'The Maasai Wilderness Conservation Trust',
               'description'          => "<p>The Maasai Wilderness Conservation Trust works to protect the legendary ecosystems and astounding biodiversity of East Africa through conservation that directly benefits local Maasai communities.&nbsp;</p>",

            ],
             [
               'id'=>3,
               'name'           => 'FUNDAECO',
               'description'          => "<p>Strategic purchase of 2000 acres of humid subtropical forest in the Cuchumatanes mountains of northwest Guatemala. The Sierra de los Cuchumatanes in northwestern Guatemala is the highest non-volcanic range in Central America, and a hotbed of unique and threatened amphibians including the Finca Chiblac Salamander, Long-limbed Salamander, Jackson’s Climbing Salamander and the critically endangered and beautiful Morelett’s Black-eyed Treefrog. The mountain range, cloaked in lush forest that filters water into the azure Laguna Maxbal, is also an important bird area, supporting populations of three globally threatened species. The remoteness of the area has protected much of the forest to date, but increasing pressures from corporations looking to exploit the coffee-growing potential of the land place these unique forests at risk, and the area has been identified as one of the highest priorities for biodiversity conservation. This grant assisted local NGO FUNDAECO to acquire a 2000-acre property called Finca San Isidro, and protect an important tract of humid subtropical forest and its unique inhabitants. FUNDAECO already has a presence and a local office in the area, making them ideally placed to engage with local communities and ensure long-term sustainability of the project.&nbsp;</p>",

            ],
             [
               'id'=>4,
               'name'           => 'Faune Alfort',
               'description'          => "<p>French Animal Care Association, partnering with the Alfort Veterinary School near Paris.&nbsp;</p>",

            ],
             [
               'id'=>5,
               'name'           => 'Global Wildlife Conservation',
               'description'          => "<p>Variety is not only the spice of life, its critical to human survival. The diversity of life and all its connections make Earth different from all other planets. The air we breathe and the food we eat rely on biodiversity. Global Wildlife Conservation's mission is to conserve the diversity of life on Earth, where all of life has value and can flourish -plant, animal, and human. With your help, we can retain, restore and revitalize our planet. Every species we save prevents irreversible changes to our planet—changes with ramifications we don’t fully understand. While our planet faces many challenges, we maintain focus on saving wildlife and protecting their homes. Preventing extinction is critical to the biodiversity that fuels our thriving planet. Today, the extinction rate is 1,000-10,000 times faster than the historic rate of extinction. Most endangered animals receive little to no protection. Charismatic animals, such as tigers, elephants and pandas receive the most attention and aid. They are the fortunate minority.&nbsp;</p>",

            ],
             [
               'id'=>6,
               'name'           => 'Oceana',
               'description'          => "<p>Oceana was established by a group of leading foundations — The Pew Charitable Trusts, Oak Foundation, Marisla Foundation (formerly Homeland Foundation), Sandler Foundation, and the Rockefeller Brothers Fund — after a 1999 study they commissioned discovered that less than 0.5 percent of all resources spent by environmental nonprofit groups in the United States went to ocean advocacy. No organization was working exclusively to protect and restore the oceans on a global scale. To fill the gap, our founders created Oceana: an international organization focused solely on oceans, dedicated to achieving measurable change by conducting specific, science-based policy campaigns with fixed deadlines and articulated goals. The Ocean Law Project — also initiated by The Pew Charitable Trusts — was absorbed into Oceana in 2001 as Oceana’s legal arm. In 2002, Oceana merged with American Oceans Campaign, founded by actor and environmentalist Ted Danson, to more effectively address our common mission of protecting and restoring the world’s oceans. Since its founding, Oceana has won more than 200 victories and protected more than 4.5 million square miles of ocean. Find out more about how Oceana is helping to save the oceans victory by victory.&nbsp;</p>",

            ],
              [
               'id'=>7,
               'name'           => 'IUCN',
               'description'          => "<p>The International Union for Conservation of Nature (IUCN) is a membership Union composed of both government and civil society organisations. It harnesses the experience, resources and reach of its more than 1,300 Member organisations and the input of more than 15,000 experts. This diversity and vast expertise makes IUCN the global authority on the status of the natural world and the measures needed to safeguard it.&nbsp;</p>",

            ],
              [
               'id'=>8,
               'name'           => 'WWF',
               'description'          => "<p>For nearly 60 years, The World Wildlife Fund has been protecting the future of nature. The world’s leading conservation organization, WWF works in 100 countries and is supported by more than one million members in the United States and close to five million globally. WWF's unique way of working combines global reach with a foundation in science, involves action at every level from local to global, and ensures the delivery of innovative solutions that meet the needs of both people and nature.&nbsp;</p>",

            ],
              [
               'id'=>9,
               'name'           => 'Giving Nature a Voice',
               'description'          => "<p>Nature needs a voice in Africa and so do the people whose lives depend on a healthy environment. That is the critical mission of AKU GSMC’s Environmental Reporting Program. East Africa desperately needed a regular platform for locally produced environmental documentaries that would engage, illuminate and help reverse a dangerous trajectory. Now thanks to the young filmmakers we’ve trained and supported, that powerful message is reaching millions of Kenyans on prime time TV, and on international media platforms. Together we’ve produced over 50 award-winning documentaries on East Africa’s most critical environmental crises. Seen in schools, museums and local communities, the films can help create the popular groundswell that will goad and inspire leaders of government, business and civil society to act, before it’s too late.&nbsp;</p>",

            ],
              [
               'id'=>10,
               'name'           => 'Sea Turtles by Tom Peschak',
               'description'          => "<p>National Geographic Society — Tom Peschak’s Sea Turtle Cover Story published in October 2019 Sea turtles are surviving—despite us These reptiles have roamed the oceans for 100 million years. We've put them at risk, but with a little help, they're rebounding.&nbsp;</p>",

            ],
              [
               'id'=>11,
               'name'           => 'Dolphin Intelligence by Brian Skerry',
               'description'          => "<p>The cumulative grants to the National Geographic Society supported a cover story in the National Geographic Magazine on dolphin intelligence by photographer Brian Skerry. The grant funded a 10-day expedition to the Bahamas to photograph researcher Denise Herzing and Atlantic spotted dolphins, and a 2-week expedition to Argentina in Spring of 2014 to photograph Orcas predating on seals on the beach, a phenomenon found nowhere else in the world. The story, published in 2015, is extremely timely given the current debate on dolphin captivity and the state of dolphin populations around the world. National Geographic Society — Brian Skerry’s dolphin cover story published in May 2015 It’s Time for a Conversation Breaking the communication barrier between dolphins and humans&nbsp;</p>",

            ],
              [
               'id'=>12,
               'name'           => 'Whale and Dolphin Conservation',
               'description'          => "<p>Over the past 20 years, WDC has supported around 185 conservation field projects in over 40 countries, spanning all major ocean regions and relevant river basins. These projects include scientific work such as abundance estimation, population dynamics and behavioural studies, research on threats and threat mitigation, as well as a broad range of conservation initiatives such as encouraging government authorities to designate areas of marine protection; working with local law enforcement agencies; and developing alternative fishing activities to reduce bycatch. WDC is acutely aware that such programmes can only be successful with the full support and participation of local people and aims to identify and work closely with local scientists, conservationists, educators and other community members in each region, in order to ensure long-term solutions for both cetaceans and their often shared, environment.&nbsp;</p>",

            ],
              [
               'id'=>13,
               'name'           => 'Darewin/THINK project',
               'description'          => "<p>Intelligent life on our planet abounds, especially in the ocean. Many species of dolphins and whales have brains that are larger than ours, and in many ways more evolved and complex. These animals may also share our capacity to communicate with one another in sophisticated ways that we are just on the cusp of understanding. DAREWIN’s mission is to better understand dolphin and whale click communication and perhaps, one day, make contact with these extraordinary animals.&nbsp;</p>",

            ],
              [
               'id'=>14,
               'name'           => 'Wild dolphin Project',
               'description'          => "<p>Dr. Denise Herzing, Research Director of the Wild Dolphin Project (WDP), has been studying the same community of wild Atlantic spotted dolphins in the Bahamas for 30 years. Her research is well known and is grounded in science. Dr. Herzing is now moving into a new phase of research to “Crack the Code” of their communication system. We conserve what we love, and by understanding their communication and intelligence WDP hopes to create awareness of all sentient species and their place on Earth. The FON grant facilitated this new approach.&nbsp;</p>",

            ],
              [
               'id'=>15,
               'name'           => 'Manta Rays by Tom Peschak',
               'description'          => "<p>National Geographic Society — Tom Peschak’s Manta Ray's Picture Story Inside the World of Manta Rays A photographer captures stunning underwater images on a journey to save the gentle giants.&nbsp;</p>",

            ],
              [
               'id'=>16,
               'name'           => 'Great White Shark by Bryan Skerry',
               'description'          => "<p>National Geographic Society — Brian Skerry’s Great White Shark Story published in July 2016 Why Great White Sharks Are Still a Mystery to Us Thanks to Jaws, they're the ocean's most iconic and feared fish. But we know surprisingly little about them.&nbsp;</p>",

            ],
              [
               'id'=>17,
               'name'           => 'The Dominica Sperm Whale Project',
               'description'          => "<p>The Dominica Sperm Whale Project is an innovative and integrative study of the world's largest toothed whale. Through thousands of hours of observation of sperm whale families, the population of whales in the Caribbean has given us the unique opportunity to come to know them as individuals within families. Our program is the first to have followed sperm whale families of whales across years. We have followed many calves from birth through weaning and we now know that some families have been using the region for decades. No sperm whale population has been this well characterized and the detailed behavioural histories of these individuals are rare among mammals, particularly in the ocean.&nbsp;</p>",

            ],
              [
               'id'=>18,
               'name'           => 'Wildlife Conservation Society',
               'description'          => "<p>Niassa National Park in Northern Mozambique and neighbouring Selous National Park in Tanzania support the largest remaining population of Savannah elephants in Africa, estimated at 13,000 individuals. Unfortunately, the Niassa-Selous landscape is also ground zero for elephant poaching: scientists reported that 3,000 elephants were killed for their ivory in the area in just one year. Focused on Nature's $30,000 grant to the Wildlife Conservation Society (WCS) is being applied directly to anti-poaching efforts in Niassa National Park, which is being co-managed by WCS and the Government of Mozambique. Specifically, the funds support the park rangers who risk their lives to protect these majestic and intelligent creatures.&nbsp;</p>",

            ],
              [
               'id'=>19,
               'name'           => 'Elephants by Robert J. Ross',
               'description'          => "<p>THE SELOUS IN AFRICA A Long Way from Anywhere by Robert J. Ross The Selous Game Reserve in Tanzania is one of the last remaining great wilderness areas in Africa. Encompassing more area than Switzerland and proclaimed a UNESCO World Heritage Site in 1982, the Selous is Africa's oldest and largest protected area and remains one of the continent's greatest undisturbed ecosystems. Teeming with life-elephants, giraffes, more lions than any other protected area on the continent, large packs of wild dogs, and vast herds of buffalo-the Selous is a crown jewel of biodiversity and wilderness preservation. The Selous in Africa: A Long Way from Anywhere by Robert J. Ross features nearly 400 photographs of this extraordinary place. Not only the large megafauna typically seen in a photographic book on African wildlife; but also the fantastic and often-overlooked smaller creatures, birds, and insects, along with dramatic landscapes, are captured in these breathtaking images.&nbsp;</p>",

            ],
              [
               'id'=>20,
               'name'           => 'The Sheldrick Wildlife Trust',
               'description'          => "<p>The Sheldrick Wildlife Trust exists to protect Africa’s wildlife and to preserve habitats for the future of all wild species. Working across Kenya, our projects include anti-poaching, safe guarding the natural environment, enhancing community awareness, addressing animal welfare issues, providing veterinary assistance to animals in need, rescuing and hand rearing elephant and rhino orphans, along with other species that can ultimately enjoy a quality of life in wild terms when grown.&nbsp;</p>",

            ],
              [
               'id'=>21,
               'name'           => 'The Cape Leopard Trust',
               'description'          => "<p>Since its inception in 2004, The Cape Leopard Trust has become the authority on predator conservation in the Cape, and one of the leading authorities in South Africa. Cape leopards, along with the Arabian leopard, are the smallest leopards in the World. They are half the size of normal African leopards, and only occur in the Cape Mountains where they are threatened by farmer-predator conflict and habitat loss. Focused on Nature financed the purchase of 4 GPS leopard collars to help further research on the breeding and dispersal behaviours of these mountain leopards. The former includes basic reproductive and survival data, while the latter provides CLT with valuable insight into important corridors for conservation.&nbsp;</p>",

            ],
              [
               'id'=>22,
               'name'           => 'The Manta Trust',
               'description'          => "<p>Formed in 2011, the Manta Trust is a UK registered charity that co-ordinates global mobulid research and conservation efforts. Our team is comprised of a diverse group of researchers, scientists, conservationists, educators and media experts; working together to share and promote knowledge and expertise. Our mission is to conserve mobulid rays, their relatives, and their habitats, through a combination of research, education and collaboration.&nbsp;</p>b",

            ],
              [
               'id'=>23,
               'name'           => 'GPOCP',
               'description'          => "<p>Gunung Palung National Park, located in West Kalimantan, Indonesia, represents one of the most important blocks of orangutan habitat left in the world. Approximately 10-20% of all the Bornean orangutans are found there, and the Gunung Palung Orangutan Conservation Program (GPOCP) has been working for almost 15 years to conserve this vital wild orangutan population. The FON grant was applied to the rebuilding of the Cabang Panti research station where research on wild orangutans is conducted; the Alternative Livelihoods Program which tackles one of the primary reasons for rainforest destruction —the slash and burn agriculture practiced by people surrounding the Park; and to cover part of the staff costs. Finally, a portion of the grant was applied to an exploratory trip to Sarawak, Borneo, to investigate an unstudied population of orangutans.&nbsp;</p>",

            ],
              [
               'id'=>24,
               'name'           => 'CERCOPAN',
               'description'          => "<p>The place with the highest number of primate species on the entire African continent is an ancient rainforest in South-Eastern Nigeria. CERCOPAN strives to conserve this forest and to protect its monkeys because both are highly threatened. For effective results, we provide education and practical options for the local communities so that their dependence on the forests becomes sustainable rather than destructive. While hunting threats remain, we provide sanctuary and individual care for orphan monkeys, progressing through their rehabilitation to reintroduction, in suitable cases, into the forest we protect.&nbsp;</p>",

            ],
              [
               'id'=>25,
               'name'           => 'The Jane Goodall Institute',
               'description'          => "<p>From the beginning, science has been core to the Jane Goodall Institute’s work. We continue to build on the legendary scientific contributions of Dr. Jane Goodall with our field research at Gombe, our chimpanzee sanctuary in Tchimpounga, and community-centered conservation work around the world. Each advance we make in the use of science and technology illuminates new next steps and allows us to better protect the web of life that connects all living things. Today, we’re using science and technology in ways that were impossible only a decade ago. We hone in on locations for conservation, assess the state of habitat, and track progress in restoring the land to viable chimpanzee habitat.&nbsp;</p>",

            ],
              [
               'id'=>26,
               'name'           => 'The Rhino Pride Foundation',
               'description'          => "<p>Established in South Africa in 2015, the Rhino Pride Foundation was founded by specialist wildlife veterinarian Dr Jana Pretorius, who saw an urgent need to tackle the devastating rhino poaching crisis head-on. Realising that most anti-poaching solutions focused only on the aftermath of poaching, Dr Pretorius established the Foundation to establish immediate, practical, ground-level preventative measures that would protect rhinos from poachers effectively and reliably. The Rhino Pride Foundation works to create layered security sanctuaries with ultra-secure perimeters. Utilising technology to track and stop poachers, the sanctuaries feature high-tech early warning systems with buffer zones. These enable reaction teams to locate and apprehend poachers before they can gain access to the reserves. As well as saving wildlife, this tech-based approach minimises the human cost of anti-poaching efforts in a war where too many lives are lost.&nbsp;</p>",

            ],
              [
               'id'=>27,
               'name'           => 'Fins Attached',
               'description'          => "<p>The health of any ecosystem is controlled largely by its apex predators. So, while our work aims to impact the marine ecosystem as a whole, much of our research is focused on the apex predators of the marine environment, which are sharks. Fins Attached believes in a multi-pronged approach to protecting sharks and our oceans. The data obtained from the research is what drives the conservation message. The combination of the research and conservation is what dictates the education narrative. Ultimately, if anything is to happen to protect sharks, then international policy must be changes to conserve sharks.&nbsp;</p>",

            ],
              [
               'id'=>28,
               'name'           => 'The Charles Darwin Foundation',
               'description'          => "<p>The Charles Darwin Foundation for the Galapagos Islands (CDF) is an international non-profit organization dedicated to scientific research. CDF has carried out its mission in the Galapagos since 1959, thanks to an agreement with the Government of Ecuador and with the mandate to pursue and maintain collaborations with government agencies by providing scientific knowledge and technical assistance to promote and secure conservation of Galapagos. For 60 years, CDF has worked in close partnership with the Galapagos National Park Directorate (GNPD), the principal provincial authority for environmental management, with the goal of protection of the Islands’ natural resources and the sharing of scientific results for the conservation of this living laboratory.&nbsp;</p>",

            ],
              [
               'id'=>29,
               'name'           => 'The Shark Conservation Fund',
               'description'          => "<p>The Shark Conservation Fund (SCF) is a collaboration of philanthropists dedicated to solving the global shark and ray crisis. Our goal is to halt the overexploitation of the world’s sharks and rays, prevent extinctions, reverse population declines, and restore imperiled species through strategic and catalytic grantmaking. The plight of sharks and rays is an international crisis. Scientists estimate that more than 100 million sharks are killed every year and that nearly a quarter of all shark and ray species are facing extinction, placing them among the most threatened vertebrates on the planet. As these predators play critical ecological, cultural, and economic roles in our oceans and coastal communities, their declining numbers are a growing threat to the health of the ocean and jeopardize the livelihoods and food security of millions of people around the world. The current scale of conservation efforts does not match this level of crisis. Major investments are urgently needed worldwide in policy development, outreach and advocacy, conservation science, communications and media, capacity building, and long-term monitoring. It is vital that we step up action to save our sharks and rays. SCF believes that we need a globally coordinated conservation strategy to effectively tackle the current crisis and affect real change in protecting shark and ray populations. We are working at the local, national, and international levels, investing strategically in projects that can turn the tide for imperiled sharks and rays around the world.&nbsp;</p>",

            ],
              [
               'id'=>30,
               'name'           => 'The Turtle Conservancy',
               'description'          => "<p>The Turtle Conservancy is dedicated to protecting threatened turtles and tortoises and their habitats worldwide. Turtles are among the most threatened groups of animals on the planet, and are in desperate need of conservation help. More than half of their 300+ species are threatened with extinction according to IUCN Red List criteria. Primary threats to turtles and tortoises include habitat loss and degradation, high-volume unsustainable consumptive exploitation for food and medicinal products, and illegal international pet trade.&nbsp;</p>",

            ],
              [
               'id'=>31,
               'name'           => 'Wolves of the Rockies',
               'description'          => "<p>Wolves of the Rockies’ mission is to Protect &amp; Defend Wolves of the Rocky Mountains through advocating and education. Gathering wolf advocates around the world to consolidate our voices into a force that will influence the protection and acceptance of wolves in the Rocky Mountain Region. Wolves of the Rockies (WotR) is a not-for-profit organization working to ensure that a viable, healthy population of gray wolves occupy their native historic lands. Educating people with facts about wolfs, and wolf behavior to counter the negative image created by commercial interest groups, fictional entertainment and extremism. Advocating through speaking at government/public forums to ensure accurate data and sound science are being utilized in decision making. Working in cooperation with government agencies and like-minded organizations promoting acceptance of wolves, the benefit of wolves, and the impact of wolves in the ecosystem. Working to promote non-lethal measures to help diminish human conflict with wolves.&nbsp;</p>",

            ],
              [
               'id'=>32,
               'name'           => 'Galapagos by Tom Peschak',
               'description'          => "National Geographic Society — Tom Peschak’s Galapagos Story published in June 2017 A Warming Planet Jolts the Iconic Creatures of the Galápagos Species that inspired Darwin’s theory of natural selection are facing new challenges to adapt.",

            ],
        ];

        Ngo::insert($ngo);
    }
    
}
class NgoSpeciestableseeder extends Seeder
{
    public function run()
    {
        Ngo::findOrFail(1)->species()->sync(13);
        Ngo::findOrFail(2)->species()->sync(13);
        Ngo::findOrFail(3)->species()->sync(13);
        Ngo::findOrFail(4)->species()->sync(13);
        Ngo::findOrFail(5)->species()->sync(6);
        Ngo::findOrFail(6)->species()->sync(2);
        Ngo::findOrFail(7)->species()->sync(13);
        Ngo::findOrFail(8)->species()->sync(13);
        Ngo::findOrFail(9)->species()->sync(13);
        Ngo::findOrFail(10)->species()->sync(5);
        Ngo::findOrFail(11)->species()->sync(1);
        Ngo::findOrFail(12)->species()->sync(1);
        Ngo::findOrFail(13)->species()->sync(1);
        Ngo::findOrFail(14)->species()->sync(1);
        Ngo::findOrFail(15)->species()->sync(3);
        Ngo::findOrFail(16)->species()->sync(4);
        Ngo::findOrFail(17)->species()->sync(1);
        Ngo::findOrFail(18)->species()->sync(8);
        Ngo::findOrFail(19)->species()->sync(8);
        Ngo::findOrFail(20)->species()->sync(8);
        Ngo::findOrFail(21)->species()->sync(10);
        Ngo::findOrFail(22)->species()->sync(3);
        Ngo::findOrFail(23)->species()->sync(7);
        Ngo::findOrFail(24)->species()->sync(7);
        Ngo::findOrFail(25)->species()->sync(7);
        Ngo::findOrFail(26)->species()->sync(1);
        Ngo::findOrFail(27)->species()->sync(4);
        Ngo::findOrFail(28)->species()->sync(4);
        Ngo::findOrFail(29)->species()->sync(4);
        Ngo::findOrFail(30)->species()->sync(5);
        Ngo::findOrFail(31)->species()->sync(11);
        Ngo::findOrFail(32)->species()->sync(2);
        
        
    }
}

class NgoYeartableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
         $ngoyear = [
            
            [
               
               'ngo_id'   => 1,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 4,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 5,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 8,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 2,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 3,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 4,
               'year_id' =>8,
            

            ],
            [
               
               'ngo_id'   => 4,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   => 4,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 4,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 5,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 5,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 6,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 6,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 7,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 8,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 9,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 10,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 11,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 11,
               'year_id' => 5,
            

            ],
            [
               
               'ngo_id'   => 12,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 13,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 14,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   =>14,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 14,
               'year_id' => 8,
            

            ],
            [
               
               'ngo_id'   => 14,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   => 14,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 14,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 15,
               'year_id' =>7,
            

            ],
            [
               
               'ngo_id'   =>16,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 17,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   =>18,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 18,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 18,
               'year_id' => 9,
            

            ],
              [
               
               'ngo_id'   => 18,
               'year_id' => 8,
            

            ],
            [
               
               'ngo_id'   => 18,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 18,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 18,
               'year_id' => 5,
            

            ],
            [
               
               'ngo_id'   => 19,
               'year_id' => 7,
            

            ],
             [
               
               'ngo_id'   => 20,
               'year_id' => 8,
            

            ],
            [
               
               'ngo_id'   => 20,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   => 20,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 20,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 21,
               'year_id' => 5,
            

            ],
            [
               
               'ngo_id'   => 22,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 22,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 22,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 23,
               'year_id' => 6,
            

            ],
            [
               
               'ngo_id'   => 23,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 23,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 24,
               'year_id' => 7,
            

            ],
            [
               
               'ngo_id'   => 25,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 26,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 26,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 27,
               'year_id' => 9,
            

            ],
            [
               
               'ngo_id'   => 27,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 27,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 28,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 28,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 29,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 30,
               'year_id' => 10,
            

            ],
            [
               
               'ngo_id'   => 30,
               'year_id' => 11,
            

            ],
            [
               
               'ngo_id'   => 31,
               'year_id' => 11,
            

            ],
           
        ];

        Ngoyear::insert($ngoyear);
    }
    
}

