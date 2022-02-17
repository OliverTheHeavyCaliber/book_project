<?php
namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutUs() {
        return "My mind cannot reside in my body.";
    }
}