<?php declare(strict_types=1);

namespace App\Entities;

use Config\App;

trait TraitsTimestamp
{
    public function setUpdatedAt(string $dateString): self
    {
        return parent::setTimestamp($dateString, 'updated_at');
    }

    public function getUpdatedAt(string $format = App::HUMAN_READABLE_DATETIME): string
    {
        return parent::getTimestamp($format, 'updated_at');
    }

    public function setCreatedAt(string $dateString): self
    {
        return parent::setTimestamp($dateString, 'created_at');
    }

    public function getCreatedAt(string $format = App::HUMAN_READABLE_DATETIME): string
    {
        return parent::getTimestamp($format, 'created_at');
    }
}
