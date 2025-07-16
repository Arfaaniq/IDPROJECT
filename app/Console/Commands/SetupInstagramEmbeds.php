<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupInstagramEmbeds extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'setup:instagram-embeds';

    /**
     * The console command description.
     */
    protected $description = 'Setup Instagram Embeds feature with migration and dependencies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Setting up Instagram Embeds feature...');

        // Run migration
        $this->info('📊 Running database migration...');
        Artisan::call('migrate');
        $this->info('✅ Migration completed successfully!');

        // Clear cache
        $this->info('🧹 Clearing application cache...');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        $this->info('✅ Cache cleared successfully!');

        // Show installation instructions
        $this->newLine();
        $this->info('📋 Installation Instructions:');
        $this->line('1. Make sure you have installed DaisyUI:');
        $this->line('   npm install -D daisyui@latest');
        $this->newLine();
        $this->line('2. Update your package.json scripts:');
        $this->line('   npm run dev (for development)');
        $this->line('   npm run build (for production)');
        $this->newLine();
        $this->line('3. Visit the Instagram Embeds page:');
        $this->line('   http://your-domain.com/instagram-embeds');
        $this->newLine();

        $this->info('🎉 Instagram Embeds feature setup completed!');
        
        return 0;
    }
}