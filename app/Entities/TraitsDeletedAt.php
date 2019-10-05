<?php declare(strict_types=1);

namespace App\Entities;

use Config\App;

trait TraitsDeletedAt
{
    public function setDeletedAt(string $dateString): self
    {
        return parent::setTimestamp($dateString, 'deleted_at');
    }

    public function getDeletedAt(string $format = App::HUMAN_READABLE_DATETIME): string
    {
        return parent::getTimestamp($format, 'deleted_at');
    }
}
