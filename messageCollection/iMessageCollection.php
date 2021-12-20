<?php

interface iMessageCollection
{
    public function getLastTenantMessage();

    public function getOwnerRecievedMessageCount();
}