<?php

namespace App\Http\Requests\User\CourseManagement;

use App\Models\User\CourseManagement\CourseInformation;
use App\Models\User\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $ruleArray = [
            'thumbnail_image' => $this->hasFile('thumbnail_image') ? new ImageMimeTypeRule() : '',
            'video_link' => 'required|url',
            'cover_image' => $this->hasFile('cover_image') ? new ImageMimeTypeRule() : '',
            'pricing_type' => 'required',
            'current_price' => 'required_if:pricing_type,premium'
        ];

        $languages = Language::where('user_id', Auth::guard('web')->user()->id)->get();

        $id = $this->route('id');
        $request = $this->request->all();

        foreach ($languages as $language) {
            $slug = slug_create($request[$language->code . '_title']);
            $ruleArray[$language->code . '_title'] = [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug, $id, $language) {
                    $cis = CourseInformation::where('course_id', '<>', $id)->where('language_id', $language->id)->where('user_id', Auth::guard('web')->user()->id)->get();
                    foreach ($cis as $key => $ci) {
                        if (strtolower($slug) == strtolower($ci->slug)) {
                            $fail('The title field must be unique for ' . $language->name . ' language.');
                        }
                    }
                }
            ];
            $ruleArray[$language->code . '_category_id'] = 'required';
            $ruleArray[$language->code . '_instructor_id'] = 'required';
            $ruleArray[$language->code . '_features'] = 'required';
            $ruleArray[$language->code . '_description'] = 'min:30';
        }

        return $ruleArray;
    }
    public function messages()
    {
        $messageArray = [];

        // $languages = Language::where(Auth::guard('web')->user()->id)->get();
        $languages = Language::all();

        foreach ($languages as $language) {

            $messageArray[$language->code . '_title.required'] = 'The title field is required for ' . $language->name . ' language.';

            $messageArray[$language->code . '_title.max'] = 'The title field cannot contain more than 255 characters for ' . $language->name . ' language.';

            $messageArray[$language->code . '_category_id.required'] = 'The category field is required for ' . $language->name . ' language.';

            $messageArray[$language->code . '_instructor_id.required'] = 'The instructor field is required for ' . $language->name . ' language.';

            $messageArray[$language->code . '_features.required'] = 'The features field is required for ' . $language->name . ' language.';

            $messageArray[$language->code . '_description.min'] = 'The description must be at least 30 characters for ' . $language->name . ' language.';
        }

        return $messageArray;
    }
}
