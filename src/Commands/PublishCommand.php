<?php

namespace XMultibyte\Package\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use XMultibyte\Package\PackageServiceProvider;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:publish
             {--config : Publish the package configuration file.}
             {--lang : Publish the package language files.}
             {--assets : Publish the package assets.}
             {--views : Publish the package views.}
             {--migrations : Publish the package migrations.}
             {--translations : Publish the package translations.}
             {--f|force : Overwrite any existing files.}';
    
    protected $description = 'Publish the package resources.';
    
    /**
     * Handle the command.
     *
     * @return void
     */
    public function handle(): void
    {
        $tags = [];
        
        if ($this->option('config')) {
            $tags[] = 'config';
        }
        
        if ($this->option('lang')) {
            $tags[] = 'lang';
        }
        
        if ($this->option('assets')) {
            $tags[] = 'assets';
        }
        
        if ($this->option('views')) {
            $tags[] = 'views';
        }
        
        if ($this->option('migrations')) {
            $tags[] = 'migrations';
        }
        
        
        Artisan::call('vendor:publish', [
            '--provider' => PackageServiceProvider::class,
            '--tag'      => $tags,
        ]);
        
        $this->line('Published the package resources.');
    }
}
