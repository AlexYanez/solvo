<?php

/**
 * Auxiliar class with the tools for print the information
 */
class Toolskit {

    /**
     * If you are in a development environment it takes a string or an array and prints it on a nice readable way.
     * @param array $info with array for print
     * @return void
     */
    public static function printInfo ($info, $returnInfo = 0, $title = "")
    {
        $o = "<br>---------------------------------------------";
        if ($title) {
            $o .= "<h3>$title</h3>";
        }
        $o .= "<pre style='font-family: courier'>";
        $o .= print_r($info, 1);
        $o .= "</pre>";

        if ($returnInfo == 1) {
            return $o;
        } else {
            echo $o;
        }
    }
}

/**
 * Class Electronic Article parent with the data as part of the electronic item type
 */
class ElectronicArticle
{
    private $items = array();

    private $id;
    private $name;
    private $price;
    private $type;
    private $wired;

    public function __construct($id, $name, $price, $type, $wired) {
        $this->id       = $id;
        $this->name     = $name;
        $this->price    = $price;
        $this->type     = $type;
        $this->wired    = $wired;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getWired()
    {
        return $this->wired;
    }

    /**
     * @param mixed $wired
     */
    public function setWired($wired): void
    {
        $this->wired = $wired;
    }

}

/**
 * Class Console with the data as part of the electronic item type
 */
class Console extends ElectronicArticle
{
    private $memory;
    private $extra;
    const MAX_CONSOLE_EXTRAS = 4;

    function Console($id, $name, $price, $type, $wired, $memory, $extra) {
        parent::__construct($id, $name, $price, $type, $wired);
        $this->memory = $memory;
        $this->extra = array();
    }

    /**
     * @return array
     */
    public function getExtra(): array
    {
        return $this->extra;
    }

    /**
     * @param array $extra
     */
    public function setExtra(array $extra): void
    {
        $this->extra = $extra;
    }

    /**
     * @return mixed
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @param mixed $memory
     */
    public function setMemory($memory): void
    {
        $this->memory = $memory;
    }

    public function maxExtras(int $amountExtra){
        if ($amountExtra > self::MAX_CONSOLE_EXTRAS) {
            return false;
        } else {
            return true;
        }
    }

}

/**
 * Class Television with the data as part of the electronic item type
 */
class Television extends ElectronicArticle
{
    private $inch;
    private $extra;
    const MAX_CONSOLE_EXTRAS = INF;

    function Television($id, $name, $price, $type, $wired, $inch, $extra) {
        parent::__construct($id, $name, $price, $type, $wired);
        $this->inch     = $inch;
        $this->extra    = array();
    }

    /**
     * @return array
     */
    public function getExtra(): array
    {
        return $this->extra;
    }

    /**
     * @param array $extra
     */
    public function setExtra(array $extra): void
    {
        $this->extra = $extra;
    }

    /**
     * @return mixed
     */
    public function getInch()
    {
        return $this->inch;
    }

    /**
     * @param mixed $inch
     */
    public function setInch($inch): void
    {
        $this->inch = $inch;
    }


    public function maxExtras(int $amountExtra){
        if ($amountExtra > self::MAX_CONSOLE_EXTRAS) {
            return false;
        } else {
            return true;
        }
    }

}

/**
 * Class Microwave with the data as part of the electronic item type
 */
class Microwave extends ElectronicArticle
{
    private $power;
    const MAX_CONSOLE_EXTRAS = 0;

    function Microwave($id, $name, $price, $type, $wired, $power) {
        parent::__construct($id, $name, $price, $type, $wired);
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power): void
    {
        $this->power = $power;
    }

    public function maxExtras(int $amountExtra){
        if ($amountExtra > self::MAX_CONSOLE_EXTRAS) {
            return false;
        } else {
            return true;
        }
    }

}

/**
 * Class Controller with the data as part of the electronic item type
 */
class Controller extends ElectronicArticle
{
    private $software;
    const MAX_CONSOLE_EXTRAS = 0;

    function Controller($id, $name, $price, $type, $wired, $software) {
        parent::__construct($id, $name, $price, $type, $wired);
        $this->software = $software;
    }

