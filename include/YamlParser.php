<?php
class YamlParser 
{
    public function load($filePath) {
        try {
            return sfYaml::load($filePath);
        }
        catch (Exception $e) {
            throw new YamlParserException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function dump($array) {
        try {
            return sfYaml::dump($array);
        }
        catch (Exception $e) {
            throw new YamlParserException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
