<?php
require_once "../vendor/autoload.php";

class YamlParserTest extends PHPUnit_Framework_TestCase
{
    private $yamlParser;

    public function setup() {
        $this->yamlParser = new YamlParser();
    }

    public function testMainArrayKeys() {
        $parsedYaml    = $this->yamlParser->load("article.yml");
        $mainArrayKeys = array_keys($parsedYaml);
        $expectedKeys  = array("author", "category", "article", "articleCategory");

        $this->assertEquals($expectedKeys, $mainArrayKeys);

    }

    public function testSecondLevelElement() {
        $parsedYaml    = $this->yamlParser->load("article.yml");
        $actualArticle = $parsedYaml["article"][0];
        $title         = "How to Use YAML in Your Next PHP Project";
        $content = "YAML is a less-verbose data serialization format. "
                 . "It stands for \"YAML Ain't Markup Language\". "
                 . "YAML has been a popular data serialization format among "
                 . "software developers mainly because it's human-readable.\n";

        $expectedArticle = array("id" => 1, "title" => $title, "content" => $content, "author" => 1, "status" => 2);

        $this->assertEquals($expectedArticle, $actualArticle);
    }

    /**
     * @expectedException YamlParserException
     */
    public function  testExceptionForWrongSyntax() {
        $this->yamlParser->load("wrong-syntax.yml");
    }
}
