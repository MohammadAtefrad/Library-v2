<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property int $priority_id
 * @property int $factor_id
 * @property int $message_status_id
 * @property string $subject
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 * @property Factor $factor
 * @property User $user
 * @property MessageStatus $messageStatus
 * @property MessagePriority $messagePriority
 * @property User $user
 */
class Message extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['from_user_id', 'to_user_id', 'priority_id', 'factor_id', 'message_status_id', 'subject', 'body', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factor()
    {
        return $this->belongsTo('App\Factor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user1()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function messageStatus()
    {
        return $this->belongsTo('App\MessageStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function messagePriority()
    {
        return $this->belongsTo('App\MessagePriority', 'priority_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user2()
    {
        return $this->belongsTo('App\User', 'to_user_id');
    }
}
