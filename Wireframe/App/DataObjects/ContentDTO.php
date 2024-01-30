<?php

namespace App\DataObjects;

use DateTime;

class ContentDTO
{
    public function __construct(
        public readonly string|null $id,
        public readonly string|null $content_title,
        public readonly string|null $content,
        public readonly string|null $category_id,
        public readonly string|null $enabled,
        public readonly string|null $added_by,
        public readonly DateTime|null $added_date
    ) {
    }
}