    /**
     * @return mixed
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param mixed $software
     */
    public function setSoftware($software): void
    {
        $this->software = $software;
    }

    public function maxExtras(int $amountExtra){
        if ($amountExtra > self::MAX_CONSOLE_EXTRAS) {
            return false;
        } else {
            return true;
        }
    }

}

/**
 * Class with the electronic items
 */
class ElectronicItems
{
    private $console;
    private $television;
    private $microwave;
    private $controller;

    public function __construct() {
        $this->console      = new Console("", "", "", "", "", "", "");
        $this->television   = new Television("", "", "", "", "", "", "", "");
        $this->microwave    = new Microwave("", "", "", "", "", "");
        $this->controller   = new Controller("", "", "", "", "", "");
    }

    /**
     * @param $item with the type of the article
     * @param $value with the data for the "database"
     */
    public function loadItems($item, $value) {

        if ($item == "console"){
            $this->console->setId($value["id"]);
            $this->console->setName($value["name"]);
            $this->console->setPrice($value["price"]);
            $this->console->setType("console");
            $this->console->setWired("normal");
            $this->console->setMemory("25 MB");

        } elseif ($item == "television"){
            $this->television->setId($value["id"]);
            $this->television->setName($value["name"]);
            $this->television->setPrice($value["price"]);
            $this->television->setType("tv");
            $this->television->setWired("normal");
            $this->television->setInch("65");

        } elseif ($item == "microwave"){
            $this->microwave->setId($value["id"]);
            $this->microwave->setName($value["name"]);
            $this->microwave->setPrice($value["price"]);
            $this->microwave->setPower("700");
            $this->microwave->setType("tv");
            $this->microwave->setWired("normal");

        } elseif ($item == "controller"){
            $this->controller->setId($value["id"]);
            $this->controller->setName($value["name"]);
            $this->controller->setPrice($value["price"]);
            $this->controller->setSoftware("Virtual Dj");
            $this->controller->setType("tv");
            $this->controller->setWired("normal");
        }

        if ($value["extra"]) {
            if ($item == "console")
                if ($this->console->maxExtras(count($value["extra"])))
                        $this->console->setExtra($value["extra"]);
                    else
                        Toolskit::printInfo("Error. You reached the maximum of extra articles for this product.");

            if ($item == "television")
                if ($this->television->maxExtras(count($value["extra"])))
                    $this->television->setExtra($value["extra"]);
            else
                Toolskit::printInfo("Error. You reached the maximum of extra articles for this product.");
        }

    }

    /**
     * @param $item with the type of the article
     * @return array with the data of the "database"
     */
    public function downloadItems($item) {

            if ($item == "console"){
                $article["id"]        = $this->console->getId();
                $article["name"]      = $this->console->getName();
                $article["price"]     = $this->console->getPrice();
                $article["type"]      = $this->console->getType();
                $article["wired"]     = $this->console->getWired();
                $article["memory"]    = $this->console->getMemory();
                $article["extra"]     = $this->console->getExtra();

            } elseif ($item == "television"){
                $article["id"]        = $this->television->getId();
                $article["name"]      = $this->television->getName();
                $article["price"]     = $this->television->getPrice();
                $article["type"]      = $this->television->getType();
                $article["wired"]     = $this->television->getWired();
                $article["inch"]      = $this->television->getInch();
                $article["extra"]     = $this->television->getExtra();

            } elseif ($item == "microwave"){
                $article["id"]        = $this->microwave->getId();
                $article["name"]      = $this->microwave->getName();
                $article["price"]     = $this->microwave->getPrice();
                $article["type"]      = $this->microwave->getType();
                $article["wired"]     = $this->microwave->getWired();
                $article["power"]     = $this->microwave->getPower();

            } elseif ($item == "controller"){
                $article["id"]        = $this->controller->getId();
                $article["name"]      = $this->controller->getName();
                $article["price"]     = $this->controller->getPrice();
                $article["type"]      = $this->controller->getType();
                $article["wired"]     = $this->controller->getWired();
                $article["software"]  = $this->controller->getSoftware();
            }
        return $article;
    }

