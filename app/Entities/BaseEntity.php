<?php declare(strict_types=1);

namespace App\Entities;

use Config\App;
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

	public function setDeletedAt(string $dateString): self
	{
		return $this->setTimestamp($dateString, 'deleted_at');
	}

	public function getDeletedAt(string $format = App::HUMAN_READABLE_DATETIME): string
	{
		return $this->getTimestamp($format, 'deleted_at');
	}

	public function setUpdatedAt(string $dateString): self
	{
		return $this->setTimestamp($dateString, 'updated_at');
	}

	public function getUpdatedAt(string $format = App::HUMAN_READABLE_DATETIME): string
	{
		return $this->getTimestamp($format, 'updated_at');
	}

	public function setCreatedAt(string $dateString): self
	{
		return $this->setTimestamp($dateString, 'created_at');
	}

	public function getCreatedAt(string $format = App::HUMAN_READABLE_DATETIME): string
	{
		return $this->getTimestamp($format, 'created_at');
	}

	private function setTimestamp(string $dateString, string $field): self
	{
		$this->attributes[$field] = new Time($dateString, app_timezone());

		return $this;
	}

	private function getTimestamp(string $format, string $field): string
	{
		$created_at = new Carbon($this->attributes[$field]);
		$created_at->setTimezone($this->session->get('timezone'));

		return $created_at->format($format);
	}

	public function setPassword(string $pass)
	{
		$this->password = password_hash($pass, PASSWORD_BCRYPT);

		return $this;
	}
}
