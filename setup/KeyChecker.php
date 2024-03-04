<?php

class KeyChecker
{
    public static function isValid()
    {
        $appKey = env('APP_KEY');

        return $appKey !== null;
    }

    public static function isApiValid($appKey)
    {

        $url = 'https://istiyak.com/api/check_key';
        $data = ['from_key' => $appKey];

        //Test
if ($appKey=1234){
    self::updateEnvFile('APP_KEY', 'base64:HdnVqDkKJFMmnZgoNbz4FhPx195A1ryQ399/Rgt9YI8=');
    return ['success' => true, 'new_key' => 'base64:HdnVqDkKJFMmnZgoNbz4FhPx195A1ryQ399/Rgt9YI8='];
}
//Real Code
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//
//        $response = curl_exec($ch);
//        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//
//        curl_close($ch);
//
//        if ($statusCode === 200) {
//            $responseData = json_decode($response, true);
//
//            if (isset($responseData['new_key'])) {
//                self::updateEnvFile('APP_KEY', $responseData['new_key']);
//
//                return ['success' => true, 'new_key' => $responseData['new_key']];
//            }
//        }
//
//        return ['success' => false, 'error_message' => 'Invalid key or API response'];
    }


    private static function updateEnvFile($key, $value)
    {
        $envFilePath = base_path('.env');
        $content = file_get_contents($envFilePath);

        $pattern = "/^{$key}=(.*)$/m";
        $replacement = "{$key}={$value}";

        $content = preg_replace($pattern, $replacement, $content);

        file_put_contents($envFilePath, $content);
    }


}

