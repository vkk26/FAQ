# FAQ Project
To run the FAQ project:

1 >> git clone https://github.com/vkk26/FAQ.git 

2 >>CD into FAQ and run composer install

3 >> cp .env.example to .env

4 >> setup database / with sqlite

5 >> Run: php artisan migrate

6 >>  Run: unit tests: phpunit

7  >> Run: seeds php artisan migrate:refresh --seed

# Feature to the FAQ Project
 I have added a feature called making the answer correct by clicking a button in the answer view.
     
     
     
  steps to check this feature on the local machine or heroku 
  
  
 >go to homepage of the application '/home' 
 
 >click on the register
 
 >register with an example email and password
 
 >in the home page you will be able to create a question by clicking create question
 
 >after creating question you will be able to answer the question by clicking create answer
 
 >after creating the answer you will be able to view the answer and some options we can do with that answer
 like edit, delete and newly added feature "Correct " to make the answer correct.
 
 > when you click on the "Correct" button it will show "Answer is Correct."

# testing this feature 

I have used the laravel dusk to test this button whether it is working fine or not.
   
   ## Laravel dusk installation
   
   1. to install visit  (https://laravel.com/docs/5.7/dusk)
   
   2. after installing make changes as shown in the above documentation.
   
   3. to test this button i have written code like
   
   ## AnswerCorrectTest.php
              
                    
                    
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
         
 Make sure that you refresh database every time to check the test
 
 i used some tutorial as reference to write this test
 (https://www.youtube.com/watch?v=V75hPsS6cvk)
 
  that's it. i have got no errors while running this test. it works fine.
   
   
   
   
 