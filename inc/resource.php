<?php 

if(!defined("ABSPATH")){
    exit;
}
function myThemeResource($urls,$relation_type){
    if('preconnect'=== $relation_type){
        $urls[]=[
            "href" => "https://fonts.googleapis.com"
        ];
        $urls[]=[
            "href"=>"https://fonts.gstatic.com",
            'crossorigin'=>'anonymous'
        ];
    }

    return $urls;
}

add_filter("wp_resource_hints","myThemeResource",10,2);