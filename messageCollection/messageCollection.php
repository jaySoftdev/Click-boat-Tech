<?php

require_once('iMessageCollection.php');

class messageCollection implements iMessageCollection
{
    private $messages;

    public function __construct($aMessages)
    {
        $this->messages = $aMessages;

        return $this;
    }

    public function getLastTenantMessage()
    {
        $tempMessages = $this->messages["messages"];
        rsort($tempMessages);
        $lastMessage = "Record not found";

        foreach($tempMessages as $aLastMessage)
        {
            if(is_array($aLastMessage) && array_key_exists("tenantId",$aLastMessage))
            {
                return $lastMessage = $aLastMessage["message"];
            }
        }
        return $lastMessage;
    }

    public function getOwnerRecievedMessageCount()
    {
        $nOwnerReceivedMessageCount = 0;
        foreach($this->messages["messages"] as $aLastMessage)
        {
            if(is_array($aLastMessage) && !array_key_exists("ownerId",$aLastMessage))
            {
                $nOwnerReceivedMessageCount ++;
            }
        }
        return $nOwnerReceivedMessageCount;
    }
}