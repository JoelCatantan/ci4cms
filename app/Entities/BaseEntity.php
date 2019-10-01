<?php declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\I18n\Time;
use CodeIgniter\Entity;
use Config\Services;
use Carbon\Carbon;

class BaseEntity extends Entity
{
	protected $session;

	public function __construct()
	{
		$this->session = Services::session();
	}

	public function setTimestamp(string $dateString, string $field): self
	{
		$this->attributes[$field] = new Time($dateString, app_timezone());

		return $this;
	}

	public function getTimestamp(string $format, string $field): string
	{
		$created_at = new Carbon($this->attributes[$field]);
		$created_at->setTimezone($this->session->get('timezone'));

		return $created_at->format($format);
	}
}
