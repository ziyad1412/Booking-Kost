<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;


use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    //repositoryinterface & construct
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    //find
    public function find()
    {
        $cities = $this->cityRepository->getAllCities();
        $categories = $this->categoryRepository->getAllCategories();

        return view('pages.boarding-house.find', compact('cities', 'categories'));
    }

    //findresults
    public function findResults(Request $request)
    {
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);

        return view('pages.boarding-house.index', compact('boardingHouses'));
    }
}
