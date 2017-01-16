<?php 
	 // function defination to convert array to xml
	function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_numeric($key) ){
            $key = 'item'.$key; //dealing with <0/>..<n/> issues
        }
        if( is_array($value) ) {
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
     }
	}


	function calculateRequest()
	{
	$userActive=App\User::where('status','active')->select('id')->get()->toArray();
	$totalRequest=App\Accesslog::whereIn('userId',$userActive)->count();

	$totalAccept=App\Accesslog::where('accStatus',1)->whereIn('userId',$userActive)->count();
	$totalDeny=App\Accesslog::where('accStatus',2)->whereIn('userId',$userActive)->count();
	$totalPending=App\Accesslog::where('accStatus',0)->whereIn('userId',$userActive)->count();

	$percentAccept=floor((int)$totalAccept * 100 / (int)$totalRequest);
	$percentDeny=floor((int)$totalDeny * 100 / (int)$totalRequest);
	$percentPending=floor((int)$totalPending * 100 / (int)$totalRequest);

	$percentRequest= array (
		'totalAccept'=>$totalAccept,
		'totalDeny'=>$totalDeny,
		'totalPending'=>$totalPending,
		'percentAccept'=>$percentAccept,
		'percentDeny'=>$percentDeny,
		'percentPending'=>$percentPending,
		);
	view()->share('percentRequest',$percentRequest);
	}

?>