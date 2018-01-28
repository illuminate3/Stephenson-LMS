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

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => 'A URL :attribute não é uma URL válida.',
    'after'                => 'A data :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'A data :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => ':attribute pode conter apenas letras.',
    'alpha_dash'           => ':attribute pode conter somente letras, números e hífens.',
    'alpha_num'            => ':attribute pode conter somente letras e números.',
    'array'                => ':attribute deve ser um array.',
    'before'               => 'A data :attribute deve ser uma data anterior a :date.',
    'before_or_equal'      => 'A data :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O número :attribute deve estar entre :min and :max.',
        'file'    => 'O arquivo :attribute deve ter entre :min e :max KB.',
        'string'  => 'A frase :attribute deve ter entre :min e :max carateres.',
        'array'   => 'O :attribute deve haver entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de :attribute não corresponde.', //Falta aqui
    'date'                 => 'A data :attribute não é uma data válida.',
    'date_format'          => 'A data :attribute não condiz com o formato: :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => ':attribute deve ter :digits dígitos.',
    'digits_between'       => ':attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => 'A imagem :attribute não possui dimensões válidas.',
    'distinct'             => 'O campo :attribute tem valores duplicados.',
    'email'                => 'O email :attribute deve ser válido.',
    'exists'               => 'O atributo :attribute selecionado é inválido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve conter um valor.',
    'image'                => ':attribute deve ser uma imagem.',
    'in'                   => 'O atributo selecionado :attribute é inválido.',
    'in_array'             => 'O campo :attribute não existe no campo :other.',
    'integer'              => 'O número :attribute deve ser inteiro.',
    'ip'                   => 'O endereço de IP :attribute deve ser válido.',
    'ipv4'                 => 'O endereço de IPv4 :attribute deve ser válido.',
    'ipv6'                 => 'O endereço de IPv6 :attribute deve ser válido.',
    'json'                 => 'A string JSON :attribute deve ser válida.',
    'max'                  => [
        'numeric' => 'O número :attribute não pode ser maior que :max.',
        'file'    => 'O arquivo :attribute deve ser menor que :max KB.',
        'string'  => 'A frase :attribute deve ser menor que :max caracteres.',
        'array'   => ':attribute não pode ter mais que :max itens.',
    ],
    'mimes'                => 'O arquivo :attribute deve ser do tipo: :values.',
    'mimetypes'            => 'O arquivo :attribute deve ser do tipo: :values.',
    'min'                  => [
        'numeric' => 'O número :attribute deve ser no mínimo :min.',
        'file'    => 'O arquivo :attribute deve ser no mínimo :min KB.',
        'string'  => 'A frase :attribute deve ser no mínimo :min caracteres.',
        'array'   => ':attribute deve ser no mínimo :min itens.',
    ],
    'not_in'               => ':attribute selecionado é inválido.',
    'numeric'              => ':attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O formato do(a) :attribute é inválido.',
    'required'             => 'O campo: :attribute é obrigatório.',
    'required_if'          => 'O campo: :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo: :attribute é obrigatório a menos que :other está em :values.',
    'required_with'        => 'O campo: :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo: :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo: :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo: :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => ':attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'O número :attribute deve ter :size.',
        'file'    => 'O arquivo :attribute deve ter :size KB.',
        'string'  => 'A frase :attribute deve ter :size caracteres.',
        'array'   => ':attribute deve conter :size itens.',
    ],
    'string'               => ':attribute deve ser uma frase.',
    'timezone'             => ':attribute tem que ser uma zona válida.',
    'unique'               => ':attribute já existe.',
    'uploaded'             => 'Houve falha ao fazer upload de: :attribute.',
    'url'                  => ':attribute está com formato inválido.',

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
