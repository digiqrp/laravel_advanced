<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class TeamTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Create a team.
     *
     * @return void
     */
    public function testCreatePass()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/teams/create')
                    ->type('title','SampleTeam')
                    ->press('create')
                    ->assertPathIs('/teams');
        });
    }

    /**
     * Fails when no create.
     *
     * @return void
     */
    public function testCreateFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/teams/create')
                ->type('title','')
                ->press('create')
                ->assertPathIs('/teams/create');
        });
    }

}
