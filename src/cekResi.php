<?php
namespace Namdevel;
/**
 * Cek resi pengiriman JNE, J&T, Tiki, Wahana, First Logistic, POS dan Sicepate, Sentral, Anteraja, dll.
 * Author : namdevel <https://github.com/namdevel>
 * Created at 10-09-2021 00:24
 * Last Modified 10-09-2021 00:26
 */
class cekResi
{
    
    const api_url = 'https://api.heusc.id';
    
    public $resi, $kurir;
    
    public function __construct($resi, $kurir)
    {
        $this->resi  = $resi;
        $this->kurir = $kurir;
    }
    
    public function check()
    {
        $payload = array(
            'kurir' => $this->kurir,
            'no_resi' => $this->resi
        );
        return self::Request(self::api_url . '/cek-resi', $payload, self::headers());
    }
    
    protected function Request($url, $post = false, $headers = false)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ));
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
    protected function headers()
    {
        $headers = array(
            'Host: api.heusc.id'
        );
        return $headers;
    }
    
}