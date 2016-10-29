<?php

use Illuminate\Database\Seeder;
use App\Unis\Common\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Region::truncate();

		$parent = [0];

		$handle = fopen(asset('storage/region.txt'), 'r');

		while (!feof($handle)) {
		    $row = trim(str_replace('　', ' ', fgets($handle)));

		    if (!preg_match('/^(\d+)\s+(.+)$/', $row, $matches)) {
		        continue;
		    }

		    list($row, $id, $name) = $matches;

		    $level = strlen(preg_replace('/(00){1,2}$/', '', $id)) / 2;

		    $parent_id = $parent[$level - 1];

		    $parent[$level] = $id;

		    Region::create([
		    	'id' => $id,
		    	'parent_id' => $parent_id,
		    	'name' => $name,
		    	]);

		}

		fclose($handle);
	}

}
