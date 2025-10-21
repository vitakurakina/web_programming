<?php
declare(strict_types=1);

namespace MVC\Views;

class MarkdownView
{
    private string $title;
    private string $body;

    const LAYOUT = <<<MARKDOWN
# {{{title}}}

{{{body}}}

---
MARKDOWN;

    /**
     * @param object $decorator — UserDecorator или UsersDecorator
     */
    public function __construct(object $decorator)
    {
        $this->title = method_exists($decorator, 'title') ? $decorator->title() : '';

        // Используем bodyMd() если есть, иначе body()
        $this->body = method_exists($decorator, 'bodyMd') ? $decorator->bodyMd() : $decorator->body();
    }

    public function render(): string
    {
        return str_replace(
            ['{{{title}}}', '{{{body}}}'],
            [$this->title, $this->body],
            self::LAYOUT
        );
    }
}
