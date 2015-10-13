<?php
$arrUrl = array("cdnl1516photo"=>"https://picasaweb.google.com/data/feed/base/user/117590660096025980525/albumid/6202229851688075025?alt=rss&kind=photo&hl=fr"
	,"cdnl1516data"=>"https://docs.google.com/spreadsheets/d/12M3uOcTnHHKUziA5Rhi2ygE_m6ORkBcEQ2THS6W2M4U/pub?output=csv"
	,"THYP1516data"=>"https://docs.google.com/spreadsheets/d/1ED680az81kja4nkUi89PhZldzkdwVrJVF21AwHDf6j8/pub?gid=2078932914&single=true&output=csv"
	,"THYP1516photo"=>"https://picasaweb.google.com/data/feed/base/user/117590660096025980525/albumid/6202430039697759777?alt=rss&kind=photo&hl=fr"
	);
	
curl($arrUrl[$_GET['url']]);

function curl($url){
    
	$handle = curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    curl_close($handle);
    
    echo $response;
}