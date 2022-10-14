<?php

namespace App\Http\Resources;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     * @author Abdulla Hegab
     * @updated Mohamed Eldefrawy
     */
    public function toArray($request): array
    {
        $allPermissions = $this->getAllPermissions();


        $permissionByRoles = [];

        foreach ($allPermissions as $permission) {
            $permissionByRoles[] = $permission->name;
        }



        return [
            'id' => $this->id,
            'name' => $this->name,
            'token' => $this->createToken('myToken', $permissionByRoles)->plainTextToken,
            'roles' => $this->getRoleNames(),
            'userPermissions' => $permissionByRoles,
            'profile_image' => $this->profile_image? $this->profile_image:''
        ];
    }
}
