<?php

/**
 * Interfejs handler-a za inpute
 * Chain of responsibility pattern
 */
interface Input_handler {
    public function set_next_handler(Input_handler $handler): void;
    public function process(array $input): bool;
}