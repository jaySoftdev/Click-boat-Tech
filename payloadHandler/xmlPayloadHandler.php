<?php

require_once(__DIR__.'/payloadHandler.php');
require_once(__DIR__.'/../messageCollection/iMessageCollection.php');

class XMLPayloadHandler extends payloadHandler
{
    public static function parse($payload): iMessageCollection
    {
        $oParsedMessages = simplexml_load_string($payload,"SimpleXMLElement",LIBXML_NOCDATA);
        $json = json_encode($oParsedMessages);
        $aMessages = json_decode($json,TRUE);
        
        return new messageCollection($aMessages);
    }
}