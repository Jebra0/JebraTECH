<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\Tag;

final class UpdateTag
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'id' => ['required', 'exists:tags,id'],
            'name' => ['required', 'String', 'max:500']
        ]);

        if($validator->fails()){
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $tag = Tag::find($args['id']);

        if($tag){

            $tag->name = $args['name'];
            $tag->save();
            return $tag;

        }
    }
}
