<?php

namespace App;

class Fetcher
{
    public function get()
    {
        $args = func_get_args();

        $url = $this->url($args);

        return json_decode($this->doCurl($url));
    }

    protected function url($args)
    {
        foreach ($args as $key => $arg) {
            if ($key == 2) {
                $args[$key] = urlencode(rawurlencode($arg));
            } else {
                $args[$key] = rawurlencode($arg);
            }
        }

        $url = 'https://funnels.quotewizard.com/api/vehicles';

        $url .= '/' . implode('/', $args);

        return $url;
    }

    protected function doCurl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8'
        ));

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        return $server_output;
    }

    protected function urlEncode($string)
    {
        $string = rawurlencode($string);

        return str_replace('%2B', '%252B', $string);
    }
}