<?php

test('Тест делает проверку на / ', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
