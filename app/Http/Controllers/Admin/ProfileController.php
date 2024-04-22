<?php

    namespace App\Http\Controllers\Admin;

    use App\Helper\Storage;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class ProfileController extends Controller
    {
        public function index()
        {
            $user = User::find(Auth::user()->id);
            $user->image = Storage::getImageProfile($user->image);
            
            return view('profile.index', compact('user'));
        }

        public function create()
        {

        }

        public function store(Request $request)
        {

        }

        public function edit($id)
        {

        }

        public function update(Request $request, $id)
        {

        }

        public function destroy($id)
        {

        }
    }
