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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        "email" => "Email",
        "password" => "Password",
        "forget_password" => "Forget password ?",
        "login" => "Login",
        "invalid_credentials" => "Invalid credentials",
        "are_you_sure_logout" => "Are you want to logout ?",
        "send_reset_password_link" => "Send reset password link",
        "success_send" => "Success send",
        "confirm_password" => "Confirm password",
        "success_reset_password" => "Success reset password",
        "ok" => "Ok",
        "cancel" => "Cancel",
        "save" => "Save",
        "confirmation" => "Confirmation",
        "home" => "Home",
        "admins" => "Admins",
        "search" => "Search",
        "name" => "Name",
        "mobile" => "Mobile",
        "actions" => "Actions",
        "more_info" => "More info",
        "edit" => "Edit",
        "logout" => "Logout",
        "sing_in_dashboard" => "Sign In to Dashboard",
        "enter_email_to_reset_password" => "Enter your email to reset your password.",
        "reset_password" => "Reset password",
        "total_results" => "Total resuls: :val",
        "image" => "Image",
        "no_result" => "No result",
        "role" => "Role",
        "language" => "Language",
        "english" => "English",
        "arabic" => "Arabic",
        "add_new" => "Add new",
        "remove_image" => "Remove image",
        "change_image" => "Change image",
        "success_save" => "Success save",
        "success_delete" => "Success delete",
        "edit" => "Edit",
        "let_password_empty" => "Let password field empty if you don't want to change it",
        "delete_question" => "Do you want to delete this row ?",
        "cannot_delete_your_account" => "Your account can't be deleted",
        "my_profile" => "My profile",
        "roles" => "Roles",
        "permissions" => "Permissions",
        "total_admins" => "Total admins",
        "total_roles" => "Total roles",
        "total_countries" => "Total countries",
        "countries" => "Countries",
        "name_code" => "Name code",
        "phone_code" => "Phone code",
        "status" => "Status",
        "flag" => "Flag",
        "active" => "Active",
        "deactivate" => "Deactivate",
        "name_en" => "Name (English)",
        "name_ar" => "Name (Arabic)",
        "name_is_required" => "The name field is required.",
        "name_is_already_exist" => "The name is already existing.",
        "static_pages" => "Static pages",
        "title" => "Title",
        "title_ar" => "Title (Arabic)",
        "title_en" => "Title (English)",
        "description_ar" => "Description (Arabic)",
        "description_en" => "Description (English)",
        "description_is_required" => "Description is required.",
        "title_is_required" => "Title is required.",
        "settings" => "Settings",
        "project_name_en" => "Project name (English)",
        "project_name_ar" => "Project name (Arabic)",
        "contact_us_email" => "Contact us email",
        "contact_us_mobile" => "Contact us number",
        "facebook_url" => "Facebook url",
        "twitter_url" => "Twitter url",
        "youtube_url" => "Youtube url",
        "instagram_url" => "Instagram url",
        "snapchat_url" => "Snapchat url",
        "whatsapp_number" => "Whatsapp number",
        "logo" => "Logo",
        "admins_permissions" => "Admins And Permissions",
        "general_settings" => "General settings",
        "total_static_pages" => "Total static pages",
        "css_in_header" => "Css in header",
        "js_before_header" => "Js before header",
        "js_before_body" => "Js before body",
        "admin" => "Admin",
        "country" => "Country",
        "page" => "Page",
        "setting" => "Setting",
        "statistics" => "Statistics",
        "male" => "Male",
        "female" => "Female",
        "gender" => "Gender",
        "country_id" => "Country",

    ],

];
