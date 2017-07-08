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

    'accepted'             => '属性必须被接受。',
    'active_url'           => '属性不是有效URL。',
    'after'                => '属性必须是日期后的日期。',
    'after_or_equal'       => '属性必须是日期或等于日期。',
    'alpha'                => '属性只contain the letters。',
    'alpha_dash'           => '属性可能只dashes contain letters，数字，布尔。',
    'alpha_num'            => 'The :属性可能与信号只contain.',
    'array'                => 'The :属性必须是数组。.',
    'before'               => 'The :属性必须是日期 before :date.',
    'before_or_equal'      => 'The :属性必须是日期 before or equal to :date.',
    'between'              => [
        'numeric' => 'The :属性必须介于 :min and :max.',
        'file'    => 'The :属性必须介于 :min and :max kilobytes.',
        'string'  => 'The :属性必须介于 :min and :max characters.',
        'array'   => 'The :属性之间必须有 :min and :max items.',
    ],
    'boolean'              => 'The :属性字段必须是true或false .',
    'confirmed'            => 'The :属性确认不匹配.',
    'date'                 => 'The :属性不是有效日期。.',
    'date_format'          => 'The :属性与格式不匹配。 :format.',
    'different'            => 'The :属性和 :其他 必须不同.',
    'digits'               => 'The :属性必须 :数字 digits.',
    'digits_between'       => 'The :属性必须介于 :min and :max digits.',
    'dimensions'           => 'The :属性的图像尺寸无效。.',
    'distinct'             => 'The :属性字段具有重复的值。.',
    'email'                => 'The :属性必须是有效的电子邮件地址。 .',
    'exists'               => 'The selected :属性无效.',
    'file'                 => 'The :属性必须是一个文件.',
    'filled'               => 'The :属性字段必须有一个值.',
    'image'                => 'The :属性必须是图像.',
    'in'                   => 'The selected :属性无效。',
    'in_array'             => 'The :属性字段不存在 :other.',
    'integer'              => 'The :属性必须是整数。.',
    'ip'                   => 'The :属性必须是有效的IP地址。 .',
    'ipv4'                 => 'The :属性必须是有效的IPv4地址。.',
    'ipv6'                 => 'The :属性必须是有效的IPv6地址。.',
    'json'                 => 'The :属性必须是有效的JSON字符串。',
    'max'                  => [
        'numeric' => 'The :属性不得大于：max。',
        'file'    => 'The :属性可能不大于 :max kilobytes.',
        'string'  => 'The :属性可能不大于 :max characters.',
        'array'   => 'The :属性可能不超过 :max items.',
    ],
    'mimes'                => 'The :属性必须是类型的文件。: :values.',
    'mimetypes'            => 'The :属性必须是类型的文件。: :values.',
    'min'                  => [
        'numeric' => 'The :属性必须至少 :min.',
        'file'    => 'The :属性必须至少 :min kilobytes.',
        'string'  => 'The :属性必须至少 :min characters.',
        'array'   => 'The :属性至少必须有  :min items.',
    ],
    'not_in'               => '选定的：属性无效。',
    'numeric'              => '属性必须是一个数字。',
    'present'              => '属性字段必须呈现。',
    'regex'                => '属性格式无效。',
    'required'             => '属性字段是必需的。',
    'required_if'          => '当属性为值时，属性字段是必需的。',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => '属性和其他必须匹配。 ',
    'size'                 => [
        'numeric' => 'The :属性必须是：size。',
        'file'    => 'The :属性必须是 :size kilobytes.',
        'string'  => 'The :属性必须是 :size characters.',
        'array'   => 'The :属性必须包含 :size items.',
    ],
    'string'               => 'The :属性必须是字符串。.',
    'timezone'             => 'The :属性必须是有效区域。',
    'unique'               => 'The :属性已被占用。',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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
