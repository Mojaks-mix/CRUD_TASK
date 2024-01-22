<?php

namespace App\DataObjects;

class CategoryDTO
{
    public function __construct(
        public readonly string|null $id,
        public readonly string|null $category_name,
        public readonly string|null $parent_id
    ) {
    }
}