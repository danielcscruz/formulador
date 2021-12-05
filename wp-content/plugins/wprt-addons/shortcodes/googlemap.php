<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$html = $css = $dragging = '';

extract( shortcode_atts( array(
    'style' => 'style-1',
    'lat' => '',
    'lng' => '',
    'width' => '',
    'height' => '300',
    'zoom' => '14',
    'drag_mobile' => 'true',
    'drag_desktop' => 'true',
    'marker_type' => 'simple',
    'image' => ''
), $atts ) );

if ( $width ) $css .= 'width:'. intval( $width ) .'px;';
if ( $height ) $css .= 'height:'. intval( $height ) .'px;';

$id = "map_". uniqid();

$dragging = ( wp_is_mobile() ) ? $drag_mobile : $drag_desktop;

if ( $image && $marker_type == 'image' )
    $image = wp_get_attachment_image_src( $atts['image'], 'full' )[0];

$ultra_light = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]';

$mono_light = '[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]';

$even_light = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#6195a0"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#e6f3d6"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#f4d2c5"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#f4f4f4"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#eaf6f8"}]}]';

switch ( $style ) {
    case "style-1":
        $style = $ultra_light;
        break;
    case "style-2":
        $style = $mono_light;
        break;
    case "style-3":
        $style = $even_light;
        break;
}

$html = '
<script type="text/javascript">
    var places = [['. $lat .', '. $lng .']];

    function agrikole_vc_gmap() {
        var mapOptions = {
            scrollwheel: false,
            styles:'. $style .',
            draggable: '. $dragging .',
            zoom: '. $zoom .',
            center: new google.maps.LatLng('. $lat .', '. $lng .'),
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
            }
        }

        var map = new google.maps.Map( document.getElementById("'. $id .'"), mapOptions );
       
        setMarkers( map, places );
    }

    function setMarkers( map, locations ) {
        for ( var i = 0; i < locations.length; i++ ) {
            var place = locations[i];
            var myLatLng = new google.maps.LatLng( place[0], place[1] );
            var marker = new google.maps.Marker( {
                position: myLatLng,
                map: map,
                icon: "'. $image .'",
                zIndex: place[2],
                animation: google.maps.Animation.DROP
            } );

            google.maps.event.addListener( marker, "click", function () {
                infowindow.setContent( decodeURIComponent( this.html ) );
                infowindow.open( map, this );
            } );
        }
    }

    google.maps.event.addDomListener(window, "load", agrikole_vc_gmap);
</script>';

printf( '%s<div id="%s" class="agrikole-google-map" style="%s"></div>', $html, $id, $css );