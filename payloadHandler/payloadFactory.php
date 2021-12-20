<?php

require_once('jsonPayloadHandler.php');
require_once('xmlPayloadHandler.php');

class payloadFactory
{
    public static function make($payload)
    {
        if(json_decode($payload))
        {
            return new JSONPayloadHandler();
        }
        elseif(simplexml_load_string($payload))
        {
            return new XMLPayloadHandler();
        }
        return FALSE;
    }

}