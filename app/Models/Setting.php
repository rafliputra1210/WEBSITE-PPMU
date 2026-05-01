<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'label', 'group'];

    /**
     * Get setting value by key.
     */
    public static function get($key, $default = null)
    {
        try {
            $setting = self::where('key', $key)->first();
            if (!$setting) return $default;
            
            if ($setting->type === 'number') return (float) $setting->value;
            return $setting->value;
        } catch (\Exception $e) {
            return $default;
        }
    }

    /**
     * Set setting value by key.
     */
    public static function set($key, $value, $type = 'string', $label = null, $group = null)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type, 'label' => $label, 'group' => $group]
        );
    }
}
