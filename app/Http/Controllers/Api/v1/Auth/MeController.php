<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PasswordUpdateRequest;
use App\Http\Requests\Api\ProfileUpdateRequest;
use App\Http\Resources\v1\MeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Traits\ApiResponse;

class MeController extends Controller
{
    use ApiResponse;
    public function __construct()
    {
        // $this->middleware(['auth:api']);
    }

    public function action(Request $request)
    {
        try {
            $data = new MeResource($request->user());
        } catch (\Exception $e) {
            return $this->errorResponse(['status' => 500, 'message' => $e->getMessage(), 'profile' => (object)[]]);
        }
        return $this->successResponse(['status' => 200, 'message' => "success", 'profile' => $data]);
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return $this->successResponse([
                'status'  => 401,
                'message' => 'Token not provided',
            ], 401);
        }

        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            return $this->errorResponse([
                'status'  => 401,
                'message' => $e->getMessage(),
            ], 401);
        }

        return $this->successResponse([
            'success'    => true,
            'token'      => $token,
            "token_type" => "bearer",
            'expires_in' => config('jwt.ttl')*360000,
        ], 200);
    }

    public function update(Request $request)
    {
        $profile = auth()->user();

        if (blank($profile)) {
            return $this->errorResponse([
                'status'  => 401,
                'message' => 'You try to using invalid username or password',
            ], 401);
        }

        $validator = new ProfileUpdateRequest($profile->id);
        $validator = Validator::make($request->all(), $validator->rules());
        if ($validator->fails()) {
            return $this->errorResponse([
                'status'  => 422,
                'message' => $validator->errors(),
            ], 422);
        }
        $firstName = '';
        $lastName  = '';
        if ($request->has('name')) {
            $parts     = $this->splitName($request->get('name'));
            $firstName = $parts[0];
            $lastName  = $parts[1];
        }

        $profile->first_name = $firstName;
        $profile->last_name  = $lastName;

        $profile->email      = $request->get('email');
        $profile->phone      = $request->get('phone');
        $profile->address    = $request->get('address');
        if ($request->username) {
            $profile->username = $request->username;
        }
        $profile->save();

        if (request()->file('image')) {
            $profile->media()->delete();
            $profile->addMedia(request()->file('image'))->toMediaCollection('user');
        }

        return $this->successResponse([
            'status'  => 200,
            'message' => 'Successfully Updated Profile',
        ], 200);
    }

    public function changePassword(Request $request)
    {
        $validator = new PasswordUpdateRequest();
        $validator = Validator::make($request->all(), $validator->rules());

        if ($validator->fails()) {
            return $this->errorResponse([
                'status'  => 422,
                'message' => $validator->errors(),
            ], 422);
        }

        $profile           = auth()->user();
        $profile->password = bcrypt($request->get('password'));
        $profile->save();
        return $this->successResponse([
            'status'  => 200,
            'message' => 'Successfully Updated Password',
        ], 200);
    }

    public function device(Request $request)
    {
        $validator = Validator::make($request->all(), ['device_token' => 'required']);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 422,
                'message' => $validator->errors(),
            ], 422);
        }

        $user               = auth()->user();
        $user->device_token = $request->device_token;
        $user->save();

        return response()->json([
            'status'  => 200,
            'message' => 'Successfully device updated',
        ], 200);
    }

    private function splitName($name)
    {
        $name       = trim($name);
        $last_name  = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#' . $last_name . '#', '', $name));
        return [$first_name, $last_name];
    }
}
