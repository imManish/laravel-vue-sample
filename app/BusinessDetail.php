<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    protected $table = 'business_details';
    protected $primarykey = 'id';

    protected $fillable = [
        'user_id', 'business_logo', 'business_name', 'business_style', 'business_contact_number', 'business_email', 'business_hash_number', 'business_latitude', 'business_longitude', 'business_address', 'business_country', 'business_state', 'business_city', 'return_policy', 'return_days', 'return_policy_note', 'minium_order', 'number_of_views', 'business_registration_date', 'is_active', 'payment_id', 'business_delivery_option',
    ];

    /**
     * @return hasOne Relationship with User Model
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return hasMany Relationship with User Model
     */
    public function productDetails()
    {
        return $this->hasMany(BusinessProductDetail::class);
    }

    /**
     * @return belongsTo Payments
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
