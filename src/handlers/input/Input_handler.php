<?php

/**
 * Interfejs handler-a za inpute
 * Chain of responsibility pattern
 */
interface Input_handler {
    public function set_next_handler(Input_handler $handler): Input_handler;
    public function process(array $input): bool;
}