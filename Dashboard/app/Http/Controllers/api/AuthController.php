<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\traits\generalTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\SetNewPasswordAuthRequest;
use App\Http\Requests\VerifyEmailAuthRequest;
use App\Mail\VerificationCode;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use generalTrait;
   public function register(RegisterAuthRequest $request)
   {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->token = 'Bearer '.$user->createToken($request->device_name)->plainTextToken;
        return $this->returnData((object)['user'=>$user],"register completed",201);
   }

   public function sendCode(Request $request)
   {
        $token = $request->header('Authorization');
        $authenticatedUser =  Auth::guard('sanctum')->user();

        $code = rand(10000,99999);
        $user = User::find($authenticatedUser->id);
        $user->code = $code;
        $user->save();
        $user->token = $token;
        // send mail
        Mail::to($user)->send(new VerificationCode($user));
        return $this->returnData((object)['user'=>$user],"Mail Sent Successfully",200);
   }

   public function verifyCode(Request $request)
   {
        // validation on code
        $request->validate(['code'=>['required','integer','digits:5','exists:users']]);
        // get user from token
        $authenticatedUser =  Auth::guard('sanctum')->user();
        // get token from header
        $token = $request->header('Authorization');
        // get user from database
        $user = User::find( $authenticatedUser->id);
        // check if inserted code is equal auhtenticated code
        if($request->code == $authenticatedUser->code){
            // update verification to this user
            $user->email_verified_at = date('Y-m-d H:i:s');
            // save update
            $user->save();
            // insert new property to user object
            $user->token = $token;
            // return success message with data
            return $this->returnData((object)['user'=>$user],"Correct Code",200);
        }else{
            // insert new property to user object
            $user->token = $token;
            // return error message with data
            return $this->returnData((object)['user'=>$user],"Wrong Code",400);
        }
   }

   public function login(LoginAuthRequest $request)
   {
       // get user from db using his email
    $user = User::where('email', $request->email)->first();
    // check if user not exist or if password is wrong
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    // generate token from user
    $token = $user->createToken($request->device_name)->plainTextToken;
    $user->token = 'Bearer '.$token;
    // check if user isn't verified
    if(! $user->email_verified_at){
        return $this->returnData((object)['user'=>$user],"Not Verified",401);
    }

    // return user data with success message
    return $this->returnData((object)['user'=>$user],"Correct Attempt",200);
   }

   public function logout()
   {
      $user = Auth::guard('sanctum')->user();
      $user->currentAccessToken()->delete();
      return $this->returnSuccessMessage('You Have Successfully Logged Out');
   }

   public function profile()
   {
       $user = Auth::guard('sanctum')->user();
       return $this->returnData((object)['user'=>$user],"",200);

   }

   public function verifyEmail(VerifyEmailAuthRequest $request)
   {
       $user = User::where('email',$request->email)->first();
       $user->token = 'Bearer '.$user->createToken($request->device_name)->plainTextToken;
       return $this->returnData((object)['user'=>$user],"Email Exists",200);
   }

   public function setNewPassword(SetNewPasswordAuthRequest $request)
   {
        $authenticatedUser = Auth::guard('sanctum')->user();
        $user = User::find($authenticatedUser->id);
        $user->password = Hash::make($request->password);
        $user->save();
        $user->token = $request->header('Authorization');
        return $this->returnData((object)['user'=>$user],"Password Has Been Changed Successfully",200);

   }
}
