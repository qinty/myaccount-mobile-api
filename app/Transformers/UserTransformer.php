<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 14/05/16
 * Time: 09:10
 */

namespace app\Transformers;

class UserTransformer
{
    public function transform($user)
    {
        return [
            'userId' => 1,
            'userName' => 'Name'
        ];
    }
}