    /**
     * @param $buy array with the articles to buy
     * @return array with the articles to boy
     */
    public function setGetItems($buy) {

        // Simulation of the set and get the articles
        $new = [];
        foreach ($buy as $item => $list) {
            foreach ($list as $key => $value){
                $this->loadItems($item, $value);
                $new[$item][$key] = $this->downloadItems($item);
            }
        }
       return $new;
    }

    /**
     * @param array $buy array with the articles to boy
     * @return array with the articles listed
     */
    public function listingItems(array $buy) {

        // Listing articles for billing
        $articles = [];
        $art = 0;
        foreach ($buy as $item => $list) {
            foreach ($list as $key => $value) {
                do {

                    $articles[$art]["type"]     = $item;
                    $articles[$art]["id"]       = $value["id"];
                    $articles[$art]["name"]     = $value["name"];
                    $articles[$art]["price"]    = $value["price"];
                    $value["amount"]--;
                    $art++;

                    if ($value["extra"]) {
                        foreach ($value["extra"] as $k => $extra) {
                            do {
                                $articles[$art]["type"]     = $item . " extra";
                                $articles[$art]["id"]       = $extra["extracode"];
                                $articles[$art]["price"]    = $extra["extraprice"];
                                $extra["amount"]--;
                                $art++;
                            } while ($extra["amount"] != 0);

                        }
                    }

                } while ($value["amount"] != 0);
            }
        }

        return $articles;
    }

    /**
     * @param array $articles with the data of the buy
     * @return array with the billing by section of articles
     */
    public function billingSection(array $articles) {
        $categories = ["console", "television", "microwave", "controller"];

        $sectionArray = [];

        // Calculation by section of articles
        foreach ($categories as $item => $name) {
            $sectionPricing = 0;
            foreach ($articles as $key => $data) {
                    if (strpos($data["type"], $name) !== false) {
                        $sectionPricing = $sectionPricing + $data["price"];
                    }
            }
            $sectionArray[$name] = $sectionPricing;
        }

        return $sectionArray;
    }

    /**
     * @param array $articles with the data of the buy
     * @return int|mixed with the total of pricing
     */
    public function billingCalculation(array $articles) {

        $totalPricing = 0;
        // Adding up the calculation
        foreach ($articles as $key => $data) {
            $totalPricing = $totalPricing + $data["price"];
        }
        return $totalPricing;
    }

    /**
     * @param $articles with the data of the buy
     * @return mixed with the data listed and sorted by price
     */
    public function sortItems($articles) {

        // Sorting the articles
        $keys = array_column($articles, 'price');
        array_multisort($keys, SORT_DESC, $articles);

        return $articles;
    }

    /**
     * @param $buy with the data of the buy
     */
    public function finalCalculations($buy){

        // Set and get the articles
        $articles = $this->setGetItems($buy);

        // Listing the articles
        $articles = $this->listingItems($articles);

        // Calculation of billing
        $totalBilling = $this->billingCalculation($articles);

        // Sort the articles
        $sortItems = $this->sortItems($articles);

        // Billing sectional
        $billingSec = $this->billingSection($articles);

        Toolskit::printInfo($totalBilling, 0, "Total pricing: " );
        Toolskit::printInfo($sortItems, 0, "Items sorted by price: ");
        Toolskit::printInfo($billingSec, 0, "Costs by sections: ");

    }

}

$Elec = new ElectronicItems();

// Array with the simulation of the buy
$buy = array(
    "console"       => [["id" => "cons001", "amount" => 1, "name" => "Play Station 5", "price" => 2000, "extra" =>
                            [["extracode" => "remcon001", "amount" => 2, "extraprice" => 245],
                            ["extracode" => "wircon001", "amount" => 2, "extraprice" => 280] ]]],
    "television"    => [["id" => "tv001", "amount" => 1, "name" => "LG 2022", "price" => 3000, "extra" =>
                            [["extracode" => "rem001", "amount" => 2, "extraprice" => 50]]],
                        ["id" => "tv002", "amount" => 1, "name" => "Samsung 2022", "price" => 2500, "extra" =>
                            [["extracode" => "rem001", "amount" => 1, "extraprice" => 48]]]],
    "microwave"     => [["id" => "mic001", "amount" => 1, "name" => "Hitachi 200", "price" => 2000]],
    "controller"    => [],
);

$Elec->finalCalculations($buy);
