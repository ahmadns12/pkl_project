<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Resources\LowonganResource;
use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    return new UserResource($user);
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->where('role', 'siswa')->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'tokens are deleted';
});

Route::get("doc",[ApiController::class,'doc']);
Route::get("doc/{file}",[ApiController::class,'docPreview']);

Route::get('lowongan', function () {
    $lowongan = Lowongan::all();
    return LowonganResource::collection($lowongan);
});
Route::get('perusahaan/{file}',[ApiController::class,'gambarPerusahaan']);
Route::get('fotoprofil/{file}',[ApiController::class,'gambarSiswa']);

Route::put('siswa/update/{id_siswa}', [ApiController::class,'updateSiswa']);
Route::post('lowongan/ajukan',[ApiController::class,'ajukanLowongan']);

Route::get("datalowongan/{id?}",[ApiController::class,'getLowongan']);
Route::post("storeperusahaan",[ApiController::class,'storePerusahaan']);