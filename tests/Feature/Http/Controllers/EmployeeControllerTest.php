<?php

test('user can see employee listing page', function () {
    $response = $this->get('/employees');

    $response->assertStatus(200);
});

test('user can add new employee', function () {
    $response = $this->post('/employees');

    $response->assertStatus(200);
});

test('user cannot add new employee with invalid data', function () {
    $response = $this->post('/employees');

    $response->assertStatus(422);
});

test('user view employee', function () {
    $uuid = "www";
    $response = $this->get("/employees/{$uuid}");

    $response->assertStatus(200);
});

test('user can edit existing employee', function () {
    $uuid = 'wdwdwd';
    $response = $this->get("/employees/{$uuid}/edit");

    $response->assertStatus(200);
});

test('user cannot edit non-exist employee and redirected to employee listing', function () {
    $uuid = 'wdwdwd';
    $response = $this->get("/employees/{$uuid}/edit");

    $response->assertStatus(404);
});

test("user can update employee", function() {
    $uuid = 'wdwdwd';
    $response = $this->put("/employees/{$uuid}");

    $response->assertStatus(200);
});

test("user cannot update employee", function() {
    $uuid = 'wdwdwd';
    $response = $this->put("/employees/{$uuid}");

    $response->assertStatus(422);
});

test("user can remove employee", function() {
    $uuid = 'wdwdwd';
    $response = $this->delete("/employees/{$uuid}");

    $response->assertStatus(200);
});

test("user cannot remove employee", function() {
    $uuid = 'wdwdwd';
    $response = $this->delete("/employees/{$uuid}");

    $response->assertStatus(400);
});
