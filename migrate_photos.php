<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\EventCategory;
use App\Models\EventPhoto;

// Photo migration script for FoSCU
// This script migrates photos from the old website to the new event photo system

class PhotoMigrationScript
{
    private $basePath;
    private $laravelStoragePath;
    
    public function __construct()
    {
        $this->basePath = '/Users/leon/Desktop/foscu';
        $this->laravelStoragePath = '/Users/leon/Desktop/foscu/laravel-foscu/storage/app/public';
    }
    
    public function migrate()
    {
        echo "Starting photo migration...\n";
        
        // Create storage directories
        $this->createStorageDirectories();
        
        // Migrate AGM photos
        $this->migrateAGMPhotos();
        
        // Migrate coverage photos
        $this->migrateCoveragePhotos();
        
        // Migrate educational photos
        $this->migrateEducationalPhotos();
        
        // Migrate research photos
        $this->migrateResearchPhotos();
        
        // Migrate workshop photos
        $this->migrateWorkshopPhotos();
        
        echo "Photo migration completed!\n";
    }
    
    private function createStorageDirectories()
    {
        $directories = [
            'event-photos/annual-general-meetings',
            'event-photos/food-safety-workshops',
            'event-photos/community-outreach',
            'event-photos/research-activities',
            'event-photos/training-sessions'
        ];
        
        foreach ($directories as $dir) {
            if (!is_dir($this->laravelStoragePath . '/' . $dir)) {
                mkdir($this->laravelStoragePath . '/' . $dir, 0755, true);
                echo "Created directory: {$dir}\n";
            }
        }
    }
    
