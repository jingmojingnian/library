<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines contain the default error messages used by
      | the validator class. Some of these rules have multiple versions such
      | as the size rules. Feel free to tweak each of these messages here.
      |
     */

    'accepted' => '参数 :attribute 必须是允许的.',
    'active_url' => '参数 :attribute 不是一个有效的链接.',
    'after' => '参数 :attribute 必须在 :date 之后.',
    'alpha' => '参数 :attribute 只能为字母.',
    'alpha_dash' => '参数 :attribute 只能为字母、数字、破折号.',
    'alpha_num' => '参数 :attribute 只能为字母或数字.',
    'array' => '参数 :attribute 只能为数组.',
    'before' => '参数 :attribute 必须在 :date 之前.',
    'between' => [
        'numeric' => '参数 :attribute must be between :min and :max.',
        'file' => '参数 :attribute must be between :min and :max kilobytes.',
        'string' => '参数 :attribute must be between :min and :max characters.',
        'array' => '参数 :attribute must have between :min and :max items.',
    ],
    'boolean' => '参数 :attribute field must be true or false.',
    'confirmed' => '参数 :attribute confirmation does not match.',
    'date' => '参数 :attribute is not a valid date.',
    'date_format' => '参数 :attribute does not match the format :format.',
    'different' => '参数 :attribute and :other must be different.',
    'digits' => '参数 :attribute must be :digits digits.',
    'digits_between' => '参数 :attribute must be between :min and :max digits.',
    'dimensions' => '参数 :attribute has invalid image dimensions.',
    'distinct' => '参数 :attribute field has a duplicate value.',
    'email' => '参数 :attribute must be a valid email address.',
    'exists' => '参数 selected :attribute is invalid.',
    'file' => '参数 :attribute must be a file.',
    'filled' => '参数 :attribute field is required.',
    'image' => '参数 :attribute must be an image.',
    'in' => '参数 selected :attribute is invalid.',
    'in_array' => '参数 :attribute field does not exist in :other.',
    'integer' => '参数 :attribute must be an integer.',
    'ip' => '参数 :attribute must be a valid IP address.',
    'json' => '参数 :attribute must be a valid JSON string.',
    'max' => [
        'numeric' => '参数 :attribute may not be greater than :max.',
        'file' => '参数 :attribute may not be greater than :max kilobytes.',
        'string' => '参数 :attribute may not be greater than :max characters.',
        'array' => '参数 :attribute may not have more than :max items.',
    ],
    'mimes' => '参数 :attribute must be a file of type: :values.',
    'mimetypes' => '参数 :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => '参数 :attribute must be at least :min.',
        'file' => '参数 :attribute must be at least :min kilobytes.',
        'string' => '参数 :attribute must be at least :min characters.',
        'array' => '参数 :attribute must have at least :min items.',
    ],
    'not_in' => '参数 selected :attribute is invalid.',
    'numeric' => '参数 :attribute must be a number.',
    'present' => '参数 :attribute field must be present.',
    'regex' => '参数 :attribute format is invalid.',
    'required' => '参数 :attribute field is required.',
    'required_if' => '参数 :attribute field is required when :other is :value.',
    'required_unless' => '参数 :attribute field is required unless :other is in :values.',
    'required_with' => '参数 :attribute field is required when :values is present.',
    'required_with_all' => '参数 :attribute field is required when :values is present.',
    'required_without' => '参数 :attribute field is required when :values is not present.',
    'required_without_all' => '参数 :attribute field is required when none of :values are present.',
    'same' => '参数 :attribute and :other must match.',
    'size' => [
        'numeric' => '参数 :attribute must be :size.',
        'file' => '参数 :attribute must be :size kilobytes.',
        'string' => '参数 :attribute must be :size characters.',
        'array' => '参数 :attribute must contain :size items.',
    ],
    'string' => '参数 :attribute must be a string.',
    'timezone' => '参数 :attribute must be a valid zone.',
    'unique' => '参数 :attribute has already been taken.',
    'uploaded' => '参数 :attribute failed to upload.',
    'url' => '参数 :attribute format is invalid.',
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | Here you may specify custom validation messages for attributes using the
      | convention "attribute.rule" to name the lines. This makes it quick to
      | specify a specific custom language line for a given attribute rule.
      |
     */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Attributes
      |--------------------------------------------------------------------------
      |
      | The following language lines are used to swap attribute place-holders
      | with something more reader friendly such as E-Mail Address instead
      | of "email". This simply helps us make messages a little cleaner.
      |
     */
    'attributes' => [],
];
