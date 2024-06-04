<?php

namespace App\Http\Controllers\Location;

use App\DTO\UserLocationDTO;
use App\Http\Controllers\Controller;
use App\Repositories\UserLocationRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RemoveLocationController extends Controller
{
    private UserLocationRepository $userLocationRepository;

    public function __construct(UserLocationRepository $userLocationRepository)
    {
        $this->userLocationRepository = $userLocationRepository;
    }

    public function destroy(int $id): RedirectResponse
    {
        $dataDelete = new UserLocationDTO(Auth::id(), $id);
        $this->userLocationRepository->delete($dataDelete);

        return redirect()->route('home');
    }
}
