<?php declare(strict_types=1);

namespace App\Models;

use Tightenco\Collect\Support\Collection;

trait TraitsDropdownoptions
{
	function getDropdownOptions(
		bool $first_index_empty = true,
		string $field_label = 'display_name',
		string $field_value = 'id'
	): array {
		$dropdown_options = new Collection($first_index_empty ? ['' => '- Select one -'] : []);
		$records = new Collection(parent::select("$field_label, $field_value")->findAll());

		$options = $records->mapWithKeys(function ($item) use ($field_label, $field_value) {
			return [$item->$field_value => $item->$field_label];
		});

		return $dropdown_options->union($options)->toArray();
	}

	function getOptionDetailByID(
		$value,
		string $field_label = 'display_name',
		string $field_value = 'id'
	): ?string {
		if (!$value)
		{
			return null;
		}

		$data = parent::where($field_value, $value)
			->select($field_label)
			->first();

		return $data->$field_label;
	}
}
