<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestDbTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-db-transaction
                            {--failin= : fail the transaction after N seconds}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test database transaction';

    protected $file = 'students_import_records.csv';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $failin = $this->option('failin');
        $csv = file_get_contents(base_path()."/{$this->file}");
        $this->importCsv($csv, $failin);
    }

    /**
     * This code is not optimized for performance. This is just to
     * simulate a failed and successful db transaction
     */
    private function importCsv($csv, $failin)
    {

        $start = microtime(true);

        $this->info("importing {$this->file}...");
        $lines = explode("\n", $csv);

        try {
            DB::Transaction(function () use ($lines, $start, $failin) {
                foreach ($lines as $line) {

                    if ($failin) {
                        sleep(1);

                        if (microtime(true) - $start > $failin) {
                            throw new \Exception('Transaction will be rollback.');
                        }
                    }

                    $data = str_getcsv($line);
                    Student::create([
                        'student_id' => $data[0],
                        'student_code' => $data[1],
                        'first_name' => $data[2],
                        // 'last_name' => $data[3],
                        'date_of_birth' => $data[4],
                        'school_code' => $data[5],
                    ]);

                }

                $this->info('Import completed.');
            });
        } catch (\Exception $e) {
            Log::error('An error occurred', ['errorMessage' => $e->getMessage()]);
            $this->error('Import failed: '.$e->getMessage());
        }

    }
}
