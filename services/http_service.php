<?php

// @todo check url is valid
function redirect(string $url):void
{
	header("Location: $url");
}