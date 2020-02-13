<!DOCTYPE html>

<html dir="ltr" lang="en">

<head>

  <meta charset="UTF-8" />

  <title>Digital brochures </title>





  <h1>FLICK THROUGH THE DIGITAL BROCHURES<br />

    <span style="font-size:20px">Double-click to zoom in or zoom out</span></h1>





  <script src='https://fliphtml5.com/plugin/LightBox/js/fliphtml5-light-box-api-min.js'></script>



  <style>
    #container1 {

      position: absolute;

      margin-left: 50px;

      margin-bottom: 100px;

    }

    #col {

      float: left;

      width: 230px;

      height: 330px;

      margin: 10px;



    }

    .bandeau-gauche {

      float: left;

      margin: 0 80px 0px 0;

      border: 0px solid #999;



      height: 700px;

      width: 100px;

    }





    .bandeau-droite {

      float: right;

      margin: 0 40px 0px 0;

      border: 0px solid #999;



      height: 700px;

      width: 60px;

    }



    .crop {

      height: 280px;

      width: 200px;

      overflow: hidden;

    }



    .crop img {

      height: auto;

      width: 200px;

    }
  </style>



  <link rel="stylesheet" type="text/css" href="brochures.css" />

  <script src="http://hakimages.com/js/modernizr.custom.js"></script>



</head>





<body>





  <?php 

	 

$data = file_get_contents ('http://hakimages.com/ws_brochures.php');

$json = json_decode($data, true);

foreach ($json as $key => $value) {

	

	

    if (!is_array($value)) {

        echo $key . '=>' . $value . '<br/>';

    } else {

        foreach ($value as $key => $val) {

			if ($key== "fliphtml") $key_brochure= $val;

			if ($key== "nom_brochure") $nom_brochure= $val;

			if ($key== "date_brochure") $date_brochure= $val;

        }

    }

	// Affichage d'un flipbook

	

		if ($key_brochure!="") // si id FlipHTML non vide

		{

		?>



  <div id="col">

    <ul id="bk-list" class="bk-list clearfix">

      <li>

        <div class="bk-book book-1 bk-bookdefault">

          <div class="bk-front">

            <div class="bk-cover">

              <img class='crop' src='https://online.fliphtml5.com/ekgb/<?php echo $key_brochure; ?>/files/shot.jpg'
                data-rel='fh5-light-box-demo'
                data-href='https://online.fliphtml5.com/ekgb/<?php echo $key_brochure; ?>/' data-width='1000'
                data-height='600' data-title='Flick through the Digital Brochure'>

            </div>

          </div>



          <div class="bk-right"></div>

          <div class="bk-left">

            <h2><span><?php echo $nom_brochure; ?></span></h2>

          </div>

        </div>

      </li>

    </ul>

  </div>



  <?php

			}else{

			?>



  <div id="col">

    <ul id="bk-list" class="bk-list clearfix">





      <h2><span><?php echo "<br/><br/><br/><br/>Soon available!<br/>".$nom_brochure;?></span></h2>

    </ul>

  </div>





  <?php						

		}

	}	

	?>





  <br /><br />

  </div>



  <script src="js/books1.js"></script>

  <script>
    $(function() {



                Books.init();



            });

  </script>



  <!-- Fin Flipbooks -->







</body>

</html>