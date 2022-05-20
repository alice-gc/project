<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use budgetForm;
namespace App;
class LoginTest extends TestCase

{
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
}
