<?php
/*
 * Author: ANM22
 * Last modified: 03 Jan 2020 - GMT +1 23:34
 *
 * ANM22 Andrea Menghi all rights reserved
 *
 */

class com_anm22_wb_webcam extends com_anm22_wb_editor_page_element {

    public $elementClass = "com_anm22_wb_webcam";
    public $elementPlugin = "com_anm22_wb_webcam";
    private $videoURI;
    private $cssClass;

    function importXMLdoJob($xml) {
        $this->videoURI = $xml->videoURI;
        $this->cssClass = $xml->cssClass;
    }

    function show() {
        echo '<div class="' . $this->elementClass . "_" . $this->elementPlugin;
                if ($this->cssClass != "" and $this->cssClass != "") {
                    echo ' ' . $this->cssClass;
                }
                echo '">';
                
            echo '<link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />';
            // If you'd like to support IE8 (for Video.js versions prior to v7)
            echo '<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>';
            
            echo '<style>.vjs-big-play-centered .vjs-big-play-button{background-image:url(\'' . $this->page->getHomeFolderRelativeHTMLURL() . 'ANM22WebBase/website/plugins/' . $this->elementPlugin . '/img/play-button-arrowhead-white.svg\');background-size:25px 25px;background-position:center center;background-repeat:no-repeat;}</style>';
            
            echo '<video class="video-js vjs-default-skin vjs-big-play-centered" controls autoplay preload="auto" data-setup=\'{"fluid": false}\'>';
                echo '<source src="' . $this->videoURI . '" type="application/x-mpegURL">';
                echo '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>';
            echo '</video>';
            
            echo '<script src="https://vjs.zencdn.net/7.6.6/video.js"></script>';
            
            echo '<script>window.addEventListener("load", function(event) {';
                echo 'videojs(\'player\',{autoplay: true});';
            echo '});</script>';
        echo '</div>';
    }

}