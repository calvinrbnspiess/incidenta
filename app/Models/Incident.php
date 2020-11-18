<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Incident
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property int $participants
 * @property int $participantsPA
 * @property float $duration
 * @property string $zipcode
 * @property string $city
 * @property string $street
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vehicle[] $vehicles
 * @property-read int|null $vehicles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident query()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereParticipantsPA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereZipcode($value)
 * @mixin \Eloquent
 */
class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'participants', 'participantsPA', 'duration', 'zipcode', 'city', 'street', 'category'];

    public function vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle');
    }
}
