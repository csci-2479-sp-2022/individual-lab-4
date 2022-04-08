<?php

namespace App\Http\Requests;

use App\Models\System;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $systemIds = self::getSystemIds();

        return [
            'title' => 'required|string',
            'year' => 'required|date_format:Y',
            'system' => [ Rule::in($systemIds) ],
        ];
    }

    public function getTitle(): string
    {
        return $this->input('title');
    }

    public function getReleaseYear(): string
    {
        return $this->input('year');
    }

    public function getSystemId(): int
    {
        return $this->input('system');
    }

    public function hasBoxart(): bool
    {
        return $this->hasFile('boxart')
            && $this->file('boxart')->isValid();
    }

    public function getBoxart(): UploadedFile
    {
        return $this->file('boxart');
    }

    public function getCompletedBoolean(): bool
    {
        $completed = $this->input('completed');

        return isset($completed);
    }

    private static function getSystemIds(): array
    {
        $idRows = System::select('id')->get()->toArray();

        return array_map(fn($row) => $row['id'], $idRows);
    }
}
