<?php

namespace App\Http\Controllers\API\Tastor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tasting;
use App\Models\User;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
  public function __invoke(User $user, Tasting $tasting, Product $product, Request $request)
  {

    $average = ($request->commercial + $request->appearance + $request->cut + $request->color + $request->taste + $request->smell + $request->consistency) / 7;
    $average = round($average, 2);

    $data = [
      'commercial' => $request->commercial,
      'appearance' => $request->appearance,
      'cut' => $request->cut,
      'color' => $request->color,
      'taste' => $request->taste,
      'smell' => $request->smell,
      'consistency' => $request->consistency,
      'average' => $average,
      'comment' => $request->comment,
      'note' => $request->note,
      'user_id' =>
      $request->userId,
      'tasting_id' => $tasting->id,
      'product_id' => $product->id,
    ];
    // dd($data);
    Rating::firstOrCreate($data);

    return ['message' => 'ok'];
  }
}