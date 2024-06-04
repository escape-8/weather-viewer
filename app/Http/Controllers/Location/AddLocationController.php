<?php

namespace App\Http\Controllers\Location;

use App\DTO\LocationDTO;
use App\DTO\UserLocationDTO;
use App\Http\Controllers\Controller;
use App\Repositories\LocationRepository;
use App\Repositories\UserLocationRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddLocationController extends Controller
{
    private LocationRepository $locationRepository;
    private UserLocationRepository $userLocationRepository;

    public function __construct(LocationRepository $locationRepository, UserLocationRepository $userLocationRepository)
    {
        $this->locationRepository = $locationRepository;
        $this->userLocationRepository = $userLocationRepository;
    }

    public function store(Request $request): RedirectResponse
    {
        $locationDTO = new LocationDTO($request->all());
        $locationId = $this->locationRepository->add($locationDTO);
        $userLocation = new UserLocationDTO(Auth::id(), $locationId);

        try {
            $this->userLocationRepository->checkIfUserHasLocation($userLocation);
            return back()
                ->with('status', 'This location already been added in your weather track')
                ->with('alert', 'danger');
        } catch (ModelNotFoundException) {
            $this->userLocationRepository->add($userLocation);
        }

        return redirect()->route('home')->with('status', 'This location has been added successfully');
    }
}
