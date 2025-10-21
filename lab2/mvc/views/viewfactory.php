<?php
namespace MVC\Views;

require_once __DIR__ . '/MarkdownView.php';

abstract class ViewFactory
{
    abstract public function render(): string;

    public static function create(string $type, string $class, $decorator): MarkdownView
    {
        return new MarkdownView($decorator);
    }
}
