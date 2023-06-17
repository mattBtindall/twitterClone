<?php

namespace App\Twig;

use App\Entity\Post;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PostExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('post_constants', [$this, 'getPostConstants']),
        ];
    }

    public function getPostConstants(): array
    {
        return [
            'EDIT' => Post::EDIT,
        ];
    }
}
