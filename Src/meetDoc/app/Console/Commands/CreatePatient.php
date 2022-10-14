<?php

namespace App\Console\Commands;

use App\Builder\PatientBuilder;
use App\Models\Patient;
use App\Models\User;
use App\Utilities\Singleton;
use Illuminate\Bus\Queueable;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class CreatePatient extends Command implements ShouldQueue, CommandInterface
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $singleton;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:patient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Patient';

    /**
     * Execute the console command.
     *
     * @return void
     */

    private PatientBuilder $newPatient;

    /**
     * @param PatientBuilder $newPatient
     */
    public function __construct(PatientBuilder $newPatient)
    {
        parent::__construct();
        $this->newPatient = $newPatient;

    }

    public function handle()
    {
        $this->executeCommand();
    }

    public function executeCommand()
    {
        $isExist = User::Where('email', $this->newPatient->getEmail())->count();
        $isCreated = false;

        if ($isExist == 0) {
            $patientUser = User::create([
                "email" => $this->newPatient->getEmail(),
                "name" => $this->newPatient->getPhone(),
                "password" => Hash::make($this->newPatient->getPassword())
            ]);


            $patient = Patient::create([
                "user_id" => $patientUser->id,
                "weight" => $this->newPatient->getWeight(),
                "height" => $this->newPatient->getHeight(),
                "gender" => $this->newPatient->getGender(),
                "age" => $this->newPatient->getAge(),
                "blood_type" => $this->newPatient->getBloodType(),
                "first_name" => $this->newPatient->getFirstName(),
                "last_name" => $this->newPatient->getLastName(),
                "created_by" => $this->newPatient->getCreatedBy()
            ]);

            $patientUser->assignRole("Patient");

            foreach (config('global.patientRolePermissions') as $permission) {
                $patientUser->givePermissionTo($permission);
            }
        }
    }
}
