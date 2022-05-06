<?php

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TransformPercentToSlashExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatWithSlash', [$this, 'addSlash']),
        ];
    }

    public function addSlash(string $path):string
    {
        return str_replace('%2','/',$path);
    }
}