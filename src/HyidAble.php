<?php
/**
 * User: qbhy
 * Date: 2018/10/16
 * Time: 上午11:21
 */

namespace Qbhy\Hyid;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait HyidAble
 *
 * @package Qbhy\Hyid
 * @mixin Model
 */
trait HyidAble
{
    public function getIdAttribute($id)
    {
        return hyid($id);
    }

    public function rawId()
    {
        return $this->attributes['id'];
    }
}