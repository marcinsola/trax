<?php

namespace App\DTO;

use App\Http\Requests\NewCarRequest;

class NewCarDto
{
    /**
     * Note: In PHP 7.4+ I would use
     * regular attribute typing, not annotations
     * E.g. private int $userId;
     */

    /** @var int $userId */
    private $userId;

    /** @var int $year */
    private $year;

    /** @var string $make */
    private $make;

    /** @var string $model */
    private $model;

    /**
     * Same goes for the constructor syntax.
     * I try to use PHP 8 notation whenever possible, so
     * E.g. private function __construct(private int $user, private int $year, ...) {};
     */
    private function __construct(int $userId, int $year, string $make, string $model)
    {
        $this->userId = $userId;
        $this->year = $year;
        $this->make = $make;
        $this->model = $model;
    }

    public static function fromRequest(NewCarRequest $request): self
    {
        return new self($request->user()->id, $request->input('year'), $request->input('make'), $request->input('model'));
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'year' => $this->year,
            'make' => $this->make,
            'model' => $this->model,
        ];
    }
}
