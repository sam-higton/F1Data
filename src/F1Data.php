<?php
namespace F1Data;
class F1Data {
    static $settings;

    private function __construct() {}

    static function init($settings = false) {
        if($settings) {
            self::$settings = $settings;
        } else {
            self::$settings = self::loadDefaults();
        }
    }

    static function loadDefaults () {
        return array (
            "serviceType" => "api",
            "availableServices" => array (
                "api" => array (
                    "class" => "Api\\Ergast",
                    "adapter" => "Http\\GuzzleAdapter",
                    "baseUrl" => "http://ergast.com/api/f1/"
                )
            )
        );
    }


    static function loadSettings (array $settingsArray = array()) {
        self::$settings = $settingsArray;
    }
    static function setting ($settingName) {
        $settingRoute = explode(':',$settingName);
        $setting = self::$settings;
        foreach($settingRoute as $routePart) {
            if(isset($setting[$routePart])) {
                $setting = $setting[$routePart];
            } else {
                return NULL;
            }
        }
        return $setting;
    }
    static function applySetting($settingName, $settingValue) {
        $settingRoute = explode(':',$settingName);
        self::apply($settingRoute,self::$settings, $settingValue);
    }
    static function fetchAllSettings () {
        return self::$settings;
    }
    static function apply($route,&$setting, $value) {
        if(count($route) > 1) {
            $routePart = array_shift($route);
            if(!isset($setting[$routePart])) {
                $setting[$routePart] = array ();
            }
            self::apply($route, $setting[$routePart], $value);
        } else {
            $setting[$route[0]] = $value;
        }
    }

}