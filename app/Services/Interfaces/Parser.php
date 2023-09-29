<?php

namespace App\Services\Interfaces;

use App\Models\Category;
use App\Models\News;

interface Parser
{
    public function setLink(string $link): Parser;

    public function saveParseData(): void;
}
