<?php
return array(
	//'配置项'=>'配置值'
    'HTML_CACHE_ON'     =>  true,
    'HTML_CACHE_TIME'   =>  60,
    'HTML_FILE_SUFFIX'  =>  '.shtml',
    'HTML_CACHE_RULES'  =>  array(
        'Index:setting' =>  'Index/{:action}',
    )
);