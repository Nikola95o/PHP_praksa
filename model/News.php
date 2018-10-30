<?php

require_once 'Database.php';

class News
{
    private $id;
    private $title;
    private $body;
    private $dateCreated;

    public function __get($name)
    {
        return $this->$name;
    }

    public static function search(string $string)
    {
        $db = Database::connect();
        $sql = "SELECT id, title, body, dateCreated FROM News WHERE title LIKE :string;'";
        $stmt = $db->prepare($sql);
        $string = '%'.$string.'%';
        $stmt->bindParam(':string', $string, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'News');
    }

    public static function getAll()
    {
        $db = Database::connect();
        $sql = "SELECT id, title, body, dateCreated FROM News LIMIT 10";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':string', $string, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'News');
    }

    public function print()
    {
        $doc = new DOMDocument();
        $div = $doc->createElement('div');
        $div->setAttribute('style', 'padding: 5px; margin-bot:5px; border: 1px solid red;');

        $title = new DOMElement('div', $this->title);
        $div->appendChild($title);
        $title->setAttribute('style', 'background: rgb(204, 255, 204); padding: 5px; margin-bot:5px;');

        $body = new DOMElement('p', $this->body);
        $div->appendChild($body);

        $body = new DOMElement('p', $this->dateCreated);
        $div->appendChild($body);

        $doc->appendChild($div);
        echo $doc->saveHTML($div);
    }
}