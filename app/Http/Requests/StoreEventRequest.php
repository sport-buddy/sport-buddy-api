<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    use PublicRequest;

    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:locations,id',
            'name' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'min_participants' => 'nullable|integer',
            'max_participants' => 'nullable|integer|gte:min_participants',
            'start_at' => 'required|date_format:"Y-m-d H:i"|after:now',
            'end_at' => 'required|date_format:"Y-m-d H:i"|after:start_date',
        ];
    }
}
