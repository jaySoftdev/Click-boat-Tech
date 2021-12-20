<?php

require_once(__DIR__.'/payloadHandler.php');
require_once(__DIR__.'/../messageCollection/messageCollection.php');

class JSONPayloadHandler extends payloadHandler
{
    public static function parse($payload): iMessageCollection
    {
        $aMessages = json_decode($payload,true);
        return new messageCollection($aMessages);
    }
}