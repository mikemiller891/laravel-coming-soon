<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:role {role} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a role to the user with the specified e-mail address.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $role = $this->argument('role');
        $email = $this->argument('email');
        $user = User::where('email', $email)->firstOrFail();
        $user->assignRole($role);
        $this->info("{$email} is now a {$role}.");
        return 0;
    }
}
