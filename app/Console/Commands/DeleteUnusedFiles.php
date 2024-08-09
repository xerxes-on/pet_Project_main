<?php

namespace App\Console\Commands;

use App\Models\Author;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteUnusedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unused-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle(): void
    {
        $tasks = Author::pluck('author_picture')->toArray();

        collect(Storage::disk('public')->allFiles())
            ->reject(fn(string $file) => $file === '.gitignore')
            ->reject(fn(string $file) => in_array($file, $tasks))
            ->each(fn($file) => Storage::disk('public')->delete($file));
    }

}
