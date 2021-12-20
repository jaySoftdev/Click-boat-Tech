<?php

require_once(__DIR__.'/payloadHandler/payloadFactory.php');

$messages = '{
    "messages":{
        "12":{
            "message":"Hello, I want to rent your boat",
            "tenantId":"1505"
        },
        "14":{
            "message":"Did you recieved my message?",
            "tenantId":"1505"
        },
        "19":{
            "message":"You have recieved a message from Tenant. please check your messages.",
            "adminId":"3"
        },
        "23":{
            "message":"Yes. Sorry. For which dates?",
            "ownerId":"2546"
        },
        "35":{
            "message":"The 15 of April 2018 to 20 of April 2018.",
            "tenantId":"1505"
        },
        "48":{
            "message":"Ok, no problem, let me send you a custom offer!",
            "ownerId":"2546"
        }
    }
}';

$oPayloadFactory = payloadFactory::make($messages);
if($oPayloadFactory)
{
    $oMessageCollection = $oPayloadFactory::parse($messages);

    echo "JSON: Last message from Tanent was '".$oMessageCollection->getLastTenantMessage()."'.";
    echo "<br/>";
    echo "JSON: Owner received message count is '".$oMessageCollection->getOwnerRecievedMessageCount()."'.";
}

$xmlMessage = '<xml Version="1.0">
    <messages>
        <id-12>
            <message>Hello, I want to rent your boat</message>
            <tenantId>1505</tenantId>
        </id-12>
        <id-14>
            <message>Did you recieved my message?</message>
            <tenantId>1505</tenantId>
        </id-14>
        <id-19>
            <message>You have recieved a message from Tenant. please check your messages.</message>
            <adminId>1505</adminId>
        </id-19>
        <id-23>
            <message>Yes. Sorry. For which dates?</message>
            <ownerId>2546</ownerId>
        </id-23>
        <id-35>
            <message>The 15 of April 2018 to 20 of April 2018.</message>
            <tenantId>1505</tenantId>
        </id-35>
        <id-48>
            <message>Ok, no problem, let me send you a custom offer!</message>
            <ownerId>2546</ownerId>
        </id-48>
    </messages>
</xml>';

$oPayloadFactory = payloadFactory::make($xmlMessage);
if($oPayloadFactory)
{
    $oMessageCollection = $oPayloadFactory::parse($xmlMessage);

    echo "XML: Last message from Tanent was '".$oMessageCollection->getLastTenantMessage()."'.";
    echo "<br/>";
    echo "XML: Owner received message count is '".$oMessageCollection->getOwnerRecievedMessageCount()."'.";
}