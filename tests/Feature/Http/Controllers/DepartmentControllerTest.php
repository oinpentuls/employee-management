<?php

test('example', function () {
    $response = $this->get('/departements');

    $response->assertStatus(200);
});
