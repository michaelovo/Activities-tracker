<?php

namespace App\Console\Commands;
use App\Category;
use Illuminate\Console\Command;

class AddCategory extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'category:cron';

	/**
	 * The console command description.
	 * {description=N/A}
	 * {name} {url} {description?}
	 * @var string
	 */
	protected $description = 'Add new categories to db';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {

		$name        = $this->ask('Enter category name');
		$description = $this->ask('Give a brief description of the category');
		$url         = $this->ask('Specify a url for the category');

		if ($this->confirm('Are you sure you want to insert"'.$name.'"?')) {
			$category = Category::create([
					'name'        => $name,
					'description' => $description,
					'url'         => $url,
				]);

			return $this->info('Added:'.$category->name);
		}

		$this->warn("No new category was added");

		// $category = Category::create([
		//             'name'        => $this->argument('name'),
		//             'url'         => $this->argument('url'),
		//             'description' => $this->argument('description')??'N/A',
		//         ]);

		//     $this->info('Added:'.$category->name);

		// $this->warn('This is a warning');
		// $this->error('This is a warning');

	}
}
