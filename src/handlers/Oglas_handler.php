<?php

/**
 * Interfejs handler-a za oglase
 * Chain of responsibility pattern
 */
interface Oglas_handler {
    public function set_next_handler(Oglas_handler $handler): Oglas_handler;
    public function process(Oglas $oglas, array $input): bool;
}