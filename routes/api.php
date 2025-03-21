use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;

Route::get('/ads', [AdController::class, 'index']);
Route::get('/ads/{id}', [AdController::class, 'show']);
Route::post('/ads', [AdController::class, 'store']);
Route::put('/ads/{id}', [AdController::class, 'update']);
Route::delete('/ads/{id}', [AdController::class, 'destroy']);
