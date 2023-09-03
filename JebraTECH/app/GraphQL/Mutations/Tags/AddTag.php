<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\Tag;

final class AddTag
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'name' => ['required', 'String', 'max:500']
        ]);

        if($validator->fails()){
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $tag = new Tag();
        $tag->name = $args['name'];
        $tag->save();

        return $tag;
    }
}
