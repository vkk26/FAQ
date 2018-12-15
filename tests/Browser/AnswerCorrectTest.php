<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswerCorrectTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/register')
                ->value('#email', 'example@example.com')
                ->value('#password', 'secret')
                ->value('#password-confirm', 'secret')
                ->click('button[type="submit"]')
                ->assertPathIs('/home')
                ->assertSee('Questions')
                ->clickLink('Create a Question')
                ->assertSee('Create Question')
                ->value('#body', 'how are you?')
                ->click('button[type="submit"]')
                ->assertSee('IT WORKS!')
                ->clickLink('View')
                ->assertSee('Question')
                ->clickLink('Answer Question')
                ->value('#body', 'am good')
                ->click('button[type="submit"]')
                ->assertSee('Saved')
                ->clickLink('View')
                ->clickLink('Edit Answer')
                ->value('#body', 'am not good')
                ->click('button[type="submit"]')
                ->assertSee('Updated')
                ->clickLink('Correct')
                ->assertSee('Answer is correct.');

        });
    }
}