#!/usr/local/php5/bin/php -q
<?php

  // Debug info
  // ---------------------------------------------------------------------------
  // ini_set('error_reporting', -1);
  // ini_set('display_errors', 1);
  // ini_set('html_errors', 1);

  $images = [
    ['naja', 'http://graph.facebook.com/naja.krohn/picture'],
    ['jesper-k', 'http://graph.facebook.com/jesperkruse2/picture'],
    ['lene', 'http://graph.facebook.com/lene.paulli/picture'],
    ['per', 'http://graph.facebook.com/per.aabentoft/picture'],
    ['ida-marie', 'assets/imgs/profile.png'],
    ['jytte', 'http://graph.facebook.com/1297177200/picture'],
    ['anders', 'http://graph.facebook.com/anders.rasmussen.5851/picture'],
    ['tami', 'http://graph.facebook.com/tami.s.krohn/picture'],
    ['carsten', 'http://graph.facebook.com/carsten.kaldal/picture'],
    ['iza', 'http://graph.facebook.com/izakrohn/picture'],
    ['anne', 'http://graph.facebook.com/anne.p.larsen/picture'],
    ['henrik', 'http://graph.facebook.com/henrik.p.larsen.16/picture'],
    ['kim', 'http://graph.facebook.com/kim.kruse.56/picture'],
    ['josephine', 'http://graph.facebook.com/JosephineKryger/picture'],
    ['ken', 'http://graph.facebook.com/Ken.Kruse157/picture'],
    ['ann', 'http://graph.facebook.com/1518499013/picture'],
    ['morten', 'http://graph.facebook.com/mortenbogeskovbrok/picture'],
    ['emil', 'assets/imgs/profile.png'],
    ['pernille', 'http://graph.facebook.com/pernille.bogeskov/picture'],
    ['susane', 'assets/imgs/profile.png'],
    ['hans', 'assets/imgs/profile.png'],
    ['birthe', 'http://graph.facebook.com/birthe.sorensen3/picture'],
    ['marie', 'assets/imgs/profile.png'],
    ['anita-n', 'http://graph.facebook.com/anita.nielsen.5055/picture'],
    ['jorgen', 'http://graph.facebook.com/jorgen.paulli/picture'],
    ['ulla', 'http://graph.facebook.com/ulla.damgaard.3/picture'],
    ['michael', 'assets/imgs/profile.png'],
    ['maria', 'http://graph.facebook.com/maria.k.krohn/picture'],
    ['peter', 'http://graph.facebook.com/peter.mikkelsen.5/picture'],
    ['julie-s', 'http://graph.facebook.com/julie.sanderhoff/picture'],
    ['jan', 'http://graph.facebook.com/jan.paulli/picture'],
    ['henk-emil', 'assets/imgs/profile.png'],
    ['jens', 'assets/imgs/profile.png'],
    ['kirsten', 'http://graph.facebook.com/100001934461745/picture'],
    ['poul', 'assets/imgs/profile.png'],
    ['anita', 'http://graph.facebook.com/566539883/picture'],
    ['lasse', 'assets/imgs/profile.png'],
    ['janus', 'http://graph.facebook.com/Janus.Thyson.Damgaard/picture'],
    ['ayo', 'assets/imgs/profile.png'],
    ['lisanne', 'http://graph.facebook.com/lisanne.petersen.1/picture'],
    ['sune-k', 'assets/imgs/profile.png'],
    ['dorthe', 'assets/imgs/profile.png'],
    ['jonas', 'http://graph.facebook.com/jones.mis/picture'],
    ['sune', 'http://graph.facebook.com/700115275/picture'],
    ['julie', 'http://graph.facebook.com/543619805/picture'],
    ['nick-d', 'http://graph.facebook.com/nick.distler.16/picture'],
    ['djana', 'http://graph.facebook.com/djana.holmstrom/picture'],
    ['nick-n', 'assets/imgs/profile.png'],
    ['natasja-l', 'http://graph.facebook.com/natasja.laursen.52/picture'],
    ['omar', 'http://graph.facebook.com/omarryberg.karsbek/picture'],
    ['christina', 'http://graph.facebook.com/christina.e.christensen.52/picture'],
    ['mick', 'http://graph.facebook.com/mick.hvid/picture'],
    ['helene', 'http://graph.facebook.com/helene.fallesen/picture'],
    ['jesper', 'http://graph.facebook.com/688964791/picture'],
    ['sarah', 'http://graph.facebook.com/sarah.terndrup/picture'],
    ['rasmus', 'http://graph.facebook.com/rasmus.s.klemmensen/picture'],
    ['kristina', 'http://graph.facebook.com/kristina.sylvest/picture'],
    ['natasja', 'http://graph.facebook.com/natasja.petersen.3/picture'],
    ['bettina', 'http://graph.facebook.com/bettina.jensen.3958/picture'],
    ['sara', 'http://graph.facebook.com/sara.jacek.3/picture'],
    ['katrine', 'http://graph.facebook.com/gorbeline/picture'],
    ['bjarke', 'http://graph.facebook.com/bjarke.mortensen.3/picture']
  ];

  function spritegen( $images, $dest = 'sprite.png', $image_width = 50, $image_height = 50 ) {

    $height      = 0;
    $sprite_path = realpath( getcwd() . '/../assets/imgs/' . $dest );
    $css_path    = realpath( getcwd() . '/../stylesheets/screen.css' );

    foreach ( $images as $image ) {
      $height += $image_height;
    }

    $sprite = imagecreatetruecolor( $image_width, $height );
    $alpha  = imagecolorallocatealpha( $sprite, 220, 255, 255, 127 );
    imagefill( $sprite, 0, 0, $alpha );
    imagealphablending( $sprite, false );
    imagesavealpha( $sprite, true );

    $pos  = 0;
    $css  = '/* picture-sprite */';
    $css .= ($image_width <> 50 || $image_height <> 50 ? '@media (min--moz-device-pixel-ratio: 1.5) and (min-width: 37.75em), (-o-min-device-pixel-ratio: 3 / 2) and (min-width: 37.75em), (-webkit-min-device-pixel-ratio: 1.5) and (min-width: 37.75em), (min-device-pixel-ratio: 1.5) and (min-width: 37.75em), (min-resolution: 144dpi) and (min-width: 37.75em), (min-resolution: 1.5dppx) and (min-width: 37.75em){' : '@media (min-width: 37.75em){');
    $css .= '.guest i{background-image: url(../assets/imgs/' . $dest . ');' . ($image_width <> 50 || $image_height <> 50 ? 'background-size: ' . $image_width/2 . 'px ' . $height/2 . 'px' : '') . '}';

    foreach ( $images as $image ) {

      if ( $image[1] != 'assets/imgs/profile.png' ) {

        if ( $image_width <> 50 || $image_height <> 50 ) {

            $image[1] .= '?width=' . $image_width . '&height=' . $image_height;

        }

        $tmp = imagecreatefromjpeg( $image[1] );

      } else {

        if ( $image_width <> 50 || $image_height <> 50 ) {

          $image[1] = 'assets/imgs/profile-highres.png';

        }

        $tmp = imagecreatefrompng( realpath( getcwd() . '/../' . $image[1] ) );

      }

      $css .= ' .guest.guest--' . $image[0] . ' i{background-position: 0 ' . ( $pos <> 0 ? '-' . $pos . 'px' : '0' ) . '}';

      imagecopy( $sprite, $tmp, 0, $pos, 0, 0, $image_width, $image_height );
      $pos += $image_height;
      imagedestroy( $tmp );

    }

    $css .= '}';

    imagepng( $sprite, $sprite_path);

    $pattern      = '@/* picture-sprite */.+@i';
    $current_css  = file_get_contents( $css_path );
    $replaced_css = preg_replace($pattern, '', $current_css);
    $new_css      = $replaced_css . $css;

    file_put_contents( $css_path, $new_css, FILE_APPEND );

  }

  spritegen( $images );
  spritegen( $images, 'sprite-highres.png', 100, 100 );
