<?php

class TelegraphText
{
    public $title, $text, $author, $published, $slug;
    public function __construct($author, $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('d/m/y/h/i');
    }
    public function storeText()
    {
        $arrayText['title'] = $this->title;
        $arrayText['text'] = $this->text;
        $arrayText['author'] = $this->author;
        $arrayText['published'] = $this->published;
        file_put_contents($this->slug, serialize($arrayText));
    }
    public function loadText()
    {
        if (file_exists($this->slug)) {
            $arrayText = unserialize(file_get_contents($this->slug));
            $this->title = $arrayText['title'];
            $this->text = $arrayText['text'];
            $this->author = $arrayText['author'];
            $this->published = $arrayText['published'];
            return ($this->text);
        }
    }
    public function editText($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
}

$text1 = new TelegraphText('Ponomarev', 'test.txt');
$text1->editText('Hello', 'World');
$text1->storeText();
$text1->loadText();
var_dump($text1);
