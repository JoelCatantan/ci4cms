<?php declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
	public function getDropdownOptions(
		bool $first_index_empty = true,
		string $field_label = 'display_name',
		string $field_vallue = 'id'
	): array
	{
		$dropdown_options = $first_index_empty ? ['' => '- Select one -'] : [];
		$records = parent::select("$field_label, $field_vallue")->findAll();

		foreach ($records as $record)
		{
			$dropdown_options[$record->$field_vallue] = $record->$field_label;
		}

		return $dropdown_options;
	}
}
