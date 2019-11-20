<?php

namespace App\Models\Settings;

use App\Models\BaseModel;

class Setting extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['limit_per_page', 'company_email', 'logo', 'favicon', 'facebook', 'instagram', 'twitter', 'google', 'youtube', 'smtp_address', 'smtp_username', 'smtp_password', 'smtp_port', 'smtp_security', 'seo_title', 'seo_keyword', 'seo_description', 'company_contact', 'company_address', 'from_name', 'from_email', 'footer_text', 'text_content', 'copyright_text', 'terms', 'disclaimer', 'google_analytics','currencycodes','referral_amt','referral_status'];

    public function __construct()
    {
        $this->table = config('access.settings_table');
    }
}