    private function migrateAGMPhotos()
    {
        echo "Migrating AGM photos...\n";
        
        // Find the AGM category
        $category = EventCategory::where('name', 'Annual General Meetings')->first();
        if (!$category) {
            echo "AGM category not found, skipping...\n";
            return;
        }
        
        $sourceDir = $this->basePath . '/static/gallery/AGM';
        $destDir = 'event-photos/annual-general-meetings';
        
        if (!is_dir($sourceDir)) {
            echo "Source AGM directory not found: {$sourceDir}\n";
            return;
        }
        
        $files = scandir($sourceDir);
        $order = 1;
        
        foreach ($files as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
                $sourcePath = $sourceDir . '/' . $file;
                $destPath = $destDir . '/' . $file;
                $fullDestPath = $this->laravelStoragePath . '/' . $destPath;
                
                if (copy($sourcePath, $fullDestPath)) {
                    // Create database entry
                    $title = $this->generateTitle($file);
                    
                    EventPhoto::create([
                        'event_category_id' => $category->id,
                        'title' => $title,
                        'description' => 'Photo from FoSCU Annual General Meeting',
                        'image_path' => $destPath,
                        'alt_text' => $title,
                        'status' => 'active',
                        'display_order' => $order++
                    ]);
                    
                    echo "Migrated: {$file}\n";
                } else {
                    echo "Failed to copy: {$file}\n";
                }
            }
        }
    }
    
    private function migrateCoveragePhotos()
    {
        echo "Migrating coverage photos...\n";
        
        // Find the community outreach category
        $category = EventCategory::where('name', 'Community Outreach')->first();
        if (!$category) {
            echo "Community Outreach category not found, skipping...\n";
            return;
        }
        
        $sourceDir = $this->basePath . '/static/gallery/coverage';
        $destDir = 'event-photos/community-outreach';
        
        if (!is_dir($sourceDir)) {
            echo "Source coverage directory not found: {$sourceDir}\n";
            return;
        }
        
        $files = scandir($sourceDir);
        $order = 1;
        
        foreach ($files as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
                $sourcePath = $sourceDir . '/' . $file;
                $destPath = $destDir . '/' . $file;
                $fullDestPath = $this->laravelStoragePath . '/' . $destPath;
                
                if (copy($sourcePath, $fullDestPath)) {
                    // Create database entry
                    $title = $this->generateTitle($file);
                    
                    EventPhoto::create([
                        'event_category_id' => $category->id,
                        'title' => $title,
                        'description' => 'Photo from food safety video coverage and community outreach',
                        'image_path' => $destPath,
                        'alt_text' => $title,
                        'status' => 'active',
                        'display_order' => $order++
                    ]);
                    
                    echo "Migrated: {$file}\n";
                } else {
                    echo "Failed to copy: {$file}\n";
                }
            }
        }
    }
    
    private function migrateEducationalPhotos()
    {
        echo "Migrating educational photos...\n";
        
        // Find the training sessions category
        $category = EventCategory::where('name', 'Training Sessions')->first();
        if (!$category) {
            echo "Training Sessions category not found, skipping...\n";
            return;
        }
        
        $sourceDir = $this->basePath . '/static/images';
        $destDir = 'event-photos/training-sessions';
        
        // Educational photos (edu*.jpg)
        $files = glob($sourceDir . '/edu*.jpg');
        $order = 1;
        
        foreach ($files as $sourcePath) {
            $file = basename($sourcePath);
            $destPath = $destDir . '/' . $file;
            $fullDestPath = $this->laravelStoragePath . '/' . $destPath;
            
            if (copy($sourcePath, $fullDestPath)) {
                // Create database entry
                $title = $this->generateTitle($file);
                
                EventPhoto::create([
                    'event_category_id' => $category->id,
                    'title' => $title,
                    'description' => 'Photo from food safety education and training sessions',
                    'image_path' => $destPath,
                    'alt_text' => $title,
                    'status' => 'active',
                    'display_order' => $order++
                ]);
                
                echo "Migrated: {$file}\n";
            } else {
                echo "Failed to copy: {$file}\n";
            }
        }
    }
    
    private function migrateResearchPhotos()
    {
        echo "Migrating research photos...\n";
        
        // Find the research activities category
        $category = EventCategory::where('name', 'Research Activities')->first();
        if (!$category) {
            echo "Research Activities category not found, skipping...\n";
            return;
        }
        
        $sourceDir = $this->basePath . '/static/images';
        $destDir = 'event-photos/research-activities';
        
        // Research related photos
        $researchFiles = [
            'agric.jpg',
            'analyze.jpg',
            'feath.jpg',
            'feath1.jpg',
            'feath2.jpg',
            'female.jpg',
            'newimg.jpg',
            'potat.jpg',
            'spray.jpg',
            'tea.jpg',
            'tomatoes.jpg',
            'tomatoes1.png'
        ];
        
        $order = 1;
        
        foreach ($researchFiles as $file) {
            $sourcePath = $sourceDir . '/' . $file;
            
            if (file_exists($sourcePath)) {
                $destPath = $destDir . '/' . $file;
                $fullDestPath = $this->laravelStoragePath . '/' . $destPath;
                
                if (copy($sourcePath, $fullDestPath)) {
                    // Create database entry
                    $title = $this->generateTitle($file);
                    
                    EventPhoto::create([
                        'event_category_id' => $category->id,
                        'title' => $title,
                        'description' => 'Photo from food safety research activities and field work',
                        'image_path' => $destPath,
                        'alt_text' => $title,
                        'status' => 'active',
                        'display_order' => $order++
                    ]);
                    
                    echo "Migrated: {$file}\n";
                } else {
                    echo "Failed to copy: {$file}\n";
                }
            }
        }
    }
    
    private function migrateWorkshopPhotos()
    {
        echo "Migrating workshop photos...\n";
        
        // Find the workshops category
        $category = EventCategory::where('name', 'Food Safety Workshops')->first();
        if (!$category) {
            echo "Food Safety Workshops category not found, skipping...\n";
            return;
        }
        
        $sourceDir = $this->basePath . '/static/images';
        $destDir = 'event-photos/food-safety-workshops';
        
        // Workshop related photos
        $workshopFiles = [
            'FoSCU_Founding Worshops.jpg',
            'work.png',
            'work1.png',
            'last1.jpg',
            'docu1.jpg',
            'docu2.jpg',
            'docu3.jpg'
        ];
        
        $order = 1;
        
        foreach ($workshopFiles as $file) {
            $sourcePath = $sourceDir . '/' . $file;
            
            if (file_exists($sourcePath)) {
                $destPath = $destDir . '/' . $file;
                $fullDestPath = $this->laravelStoragePath . '/' . $destPath;
                
                if (copy($sourcePath, $fullDestPath)) {
                    // Create database entry
                    $title = $this->generateTitle($file);
                    
                    EventPhoto::create([
                        'event_category_id' => $category->id,
                        'title' => $title,
                        'description' => 'Photo from food safety workshops and training events',
                        'image_path' => $destPath,
                        'alt_text' => $title,
                        'status' => 'active',
                        'display_order' => $order++
                    ]);
                    
                    echo "Migrated: {$file}\n";
                } else {
                    echo "Failed to copy: {$file}\n";
                }
            }
        }
    }
    
    private function generateTitle($filename)
    {
        // Remove extension
        $name = pathinfo($filename, PATHINFO_FILENAME);
        
        // Replace underscores and hyphens with spaces
        $name = str_replace(['_', '-'], ' ', $name);
        
        // Handle specific cases
        if (preg_match('/^DSC_\d+/', $name)) {
            $name = 'AGM Meeting Photo ' . substr($name, 4);
        } elseif (preg_match('/^agm\d*$/', $name)) {
            $name = 'Annual General Meeting ' . substr($name, 3);
        } elseif (preg_match('/^cov\d*$/', $name)) {
            $name = 'Coverage Activity ' . substr($name, 3);
        } elseif (preg_match('/^edu\d*$/', $name)) {
            $name = 'Education Session ' . substr($name, 3);
        }
        
        // Title case
        $name = ucwords(strtolower($name));
        
        return $name;
    }
}

// Run the migration
$migration = new PhotoMigrationScript();
$migration->migrate();
